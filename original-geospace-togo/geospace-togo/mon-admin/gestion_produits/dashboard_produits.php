<?php
session_start();
require_once __DIR__ . '/../../mon_config/config.php';
// Pagination
$galeries_par_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $galeries_par_page;

// Catégories
$categories_stmt = $pdo->query("SELECT * FROM categories ORDER BY nom ASC");
$categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);
$categorie_id = isset($_GET['categorie_id']) ? (int)$_GET['categorie_id'] : 0;

// Activation toggle
if (isset($_GET['toggle_categorie_id'])) {
    $toggle_id = (int)$_GET['toggle_categorie_id'];
    $etat = $pdo->prepare("SELECT active FROM categories WHERE id = :id");
    $etat->execute([':id' => $toggle_id]);
    $actuel = $etat->fetchColumn();
    if ($actuel !== false) {
        $pdo->prepare("UPDATE categories SET active = :active WHERE id = :id")
            ->execute([':active' => !$actuel, ':id' => $toggle_id]);
        header("Location: ?categorie_id=$categorie_id&page=$page");
        exit();
    }
}

// galeries
$where = $categorie_id ? "WHERE c.id = :categorie_id" : "";
$query = "
  SELECT g.id, g.nom, g.image, c.nom AS categorie
  FROM galeries g
  JOIN categories c ON g.categorie_id = c.id
  $where
  ORDER BY g.nom ASC
  LIMIT :offset, :galeries_par_page";
$stmt = $pdo->prepare($query);
if ($categorie_id) $stmt->bindParam(':categorie_id', $categorie_id, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':galeries_par_page', $galeries_par_page, PDO::PARAM_INT);
$stmt->execute();
$galeries = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Total galeries
if ($categorie_id) {
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM galeries WHERE categorie_id = :categorie_id");
    $countStmt->execute([':categorie_id' => $categorie_id]);
    $total_galeries = $countStmt->fetchColumn();
} else {
    $total_galeries = $pdo->query("SELECT COUNT(*) FROM galeries")->fetchColumn();
}
$total_pages = ceil($total_galeries / $galeries_par_page);

// ✅ Maintenant que les variables sont prêtes, on inclut la vue
include 'produits_view.php';
