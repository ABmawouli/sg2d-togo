<?php
session_start();

// Vérification accès admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

// Charger config.php
require_once __DIR__ . '/../../mon_config/config.php'; 

// Ajout d'une nouvelle catégorie
if (isset($_POST['new_categorie_nom'])) {
    $newNom = trim($_POST['new_categorie_nom']);

    if ($newNom === '') {
        $ajout_error = "Le nom de la catégorie ne peut pas être vide.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO categories (nom, active) VALUES (?, 1)");
        $success = $stmt->execute([$newNom]);
        if ($success) {
            header("Location: dashboard_catalogue.php?ajout=success");
            exit;
        } else {
            $ajout_error = "Erreur lors de l'ajout.";
        }
    }
}

// Traitement AJAX pour mise à jour nom catégorie et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST)) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['update_id'], $data['new_nom'])) {
        $updateId = (int)$data['update_id'];
        $newNom = trim($data['new_nom']);

        if ($newNom === '') {
            echo json_encode(['success' => false, 'message' => 'Nom vide.']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE categories SET nom = ? WHERE id = ?");
        $stmt->execute([$newNom, $updateId]);

        echo json_encode(['success' => true]);
        exit;
    }

    if (isset($data['delete_id'])) {
        $deleteId = (int)$data['delete_id'];
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$deleteId]);

        echo json_encode(['success' => true]);
        exit;
    }
}

// Activation/désactivation catégorie
if (isset($_GET['toggle_categorie_id'])) {
    $toggleId = (int)$_GET['toggle_categorie_id'];
    $stmt = $pdo->prepare("SELECT active_galerie FROM categories WHERE id = ?");
    $stmt->execute([$toggleId]);
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categorie) {
        $newState = $categorie['active_galerie'] ? 0 : 1;
        $update = $pdo->prepare("UPDATE categories SET active_galerie = ? WHERE id = ?");
        $update->execute([$newState, $toggleId]);
    }

    header("Location: dashboard_catalogue.php");
    exit;
}

// Pagination
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
        ORDER BY c.nom ASC
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

// Inclure la vue à la fin, dans le PHP
include 'catalogue_view.php';
?>
