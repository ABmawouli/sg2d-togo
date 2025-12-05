<?php
require_once __DIR__ . '/config.php';

// Désactiver l'affichage des erreurs en production
ini_set('display_errors', 0);
error_reporting(0);

header('Content-Type: application/json; charset=utf-8');

$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) {
    echo json_encode(['error' => 'Le paramètre de recherche est vide.']);
    exit;
}

if (strlen($query) > 100) {
    echo json_encode(['error' => 'La recherche est trop longue.']);
    exit;
}

try {
    // Connexion à la base de données avec options sécurisées
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    // Préparer la requête SQL
    $sql = "SELECT * FROM produits WHERE LOWER(title) LIKE :query OR LOWER(description) LIKE :query";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => '%' . strtolower($query) . '%']);
    $results = $stmt->fetchAll();

    echo json_encode(['results' => $results], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Une erreur est survenue. Veuillez réessayer plus tard.']);
}
