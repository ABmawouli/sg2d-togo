// dashboard_script.js

// Fonction pour activer/désactiver les listes déroulantes
function toggleVisibility(buttonId, listId) {
  const btn = document.getElementById(buttonId);
  const list = document.getElementById(listId);

  if (btn && list) {
    btn.addEventListener('click', () => {
      const isVisible = list.style.display === 'block';
      list.style.display = isVisible ? 'none' : 'block';
      btn.textContent = btn.textContent.replace(isVisible ? '▼' : '▶', isVisible ? '▶' : '▼');
    });
  }
}

// Fonction principale appelée après que les données sont définies
function initializeDashboard(categoryNames, productCounts) {
  // Initialisation des toggles
  toggleVisibility('toggleActive', 'listActive');
  toggleVisibility('toggleInactive', 'listInactive');
  toggleVisibility('toggleVisible', 'listVisible');
  toggleVisibility('toggleNonVisible', 'listNonVisible');

  // Trie les données par quantité croissante
  const sortedData = categoryNames.map((name, idx) => ({
    name,
    count: productCounts[idx]
  })).sort((a, b) => a.count - b.count);

  const sortedLabels = sortedData.map(item => item.name);
  const sortedCounts = sortedData.map(item => item.count);

  // Création du graphique avec Chart.js
  const ctx = document.getElementById('dashboardChart').getContext('2d');
  const dashboardChart = new Chart(ctx, {
    data: {
      labels: sortedLabels,
      datasets: [
        {
          type: 'bar',
          label: 'Nombre d\'Images',
          data: sortedCounts,
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          borderWidth: 1
        },
        {
          type: 'line',
          label: 'Courbe (quantité croissante)',
          data: sortedCounts,
          borderColor: 'rgba(255, 99, 132, 0.8)',
          borderWidth: 2,
          fill: false,
          tension: 0.3,
          pointRadius: 5,
          pointHoverRadius: 7
        }
      ]
    },
    options: {
      responsive: true,
      interaction: {
        mode: 'nearest',
        axis: 'x',
        intersect: false
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Nombre d\'Images'
          }
        },
        x: {
          title: {
            display: true,
            text: 'Catégories'
          }
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top'
        },
        tooltip: {
          mode: 'index',
          intersect: false
        },
        title: {
          display: true,
          text: 'Répartition des Images par catégorie'
        }
      }
    }
  });
}
