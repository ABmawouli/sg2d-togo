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
  <title>Catégories - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="categories_style.css"> -->
    <link rel="stylesheet" href="../admin-min-style.css" />

  <style>
    input[readonly] {
  background-color: #f0f0f0;
  cursor: not-allowed;
}

  </style>
</head>

<body>

  <div class="sidebar">
    <h4>Administrateur</h4>
    <h3>Liens rapides</h3>
    <a href="../dashboard_principal/dashboard_principal.php">Accueil</a>
    <a href="../gestion_produits/dashboard_produits.php">Gestion Images</a>
  </div>

  <div class="main-content">
    <h1>Gestion des Catégories</h1>

    <?php if (isset($_GET['ajout']) && $_GET['ajout'] === 'success'): ?>
      <p style="color:green;">Catégorie ajoutée avec succès.</p>
    <?php endif; ?>

    <?php if (!empty($ajout_error)): ?>
      <p style="color:red;"><?= htmlspecialchars($ajout_error) ?></p>
    <?php endif; ?>

    <form method="POST" onsubmit="return validerNomTechnique();">
      <h3>Ajouter une nouvelle catégorie</h3>

      <!-- Nom affichage d'abord -->
      <label for="nom_affichage">Nom affichage (ex: Observation nocturne)</label>
      <input type="text" id="nom_affichage" name="new_categorie_affichage" placeholder="Nom affichage" required>

      <label for="nom">Nom technique (ex: observation_nocturne)</label>
      <input type="text" id="nom" name="new_categorie_nom" placeholder="Nom technique" required readonly>
      <div id="erreur-nom" style="color:red; font-size: 0.9em;"></div>

      <button type="submit">Ajouter</button>
    </form>

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
            <th>N°</th>
            <th>Nom technique</th>
            <th>Nom affichage</th>
            <th>Images</th>
            <th>État</th>
            <th>Activer / Désactiver</th>
            <th>Modifier</th>
            <th>Enregistrer</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $index => $cat): ?>
            <tr class="<?= !$cat['active'] ? 'inactive' : '' ?>" id="row-<?= $cat['id'] ?>">
              <td><?= (($page - 1) * $limit) + $index + 1 ?></td>

              <td>
                <span class="cat-name" id="name-<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom']) ?></span>
                <input type="text" class="edit-input" id="input-nom-<?= $cat['id'] ?>" value="<?= htmlspecialchars($cat['nom']) ?>" style="display:none;" readonly>
              </td>

              <td>
                <span class="cat-affichage" id="affichage-<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom_affichage']) ?></span>
                <input type="text" class="edit-input" id="input-affichage-<?= $cat['id'] ?>" value="<?= htmlspecialchars($cat['nom_affichage']) ?>" style="display:none;">
              </td>

              <td><?= $cat['galerie_count'] ?></td>
              <td><?= $cat['active'] ? 'Active' : 'Désactivée' ?></td>
              <td>
                <a class="btn <?= $cat['active'] ? 'btn-danger' : 'btn-success' ?>"
                  href="?toggle_categorie_id=<?= $cat['id'] ?>#row-<?= $cat['id'] ?>"
                  onclick="return confirm('Voulez-vous vraiment <?= $cat['active'] ? 'désactiver' : 'activer' ?> cette catégorie ?')">
                  <?= $cat['active'] ? 'Désactiver' : 'Activer' ?>
                </a>
              </td>
              <td><a class="btn btn-edit" onclick="editCategorie(<?= $cat['id'] ?>)">Modifier</a></td>
              <td><a class="btn btn-success" id="save-<?= $cat['id'] ?>" style="display:none;" onclick="saveCategorie(<?= $cat['id'] ?>)">Enregistrer</a></td>
              <td><a class="btn btn-danger" href="javascript:void(0);" onclick="deleteCategorie(<?= $cat['id'] ?>)">Supprimer</a></td>
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
    // Fonction pour capitaliser la première lettre
    function capitalizeFirstLetter(str) {
      return str.length > 0 ? str.charAt(0).toUpperCase() + str.slice(1) : str;
    }

    // Fonction pour générer le nom technique à partir du nom affichage
    function generateNomTechnique(str) {
      return str
        .toLowerCase()
        .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Supprimer accents
        .replace(/\s+/g, '_') // Espaces → underscores
        .replace(/[^a-z0-9_-]/g, ''); // Supprimer caractères invalides
    }

    // Appliquer sur tous les inputs affichage dans le tableau
    document.querySelectorAll("input[id^='input-affichage-']").forEach(inputAffichage => {
      inputAffichage.addEventListener('input', function() {
        const id = this.id.replace('input-affichage-', '');
        // Capitaliser la première lettre dans le champ affichage
        this.value = capitalizeFirstLetter(this.value);

        // Trouver le champ nom technique correspondant
        const inputNom = document.getElementById('input-nom-' + id);
        if (inputNom) {
          inputNom.value = generateNomTechnique(this.value);
        }
      });
    });
  </script>

  <!-- Scripts JS -->
  <script>
    // Validation du nom technique
    function validerNomTechnique() {
      const champ = document.getElementById('nom');
      const erreur = document.getElementById('erreur-nom');
      const valeur = champ.value.trim();
      const regexValide = /^[a-z0-9_-]+$/;

      if (!regexValide.test(valeur)) {
        erreur.textContent = "❌ Seulement lettres minuscules, chiffres, tirets (-) ou underscores (_).";
        return false;
      }

      erreur.textContent = "";
      return true;
    }

    const affichageInput = document.getElementById('nom_affichage');
    const techniqueInput = document.getElementById('nom');

    // Auto-génération du nom technique + majuscule au début du nom affichage
    affichageInput.addEventListener('input', function() {
      let affichage = this.value;

      // Mettre la première lettre en majuscule, le reste inchangé
      if (affichage.length > 0) {
        affichage = affichage.charAt(0).toUpperCase() + affichage.slice(1);
        this.value = affichage;
      }

      const technique = affichage
        .toLowerCase()
        .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Supprime accents
        .replace(/\s+/g, '_') // Espaces → underscores
        .replace(/[^a-z0-9_-]/g, ''); // Supprime caractères invalides

      techniqueInput.value = technique;
      validerNomTechnique();
    });

    // Édition
    function editCategorie(id) {
      document.getElementById(`name-${id}`).style.display = 'none';
      document.getElementById(`affichage-${id}`).style.display = 'none';
      document.getElementById(`input-nom-${id}`).style.display = 'inline-block';
      document.getElementById(`input-affichage-${id}`).style.display = 'inline-block';
      document.getElementById(`save-${id}`).style.display = 'inline-block';
    }

    // Sauvegarde
    function saveCategorie(id) {
      const inputNom = document.getElementById(`input-nom-${id}`);
      const inputAffichage = document.getElementById(`input-affichage-${id}`);
      const newNom = inputNom.value.trim();
      const newNomAffichage = inputAffichage.value.trim();

      if (newNom === '' || newNomAffichage === '') {
        alert("Les deux champs sont obligatoires.");
        return;
      }

      const regexValide = /^[a-z0-9_-]+$/;
      if (!regexValide.test(newNom)) {
        alert("❌ Nom technique invalide.");
        return;
      }

      fetch('dashboard_categories.php', {
          method: 'POST',
          body: JSON.stringify({
            update_id: id,
            new_nom: newNom,
            new_nom_affichage: newNomAffichage
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            document.getElementById(`name-${id}`).textContent = newNom;
            document.getElementById(`affichage-${id}`).textContent = newNomAffichage;

            document.getElementById(`name-${id}`).style.display = 'inline';
            document.getElementById(`affichage-${id}`).style.display = 'inline';
            inputNom.style.display = 'none';
            inputAffichage.style.display = 'none';
            document.getElementById(`save-${id}`).style.display = 'none';
          } else {
            alert(data.message || "Erreur lors de la mise à jour.");
          }
        })
        .catch(() => alert("Erreur serveur."));
    }

    // Suppression
    function deleteCategorie(id) {
      if (!confirm("Voulez-vous vraiment supprimer cette catégorie ?")) return;

      fetch('dashboard_categories.php', {
          method: 'POST',
          body: JSON.stringify({
            delete_id: id
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            const row = document.getElementById(`row-${id}`);
            if (row) row.remove();
          } else if (data.confirm_required) {
            if (confirm(data.message)) {
              fetch('dashboard_categories.php', {
                  method: 'POST',
                  body: JSON.stringify({
                    delete_id: id,
                    force: true
                  }),
                  headers: {
                    'Content-Type': 'application/json'
                  }
                })
                .then(res => res.json())
                .then(res2 => {
                  if (res2.success) {
                    const row = document.getElementById(`row-${id}`);
                    if (row) row.remove();
                  } else {
                    alert(res2.message || "Suppression échouée.");
                  }
                });
            }
          } else {
            alert(data.message || "Erreur lors de la suppression.");
          }
        })
        .catch(() => alert("Erreur serveur."));
    }

    // Recherche
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