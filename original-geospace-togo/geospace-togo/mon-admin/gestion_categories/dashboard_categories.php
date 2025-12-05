<?php
session_start();

// Vérification accès admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

// Charger config.php
require_once __DIR__ . '/../../mon_config/config.php';
require_once BASE_PATH . 'mon_config/connection_db.php';


/**
 * Génère un nom technique (slug)
 */
function slugify($text)
{
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text); // Enlève accents
    $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);      // Supprime caractères spéciaux
    $text = strtolower(trim($text));
    return preg_replace('/\s+/', '_', $text);                 // Espace -> _
}


/* =========================
   AJOUT D'UNE CATÉGORIE
   ========================= */
if (isset($_POST['new_categorie_affichage'])) {

    $newAffichage = trim($_POST['new_categorie_affichage']);
    $newNom = slugify($newAffichage);

    if ($newAffichage === '' || $newNom === '') {
        $ajout_error = "Le nom d’affichage est obligatoire.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO categories (nom, nom_affichage, active) VALUES (?, ?, 1)");
        if ($stmt->execute([$newNom, $newAffichage])) {
            header("Location: dashboard_categories.php?ajout=success");
            exit;
        } else {
            $ajout_error = "Erreur lors de l'ajout.";
        }
    }
}


/* =========================
   TRAITEMENT AJAX JSON (modif / suppression)
   ========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST)) {

    $data = json_decode(file_get_contents("php://input"), true);

    /* --- MODIFICATION CATÉGORIE --- */
    if (isset($data['update_id'], $data['new_nom_affichage'])) {

        $updateId = (int)$data['update_id'];
        $newAffichage = trim($data['new_nom_affichage']);
        $newNom = slugify($newAffichage);

        if ($newAffichage === '' || $newNom === '') {
            echo json_encode(['success' => false, 'message' => 'Le nom ne doit pas être vide.']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE categories SET nom = ?, nom_affichage = ? WHERE id = ?");
        $stmt->execute([$newNom, $newAffichage, $updateId]);

        echo json_encode(['success' => true]);
        exit;
    }

    /* --- SUPPRESSION CATÉGORIE --- */
    if (isset($data['delete_id'])) {

        $deleteId = (int)$data['delete_id'];
        $forceDelete = !empty($data['force']);

        // Récupération infos
        $stmt = $pdo->prepare("SELECT nom_affichage, active, active_galerie FROM categories WHERE id = ?");
        $stmt->execute([$deleteId]);
        $cat = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cat) {
            echo json_encode(['success' => false, 'message' => "Catégorie introuvable."]);
            exit;
        }

        // Vérification des images liées
        $stmt = $pdo->prepare("SELECT id, image FROM galeries WHERE categorie_id = ?");
        $stmt->execute([$deleteId]);
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $produitCount = count($produits);

        if (($cat['active'] || $cat['active_galerie'] || $produitCount > 0) && !$forceDelete) {
            $raisons = [];
            if ($cat['active']) $raisons[] = "active sur le site";
            if ($cat['active_galerie']) $raisons[] = "visible dans la galerie";
            if ($produitCount > 0) $raisons[] = "$produitCount image(s) liée(s)";

            echo json_encode([
                'success' => false,
                'confirm_required' => true,
                'message' => "La catégorie « {$cat['nom_affichage']} » est encore " . implode(" et ", $raisons) . ". Voulez-vous vraiment la supprimer ?"
            ]);
            exit;
        }

        // Suppression des fichiers images
        foreach ($produits as $produit) {
            if (!empty($produit['image'])) {
                $imageFile = IMAGES_PATH . basename($produit['image']);
                if (file_exists($imageFile) && is_file($imageFile)) {
                    @unlink($imageFile);
                }
            }
        }

        // Suppression en base
        $pdo->prepare("DELETE FROM galeries WHERE categorie_id = ?")->execute([$deleteId]);
        $pdo->prepare("DELETE FROM categories WHERE id = ?")->execute([$deleteId]);

        echo json_encode(['success' => true]);
        exit;
    }

    echo json_encode(['success' => false, 'message' => 'Requête non reconnue.']);
    exit;
}


/* =========================
   ACTIVATION / DÉSACTIVATION
   ========================= */
if (isset($_GET['toggle_categorie_id'])) {

    $toggleId = (int)$_GET['toggle_categorie_id'];

    $stmt = $pdo->prepare("SELECT active FROM categories WHERE id = ?");
    $stmt->execute([$toggleId]);
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categorie) {
        $pdo->prepare("UPDATE categories SET active = ? WHERE id = ?")
            ->execute([$categorie['active'] ? 0 : 1, $toggleId]);
    }

    header("Location: dashboard_categories.php");
    exit;
}


/* =========================
   PAGINATION + LISTE CATÉGORIES
   ========================= */
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

try {
    $total = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
    $pages = ceil($total / $limit);

    $stmt = $pdo->prepare("
        SELECT c.*, COUNT(g.id) AS galerie_count
        FROM categories c
        LEFT JOIN galeries g ON c.id = g.categorie_id
        GROUP BY c.id
        ORDER BY c.nom_affichage ASC
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $categories = [];
    $error = $e->getMessage();
}

// AFFICHAGE HTML
include 'categories_view.php';
