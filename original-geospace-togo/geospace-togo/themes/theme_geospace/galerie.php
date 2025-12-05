<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Galerie - GEOSPACE TOGO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php echo head_contents(); ?>
  <?php echo $metatags; ?>

  <!-- Polices Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
  <!-- FontAwesome pour les icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- CSS GEOSPACE TOGO -->
  <link href="<?php echo theme_path(); ?>css/barlow.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo theme_path(); ?>genericons/genericons.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/mon_style.css">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">
  <link rel="shortcut icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">

  <script type="text/javascript" src="<?php echo theme_path(); ?>js/jquery.js"></script>

  <style>
    .galerie-hero {
      background: linear-gradient(135deg, var(--bleu-profond) 0%, #003d7a 100%);
      color: var(--blanc-lunaire);
      padding: 3rem 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .galerie-hero h1 {
      color: var(--blanc-lunaire);
      margin-bottom: 0.5rem;
      position: relative;
      z-index: 1;
    }

    .galerie-hero p {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.1rem;
      position: relative;
      z-index: 1;
    }

    .galerie-filters {
      position: sticky;
      top: 0;
      background: #fff;
      z-index: 100;
      padding: 1rem 0;
      border-bottom: 1px solid #ddd;
    }

    .galerie-filters-container {
      display: flex;
      justify-content: flex-start;
      gap: 1rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .galerie-product-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .galerie-product-card {
      background: #fff;
      border: 1px solid #eee;
      padding: 1rem;
      position: relative;
      text-align: center;
      transition: transform 0.2s;
    }

    .galerie-product-card:hover {
      transform: translateY(-5px);
    }

    .galerie-badge-new {
      position: absolute;
      top: 0.5rem;
      left: 0.5rem;
      background: var(--rouge);
      color: #fff;
      padding: 0.3rem 0.6rem;
      font-size: 0.8rem;
      border-radius: 3px;
    }

    .galerie-no-results {
      text-align: center;
      font-style: italic;
      color: #666;
    }

    .galerie-pagination {
      display: flex;
      justify-content: center;
      margin: 2rem 0;
      gap: 0.5rem;
    }

    .galerie-pagination button {
      padding: 0.5rem 1rem;
      border: 1px solid #ccc;
      background: #fff;
      cursor: pointer;
    }

    .galerie-pagination button.active {
      background: var(--bleu-profond);
      color: #fff;
      border-color: var(--bleu-profond);
    }

    .galerie-pagination button.disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    /* Modal */
    .galerie-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
      z-index: 200;
    }

    .galerie-modal.active {
      display: flex;
    }

    .galerie-modal img {
      max-width: 90%;
      max-height: 90%;
    }

    .galerie-modal-close {
      position: absolute;
      top: 1rem;
      right: 1rem;
      font-size: 2rem;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div id="header-placeholder">
    <?php include __DIR__ . '/mes-includes/header.php'; ?>
  </div>

  <!-- Hero Section -->
  <section class="galerie-hero">
    <div class="container">
      <h1>Galerie GEOSPACE TOGO</h1>
      <p>Découvrez nos observations, événements et moments marquants</p>
    </div>
  </section>

  <!-- Section Filtres -->
  <div class="galerie-filters">
    <div class="galerie-filters-container">
      <select id="galerie-categoryFilter">
        <option value="tous">Toutes catégories</option>
      </select>
    </div>
  </div>

  <!-- Grille de produits -->
  <div class="container">
    <div id="galerie-product-list" class="galerie-product-list"></div>
  </div>

  <!-- Pagination -->
  <div id="galerie-pagination" class="galerie-pagination"></div>

  <!-- Modal zoom image -->
  <div id="galerie-imageModal" class="galerie-modal">
    <span id="galerie-closeModal" class="galerie-modal-close">&times;</span>
    <img id="galerie-modalImg" alt="Zoom produit" />
  </div>

  <!-- JavaScript -->
  <script>
    (() => {
      const productList = document.getElementById("galerie-product-list");
      const paginationEl = document.getElementById("galerie-pagination");
      const categoryFilter = document.getElementById("galerie-categoryFilter");

      const PRODUCTS_PER_PAGE = 12;
      let currentPage = 1;
      let produitsTous = [];
      let categories = new Set();

      function normalize(str) {
        return str.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase();
      }

      async function fetchProduits() {
        try {
          const res = await fetch('/geospace-togo/themes/theme_geospace/mes-includes/get_images.php?action=get_produits&categorie=tous');
          const galeries = await res.json();

          if (!Array.isArray(galeries)) {
            console.error("Réponse inattendue :", galeries);
            return;
          }

          produitsTous = galeries.map(g => ({
            ...g,
            categorie: g.categorie ? g.categorie.trim() : "Autre",
            nouveau: Boolean(g.nouveau)
          }));

          categories = new Set(produitsTous.map(g => g.categorie.toLowerCase()));

          populateCategories();
          renderProduits();
        } catch (e) {
          console.error("Erreur lors du chargement des produits:", e);
        }
      }

      function populateCategories() {
        categoryFilter.innerHTML = `<option value="tous">Toutes catégories</option>`;
        [...categories].sort().forEach(cat => {
          const option = document.createElement('option');
          option.value = cat;
          option.textContent = cat.charAt(0).toUpperCase() + cat.slice(1);
          categoryFilter.appendChild(option);
        });
      }

      function getProduitsFiltres() {
        let filtered = produitsTous;
        const cat = categoryFilter.value;

        if (cat !== "tous") {
          filtered = filtered.filter(g => g.categorie.toLowerCase() === cat);
        }

        return filtered;
      }

      function renderProduits() {
        const filtered = getProduitsFiltres();
        const totalPages = Math.ceil(filtered.length / PRODUCTS_PER_PAGE);
        if (currentPage > totalPages) currentPage = totalPages || 1;

        const startIndex = (currentPage - 1) * PRODUCTS_PER_PAGE;
        const pagedProduits = filtered.slice(startIndex, startIndex + PRODUCTS_PER_PAGE);

        productList.innerHTML = pagedProduits.length ?
          pagedProduits.map(g => `
            <div class="galerie-product-card">
              ${g.nouveau ? '<span class="galerie-badge-new">Nouveau</span>' : ''}
              <img src="<?php echo theme_path(); ?>mes-includes/images/${g.image || 'placeholder.png'}" 
                   alt="${g.nom}">
              <h4>${g.nom}</h4>
              <p>${g.description || 'Aucune description disponible.'}</p>
            </div>
          `).join('') :
          `<p class="galerie-no-results">Aucun produit trouvé.</p>`;

        renderPagination(totalPages);
        setupImageZoomModal();
      }

      function setupImageZoomModal() {
        const modal = document.getElementById("galerie-imageModal");
        const modalImg = document.getElementById("galerie-modalImg");
        const closeModal = document.getElementById("galerie-closeModal");

        document.querySelectorAll('.galerie-product-card img').forEach(img => {
          img.addEventListener('click', () => {
            modal.classList.add('active');
            modalImg.src = img.src;
            modalImg.alt = img.alt;
          });
        });

        closeModal.addEventListener('click', () => {
          modal.classList.remove('active');
          modalImg.src = "";
        });

        modal.addEventListener('click', e => {
          if (e.target === modal) {
            modal.classList.remove('active');
            modalImg.src = "";
          }
        });
      }

      function renderPagination(totalPages) {
        if (totalPages <= 1) {
          paginationEl.innerHTML = '';
          return;
        }

        let html = '';
        html += `<button class="galerie-pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
                        data-page="${currentPage - 1}" ${currentPage === 1 ? 'disabled' : ''}>
                  Précédent
                </button>`;

        for (let i = 1; i <= totalPages; i++) {
          html += `<button class="galerie-pagination-btn ${i === currentPage ? 'active' : ''}" 
                          data-page="${i}">
                    ${i}
                  </button>`;
        }

        html += `<button class="galerie-pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
                        data-page="${currentPage + 1}" ${currentPage === totalPages ? 'disabled' : ''}>
                  Suivant
                </button>`;

        paginationEl.innerHTML = html;

        paginationEl.querySelectorAll('button.galerie-pagination-btn:not(.disabled)').forEach(btn => {
          btn.addEventListener('click', () => {
            const page = parseInt(btn.getAttribute('data-page'));
            if (!isNaN(page) && page >= 1 && page <= totalPages) {
              currentPage = page;
              renderProduits();
              window.scrollTo({ top: 0, behavior: 'smooth' });
            }
          });
        });
      }

      categoryFilter.addEventListener('change', () => {
        currentPage = 1;
        renderProduits();
      });

      fetchProduits();
    })();
  </script>

  <!-- Footer -->
  <div id="footer-placeholder">
    <?php include __DIR__ . '/mes-includes/footer.php'; ?>
  </div>

  <script src="<?php echo theme_path(); ?>js/custom.js" id="custom-js"></script>
  <script src="<?php echo theme_path(); ?>js/maison/popper.min.js"></script>
</body>
</html>
