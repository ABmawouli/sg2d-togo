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
    body: JSON.stringify({ update_id: id, new_nom: newNom }),
    headers: { 'Content-Type': 'application/json' }
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
    body: JSON.stringify({ delete_id: id }),
    headers: { 'Content-Type': 'application/json' }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const row = document.getElementById(`row-${id}`);
        if (row) row.remove();
      } else {
        alert("Erreur lors de la suppression.");
      }
    })
    .catch(() => alert("Erreur lors de la communication avec le serveur."));
}

document.getElementById('search').addEventListener('input', function () {
  const filter = this.value.toLowerCase();
  const rows = document.querySelectorAll('tbody tr');

  rows.forEach(row => {
    const nom = row.querySelector('.cat-name').textContent.toLowerCase();
    row.style.display = nom.includes(filter) ? '' : 'none';
  });
});




