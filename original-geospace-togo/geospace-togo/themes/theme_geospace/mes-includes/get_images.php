<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/geospace-togo/mon_config/connection_db.php';
header('Content-Type: application/json; charset=utf-8');

$action = $_GET['action'] ?? '';
$page = $_GET['page'] ?? 'catalogue'; // Par défaut, on considère qu'on est sur la page catalogue

try {
    // --- Récupération des catégories ---
    if ($action === 'get_categories') {
        $query = "SELECT nom_affichage FROM categories";

        if ($page === 'catalogue') {
            $query .= " WHERE active_galerie = 1";
        } elseif ($page === 'index') {
            $query .= " WHERE nom_affichage != 'Cachée'";
        }

        $query .= " ORDER BY nom ASC";
        $stmt = $pdo->query($query);
        echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN), JSON_UNESCAPED_UNICODE);
        exit;
    }

    // --- Récupération des produits ---
    $categorie_affichage = $_GET['categorie'] ?? 'tous';

    if (strtolower($categorie_affichage) === 'tous') {
        $query = "
            SELECT g.id, g.nom, g.description, g.image, g.date_ajout, c.nom_affichage AS categorie
            FROM galeries g
            JOIN categories c ON g.categorie_id = c.id
            WHERE 1=1
        ";

        if ($page === 'catalogue') {
            $query .= " AND c.active_galerie = 1";
        } elseif ($page === 'index') {
            $query .= " AND c.nom_affichage != 'Cachée'";
        }

        $query .= " ORDER BY g.date_ajout DESC";
        $stmt = $pdo->prepare($query);

    } else {
        // Rechercher le nom technique de la catégorie
        $stmt_cat = $pdo->prepare("
            SELECT nom FROM categories WHERE LOWER(nom_affichage) = LOWER(:nom_affichage)
        ");
        $stmt_cat->bindParam(':nom_affichage', $categorie_affichage, PDO::PARAM_STR);
        $stmt_cat->execute();
        $nom_technique = $stmt_cat->fetchColumn();

        if (!$nom_technique) {
            echo json_encode([]); exit;
        }

        $query = "
            SELECT g.id, g.nom, g.description, g.image, g.date_ajout, c.nom_affichage AS categorie
            FROM galeries g
            JOIN categories c ON g.categorie_id = c.id
            WHERE LOWER(c.nom) = LOWER(:categorie)
        ";

        if ($page === 'catalogue') {
            $query .= " AND c.active_galerie = 1";
        } elseif ($page === 'index') {
            $query .= " AND c.nom_affichage != 'Cachée'";
        }

        $query .= " ORDER BY g.date_ajout DESC";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':categorie', $nom_technique, PDO::PARAM_STR);
    }

    $stmt->execute();
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Marquer les nouveaux produits (ajoutés depuis moins de 7 jours)
    $now = new DateTime();
    foreach ($produits as &$prod) {
        $dateAjout = new DateTime($prod['date_ajout']);
        $prod['nouveau'] = ($now >= $dateAjout) && ($now->diff($dateAjout)->days <= 7);
    }

    echo json_encode($produits, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur SQL : ' . $e->getMessage()]);
}
