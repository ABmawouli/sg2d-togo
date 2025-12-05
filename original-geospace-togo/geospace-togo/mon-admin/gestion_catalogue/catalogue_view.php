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
  <meta charset="UTF-8">
  <title>Catalogue - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="catalogue_style.css"> -->
    <link rel="stylesheet" href="../admin-min-style.css" />

</head>

<body>
  <div class="sidebar">
    <h4>Administrateur</h4>
    <h3>Liens rapides</h3>
    <a href="../dashboard_principal/dashboard_principal.php">Accueil</a>
    <a href="../gestion_produits/dashboard_produits.php">Gestion images</a>
    <a href="../gestion_produits/ajouter_produit.php">Ajouter images</a>
  </div>

  <div class="main-content">
    <h1>Activer ou descativer les catégories sur la page Galerie</h1>

    <?php if (isset($_GET['ajout']) && $_GET['ajout'] === 'success'): ?>
      <p style="color:green;">Catégorie ajoutée avec succès.</p>
    <?php endif; ?>

    <?php if (!empty($ajout_error)): ?>
      <p style="color:red;"><?= htmlspecialchars($ajout_error) ?></p>
    <?php endif; ?>

    <div class="search-bar">
      <input type="text" id="search" placeholder="Rechercher une catégorie...">
    </div>

    <?php if (!empty($error)): ?>
      <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (empty($categories)): ?>
      <p class="no-categories">Aucune catégorie disponible.</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Catégorie</th>
            <th>Nom</th>
            <th>Images</th>
            <th>État</th>
            <th>Désactiver / Activer</th>
            <!-- <th>Modifier</th> -->
            <!-- <th>Enregistrer</th> -->
            <!-- <th>Supprimer</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $index => $cat): ?>
            <tr class="<?= !$cat['active_galerie'] ? 'inactive' : '' ?>" id="row-<?= $cat['id'] ?>">
              <td><?= (($page - 1) * $limit) + $index + 1 ?></td>
              <td>
                <span class="cat-name" id="name-<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom']) ?></span>
                <input type="text" class="edit-input" id="input-<?= $cat['id'] ?>" value="<?= htmlspecialchars($cat['nom']) ?>" style="display:none;">
              </td>
              <td><?= $cat['produit_count'] ?></td>
              <td><?= $cat['active_galerie'] ? 'Active' : 'Désactivée' ?></td>
              <td>
                <a class="btn <?= $cat['active_galerie'] ? 'btn-danger' : 'btn-success' ?>"
                  href="?toggle_categorie_id=<?= $cat['id'] ?>#row-<?= $cat['id'] ?>"
                  onclick="return confirm('Voulez-vous vraiment <?= $cat['active_galerie'] ? 'désactiver' : 'active_galerie' ?> cette catégorie ?')">
                  <?= $cat['active_galerie'] ? 'Désactiver' : 'Activer' ?>
                </a>
              </td>
              <!-- <td>
                <a class="btn btn-edit" onclick="editCategorie(<?= $cat['id'] ?>)">Modifier</a>
              </td> -->
              <td>
                <a class="btn btn-success" id="save-<?= $cat['id'] ?>" style="display:none;" onclick="saveCategorie(<?= $cat['id'] ?>)">Enregistrer</a>
              </td>
              <!-- <td>
                <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteCategorie(<?= $cat['id'] ?>)">Supprimer</a>
              </td> -->
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
          <a class="<?= $i === $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>
      </div>
    <?php endif; ?>
  </div>

  <script>
    function editCategorie(id) {
      document.getElementById(`name-${id}`).style.display = 'none';
      document.getElementById(`input-${id}`).style.display = 'inline-block';
      document.getElementById(`save-${id}`).style.display = 'inline-block';
    }

    function saveCategorie(id) {
      const input = document.getElementById(`input-${id}`);
      const newNom = input.value.trim();

      if (newNom === '') {
        alert("Le nom ne peut pas être vide.");
        return;
      }

      fetch('dashboard_catalogue.php', {
          method: 'POST',
          body: JSON.stringify({
            update_id: id,
            new_nom: newNom
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            document.getElementById(`name-${id}`).textContent = newNom;
            document.getElementById(`name-${id}`).style.display = 'inline';
            input.style.display = 'none';
            document.getElementById(`save-${id}`).style.display = 'none';
          } else {
            alert(data.message || "Erreur lors de la mise à jour.");
          }
        })
        .catch(() => alert("Erreur lors de la communication avec le serveur."));
    }

    function deleteCategorie(id) {
      if (!confirm("Voulez-vous vraiment supprimer cette catégorie ?")) return;

      fetch('dashboard_catalogue.php', {
          method: 'POST',
          body: JSON.stringify({
            delete_id: id
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const row = document.getElementById(`row-${id}`);
            if (row) row.remove(); // Supprime la ligne directement
          } else {
            alert("Erreur lors de la suppression.");
          }
        })
        .catch(() => alert("Erreur lors de la communication avec le serveur."));
    }

    document.getElementById('search').addEventListener('input', function() {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll('tbody tr');

      rows.forEach(row => {
        const nom = row.querySelector('.cat-name').textContent.toLowerCase();
        row.style.display = nom.includes(filter) ? '' : 'none';
      });
    });
  </script>
</body>

</html>