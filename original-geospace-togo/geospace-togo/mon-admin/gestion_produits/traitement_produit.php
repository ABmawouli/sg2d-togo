<?php
session_start();

require_once __DIR__. '/../../mon_config/config.php';
// Connexion PDO
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer toutes les catégories pour le select (si besoin)
$categories_stmt = $pdo->query("SELECT id, nom FROM categories ORDER BY nom ASC");
$categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $categorie_id = (int)($_POST['categorie_id'] ?? 0);

    // Vérifications simples
    if ($nom === '') {
        echo "❌ Le nom de l'image est obligatoire.";
        exit;
    }

    if ($categorie_id <= 0) {
        echo "❌ Veuillez sélectionner une catégorie valide.";
        exit;
    }

    if ($description === '') {
        echo "❌ La description est obligatoire.";
        exit;
    }

    // Gestion de l'image
    $image = $_FILES['image'] ?? null;

    if (!$image || $image['error'] !== 0) {
        echo "❌ Aucune image téléchargée ou une erreur est survenue.";
        exit;
    }

    $image_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($image_ext, $allowed_ext)) {
        echo "❌ Type de fichier non autorisé. Formats autorisés : jpg, jpeg, png, gif.";
        exit;
    }

    // Nom unique pour l'image
    $image_base_name = pathinfo($image['name'], PATHINFO_FILENAME);
    $image_new_name = preg_replace("/[^a-zA-Z0-9_-]/", "", $image_base_name) . '_' . time() . '.' . $image_ext;

    // Destination finale
// Définir le chemin vers le dossier images
$image_destination = IMAGES_PATH . $image_new_name;

    if (!move_uploaded_file($image['tmp_name'], $image_destination)) {
        echo "❌ Erreur lors du déplacement du fichier image.";
        exit;
    }

    // Insertion en base avec description
    try {
        $stmt = $pdo->prepare("
            INSERT INTO galeries (nom, description, image, categorie_id) 
            VALUES (:nom, :description, :image, :categorie_id)
        ");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image_new_name);
        $stmt->bindParam(':categorie_id', $categorie_id);

        if ($stmt->execute()) {
            echo "✅ Image ajoutée avec succès !";
        } else {
            echo "❌ Échec de l'ajout de l'image.";
        }
    } catch (PDOException $e) {
        echo "❌ Erreur SQL : " . $e->getMessage();
    }
}
?>
