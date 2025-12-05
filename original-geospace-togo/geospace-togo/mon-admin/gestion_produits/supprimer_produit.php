<?php
session_start();

// Vérifier que l'admin est connecté
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit();
}

// Charger config.php une seule fois
require_once __DIR__ . '/../../mon_config/config.php'; // Ajuster selon ton arborescence
// Ensuite, utiliser BASE_PATH pour tous les autres includes
require_once BASE_PATH . 'mon_config/connection_db.php';
// Récupérer les paramètres id, categorie_id et page pour la redirection
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$categorie_id = isset($_GET['categorie_id']) ? (int)$_GET['categorie_id'] : 0;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($id <= 0) {
    // id invalide : redirection avec message d'erreur
    header("Location: dashboard_produits.php?categorie_id=$categorie_id&page=$page&msg=produit_invalide");
    exit();
}

try {
    // Récupérer l'image du produit avant suppression
    $stmt = $pdo->prepare("SELECT image FROM galeries WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $image = $stmt->fetchColumn();

    if ($image) {
    $chemin_image = IMAGES_PATH . basename($image); // Chemin serveur correct
    if (file_exists($chemin_image) && is_file($chemin_image)) {
        unlink($chemin_image); // Supprimer le fichier image
    }
}


    // Supprimer le produit de la base
    $stmt = $pdo->prepare("DELETE FROM galeries WHERE id = :id");
    $stmt->execute([':id' => $id]);

    // Redirection avec message de succès et conservation des filtres et page
    header("Location: dashboard_produits.php?categorie_id=$categorie_id&page=$page&msg=suppression_reussie");
    exit();

} catch (Exception $e) {
    // En cas d'erreur, redirection avec message d'erreur
    header("Location: dashboard_produits.php?categorie_id=$categorie_id&page=$page&msg=erreur_suppression");
    exit();
}
?>