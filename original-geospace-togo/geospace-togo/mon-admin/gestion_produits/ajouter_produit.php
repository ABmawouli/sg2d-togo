<?php
session_start();
require_once __DIR__ . '/../../mon_config/config.php';
require_once BASE_PATH . 'mon_config/config.php';

$host = DB_HOST;
$dbname = DB_NAME;
$username = DB_USER;
$password = DB_PASSWORD;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT id, nom FROM categories";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-wrapper {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #222;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #444;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            background-color: #fafafa;
            box-sizing: border-box;
        }

        input:focus,
        textarea:focus {
            border-color: #007bff;
            background-color: #fff;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 14px;
            font-size: 1em;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            grid-column: 1 / -1;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .lien-action {
            text-align: center;
            margin-top: 25px;
        }

        .lien-action a {
            margin: 0 12px;
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .lien-action a:hover {
            text-decoration: underline;
        }

        #message {
            margin-top: 20px;
            text-align: center;
            color: green;
        }

        /* ✅ Catégories en grille (type radio) */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 10px;
            margin-top: 8px;
        }

        .categorie-checkbox {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            border: 1px solid #007bff;
            border-radius: 6px;
            background-color: #e9f5ff;
            color: #0056b3;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .categorie-checkbox input {
            margin-right: 8px;
        }

        .categorie-checkbox:hover {
            background-color: #d0eaff;
        }

        @media (min-width: 768px) {
            form {
                grid-template-columns: 1fr 1fr;
                column-gap: 25px;
            }

            textarea,
            input[type="file"],
            input[type="submit"],
            .categories-grid {
                grid-column: span 2;
            }
        }

        @media (max-width: 480px) {
            .form-wrapper {
                padding: 25px;
            }

            h1 {
                font-size: 1.4em;
            }

            input,
            textarea {
                font-size: 0.95em;
            }
        }

        .required {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="form-wrapper">
        <h1>Ajouter une image</h1>
        <form id="ajouterProduitForm" enctype="multipart/form-data">
            <label for="nom">Nom de l'image : <span class="required">*</span></label>
            <input type="text" id="nom" name="nom" required placeholder="nom de l'image, debuter en majuscule">

            <label for="description">Description : <span class="required">*</span></label>
            <textarea id="description" name="description" required placeholder="La description de l'image"></textarea>

             <label for="image">Image : <span class="required">*</span></label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label>Catégorie : <span class="required">*</span></label>
            <div class="categories-grid">
                <?php foreach ($categories as $categorie): ?>
                    <label class="categorie-checkbox">
                        <input type="radio" name="categorie_id" value="<?= $categorie['id']; ?>" required>
                        <?= htmlspecialchars($categorie['nom']); ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <input type="submit" value="Ajouter l'image">
        </form>


        <div class="lien-action">
            <a href="dashboard_produits.php">Liste des Images</a>
            <a href="../../index.php">Retour au Site</a>
            <a href="../../pages/catalogue.php">Galerie</a>
            <a href="../logout.php">Se déconnecter</a>
        </div>

        <div id="message"></div>
    </div>

    <script>
        document.getElementById('ajouterProduitForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('traitement_produit.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('message').innerHTML = data;

                    if (data.indexOf("Image ajoutée avec succès") !== -1) {
                        document.getElementById('ajouterProduitForm').reset();
                    }
                })
                .catch(error => {
                    document.getElementById('message').innerHTML = "Erreur : " + error;
                });
        });
    </script>
</body>

</html>