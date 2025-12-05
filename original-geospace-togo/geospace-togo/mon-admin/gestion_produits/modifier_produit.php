<?php
session_start();

// Charger config.php
require_once __DIR__ . '/../../mon_config/config.php'; 
require_once BASE_PATH . 'mon_config/connection_db.php';

// Vérifier si admin connecté
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

// Vérifier l'ID
if (!isset($_GET['id'])) {
    echo "ID de l'image non spécifié.";
    exit;
}

$product_id = $_GET['id'];

// Récupérer l'image
try {
    $query = "SELECT * FROM galeries WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produit) {
        echo "Image non trouvée.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération de l'image : " . $e->getMessage();
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $image_finale = $produit['image']; // Par défaut, conserver l'ancienne image

    // Vérifier si une nouvelle image a été uploadée
    if (!empty($_FILES['image']['name'])) {

        // Générer un nom unique pour éviter les collisions
        $nom_image_unique = uniqid() . "_" . basename($_FILES['image']['name']);

        // Chemin serveur pour move_uploaded_file
        $chemin_upload = IMAGES_PATH . $nom_image_unique;

        // Vérifier le type MIME (optionnel mais recommandé)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['image']['tmp_name']);
        finfo_close($finfo);

        if (in_array($mime_type, $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin_upload)) {

                // Supprimer l'ancienne image si elle existe
                $ancienne_image = IMAGES_PATH . $produit['image'];
                if (file_exists($ancienne_image) && is_file($ancienne_image)) {
                    unlink($ancienne_image);
                }

                $image_finale = $nom_image_unique;
            } else {
                echo "Erreur lors de l'upload de l'image.";
                exit;
            }
        } else {
            echo "Format de fichier non autorisé.";
            exit;
        }
    }

    // Mise à jour de la base de données
    try {
        $update_query = "UPDATE galeries SET nom = :nom, description = :description, image = :image WHERE id = :id";
        $update_stmt = $pdo->prepare($update_query);
        $update_stmt->bindParam(':nom', $nom);
        $update_stmt->bindParam(':description', $description);
        $update_stmt->bindParam(':image', $image_finale);
        $update_stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $update_stmt->execute();

        header("Location: modifier_produit.php?id=" . $product_id . "&updated=1");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une Image</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.05);
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #111827;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 24px;
            font-size: 15px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            background-color: #f9fafb;
            transition: all 0.25s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        img {
            display: block;
            margin: 12px auto 24px;
            max-width: 150px;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
        }

        button {
            display: block;
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2563eb;
        }

        a {
            display: block;
            margin-top: 24px;
            text-align: center;
            font-size: 15px;
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            form {
                padding: 24px;
                margin: 30px 16px;
            }

            button {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <div class="notification">Image mis à jour avec succès.</div>
    <?php endif; ?>

    <h2 style="text-align: center;">Modifier l'image</h2>

   <form action="modifier_produit.php?id=<?= $produit['id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']); ?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required><?= htmlspecialchars($produit['description']); ?></textarea>

    <label for="image">Nouvelle image (facultatif) :</label>
    <input type="file" id="image" name="image">

    <p>Image actuelle :</p>
    <img src="<?= IMAGES_URL . htmlspecialchars($produit['image']); ?>" alt="Image" width="120">

    <button type="submit">Mettre à jour l'image</button>
    <a href="dashboard_produits.php" style="display: inline-block; margin-top: 10px;">← Retour à la liste des images</a>
</form>


</body>

</html>