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
  <title>Tableau de bord Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <link rel="stylesheet" href="dashboard_style.css" /> -->
  <link rel="stylesheet" href="../admin-min-style.css" />

  <style>
    .categories-list {
      display: none;
      margin-top: 10px;
    }

    .toggle-btn {
      cursor: pointer;
      user-select: none;
      margin-bottom: 5px;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header .text-muted {
      margin-left: 10px;
      text-decoration: none;
      color: #666;
      font-weight: 500;
    }

    .header .text-muted:hover {
      text-decoration: underline;
      color: #333;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <h4>Administrateur</h4>
    <a href="../../index.php">Retour Au Site</a>
    <a href="../gestion_produits/dashboard_produits.php">Gestion Images</a>
    <a href="../gestion_categories/dashboard_categories.php">Gestion catégories</a>
    <a href="../gestion_catalogue/dashboard_catalogue.php">Gestion Galerie</a>
    <a href="https://wa.me/22893215014?text=Bonjour%20Admin%20GEOSPACE%20TOGO"
      class="contact-admin" target="_blank">
      Contacter Admin
    </a>
  </div>

  <div class="main">
    <div class="header">
      <h2>Tableau de bord</h2>
      <span class="text-muted">Bienvenue, Admin</span>
      <a href="../logout.php" class="text-muted" style="margin-left: 15px;">Déconnexion</a>
    </div>


    <!-- Cartes statistiques -->
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-box-seam me-2"></i>Images enregistrées</h5>
            <p class="card-text"><?= htmlspecialchars($totalProduits) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card text-white bg-success shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-check-circle me-2"></i>Catégories actives</h5>
            <p class="card-text"><?= htmlspecialchars($totalCategoriesActives) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card text-white bg-danger shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-x-circle me-2"></i>Catégories inactives</h5>
            <p class="card-text"><?= htmlspecialchars($totalCategoriesInactives) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card text-white bg-info shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-eye me-2"></i>Catégories visibles</h5>
            <p class="card-text"><?= htmlspecialchars($totalCategoriesVisibles) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card text-white bg-secondary shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-eye-slash me-2"></i>Catégories non visibles</h5>
            <p class="card-text"><?= htmlspecialchars($totalCategoriesNonVisibles) ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Accordéon pour les catégories -->
    <div class="accordion mb-4" id="categoriesAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingActive">
          <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseActive">
            Catégories actives
          </button>
        </h2>
        <div id="collapseActive" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
          <div class="accordion-body">
            <ul>
              <?php if (!empty($categoriesActives)): ?>
                <?php foreach ($categoriesActives as $cat): ?>
                  <li><?= htmlspecialchars($cat) ?></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li>Aucune catégorie active.</li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingInactive">
          <button class="accordion-button collapsed text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInactive">
            Catégories inactives
          </button>
        </h2>
        <div id="collapseInactive" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
          <div class="accordion-body">
            <ul>
              <?php if (!empty($categoriesInactives)): ?>
                <?php foreach ($categoriesInactives as $cat): ?>
                  <li><?= htmlspecialchars($cat) ?></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li>Aucune catégorie inactive.</li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingVisible">
          <button class="accordion-button collapsed text-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVisible">
            Catégories visibles
          </button>
        </h2>
        <div id="collapseVisible" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
          <div class="accordion-body">
            <ul>
              <?php if (!empty($categoriesVisibles)): ?>
                <?php foreach ($categoriesVisibles as $cat): ?>
                  <li><?= htmlspecialchars($cat) ?></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li>Aucune catégorie visible.</li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingNonVisible">
          <button class="accordion-button collapsed text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNonVisible">
            Catégories non visibles
          </button>
        </h2>
        <div id="collapseNonVisible" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
          <div class="accordion-body">
            <ul>
              <?php if (!empty($categoriesNonVisibles)): ?>
                <?php foreach ($categoriesNonVisibles as $cat): ?>
                  <li><?= htmlspecialchars($cat) ?></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li>Aucune catégorie non visible.</li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Graphique -->
    <div class="row">
      <div class="col-md-12 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Statistiques des Images par Catégorie</h5>
            <canvas id="dashboardChart"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Injection des données PHP pour le graphique -->
  <script>
    const categoryNames = <?= json_encode($categoryNames) ?>;
    const productCounts = <?= json_encode($productCounts) ?>;

    window.addEventListener('DOMContentLoaded', () => {
      initializeDashboard(categoryNames, productCounts);
    });
  </script>

  <script src="dashboard_script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>