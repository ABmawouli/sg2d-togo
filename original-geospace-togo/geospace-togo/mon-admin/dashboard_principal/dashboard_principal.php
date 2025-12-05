<?php
session_start();

// Vérification accès admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

// Charger config.php une seule fois
require_once __DIR__ . '/../../mon_config/config.php'; // Ajuster selon ton arborescence
// Ensuite, utiliser BASE_PATH pour tous les autres includes
require_once BASE_PATH . 'mon_config/connection_db.php';
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Total de produits
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM galeries");
    $totalProduits = $stmt->fetchColumn();

    // ----------- Comptage par statut 'active' -----------
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE active = 1");
    $stmt->execute();
    $totalCategoriesActives = $stmt->fetchColumn();

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE active = 0");
    $stmt->execute();
    $totalCategoriesInactives = $stmt->fetchColumn();

    // ----------- Comptage par statut 'active_galerie' -----------
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE active_galerie = 1");
    $stmt->execute();
    $totalCategoriesVisibles = $stmt->fetchColumn();

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE active_galerie = 0");
    $stmt->execute();
    $totalCategoriesNonVisibles = $stmt->fetchColumn();

   // ----------- Produits par catégorie active OU visible -----------
$stmt = $pdo->prepare("
    SELECT c.nom, COUNT(g.id) AS galerie_count 
    FROM categories c
    LEFT JOIN galeries g ON g.categorie_id = c.id
    WHERE c.active = 1 OR c.active_galerie = 1
    GROUP BY c.id
");
$stmt->execute(); 
$categories = $stmt->fetchAll(); 


    // ----------- Listes de catégories par statut -----------
    // Catégories actives
    $stmt = $pdo->prepare("SELECT nom FROM categories WHERE active = 1 ORDER BY nom");
    $stmt->execute();
    $categoriesActives = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Catégories inactives
    $stmt = $pdo->prepare("SELECT nom FROM categories WHERE active = 0 ORDER BY nom");
    $stmt->execute();
    $categoriesInactives = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Catégories visibles dans la galerie
    $stmt = $pdo->prepare("SELECT nom FROM categories WHERE active_galerie = 1 ORDER BY nom");
    $stmt->execute();
    $categoriesVisibles = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Catégories non visibles dans la galerie
    $stmt = $pdo->prepare("SELECT nom FROM categories WHERE active_galerie = 0 ORDER BY nom");
    $stmt->execute();
    $categoriesNonVisibles = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Enregistrer la date de modification
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['derniere_modification'] = "Modification des images ou catégories";
        $_SESSION['derniere_visite'] = date("Y-m-d H:i:s");
    }

    // Données pour affichage (graphiques/tableaux)
    $categoryNames = array_column($categories, 'nom');
    $productCounts = array_column($categories, 'galerie_count');
} catch (PDOException $e) {
    die("<div class='alert alert-danger'>Erreur : " . htmlspecialchars($e->getMessage()) . "</div>");
}
include 'dashboard_view.php';
