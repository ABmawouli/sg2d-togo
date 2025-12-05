<?php
// Inclusion du fichier de configuration
require_once __DIR__ . '/config.php';  // Inclusion du fichier config.php

// Utilisation des constantes définies dans config.php
$host = DB_HOST;
$db = DB_NAME;
$user = DB_USER;
$pass = DB_PASSWORD;
$charset = 'utf8mb4';

// DSN de connexion à la base de données
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Tentative de connexion à la base de données avec PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
?>

