<?php

// Vérification accès admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tableau de bord Admin - Images</title>
    <!-- <link rel="stylesheet" href="galeries_style.css" /> -->
    <link rel="stylesheet" href="../admin-min-style.css" />


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Copie ton CSS ici ou mieux, utilise un fichier CSS séparé */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        /* ... le reste du CSS ... */
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Page géstion des Images</h4>
        <a href="../dashboard_principal/dashboard_principal.php">Accueil</a>
        <a href="ajouter_produit.php">Ajouter une Image</a>
        <a href="../gestion_categories/dashboard_categories.php">Gestion catégories</a>
    </div>

    <main>
        <div class="container-fluid">
            <h2>Gestion des Images</h2>

            <form method="get" class="mb-3">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <label for="categorie_id">Filtrer par catégorie :</label>
                        <select class="form-select" name="categorie_id" id="categorie_id" onchange="this.form.submit()">
                            <option value="0" <?= $categorie_id == 0 ? 'selected' : '' ?>>Toutes les catégories</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" <?= $category['id'] == $categorie_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <strong>Total images : <?= $total_galeries ?></strong>
                    </div>
                </div>
            </form>

            <?php
            $nom_categorie_selectionnee = 'Toutes les images';
            foreach ($categories as $cat) {
                if ($cat['id'] == $categorie_id) {
                    $nom_categorie_selectionnee = $cat['nom'];
                    break;
                }
            }
            ?>

            <h3 class="mt-5">Images dans la catégorie : <?= htmlspecialchars($nom_categorie_selectionnee) ?></h3>

            <div class="table-responsive">
                <table class="table table-hover align-middle shadow-sm rounded bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($galeries)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Aucune image trouvée.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($galeries as $produit): ?>
                                <tr>
                                    <td>
                                        <img
                                            src="<?= IMAGES_URL . basename($produit['image']) ?>"
                                            alt="<?= htmlspecialchars($produit['nom']) ?>"
                                            style="width:60px; height:auto;"
                                            class="img-thumbnail">
                                    </td>
                                    <td><?= htmlspecialchars($produit['nom']) ?></td>
                                    <td><?= htmlspecialchars($produit['categorie']) ?></td>
                                    <td class="text-end">
                                        <a href="modifier_produit.php?id=<?= $produit['id'] ?>" class="btn btn-sm btn-outline-secondary me-2">Modifier</a>
                                        <a href="supprimer_produit.php?id=<?= $produit['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cette image ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination text-center mt-4">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?categorie_id=<?= $categorie_id ?>&page=<?= $i ?>" class="<?= $page == $i ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </main>

</body>

</html>