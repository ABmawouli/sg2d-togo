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
  <!-- Forcer le favicon après head_contents() -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var link = document.querySelector("link[rel~='icon']");
      if (link) {
        link.href = "<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg";
      } else {
        link = document.createElement('link');
        link.rel = 'icon';
        link.href = "<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg";
        document.head.appendChild(link);
      }
    });
  </script>

  <style>
    /* ===================================================================
   GALERIE GEOSPACE TOGO - STYLES PERSONNALISÉS
   Utilise les variables de la charte graphique principale
   =================================================================== */

    /* Section Hero - Bannière d'en-tête */
    .galerie-hero {
      background: linear-gradient(135deg, var(--bleu-profond) 0%, #003d7a 100%);
      color: var(--blanc-lunaire);
      padding: var(--espacement-xl) 0;
      text-align: center;
      position: relative;
      overflow: hidden;
      margin-bottom: var(--espacement-lg);
    }

    .galerie-hero::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(0, 200, 83, 0.1) 0%, transparent 70%);
      border-radius: 50%;
    }

    .galerie-hero h1 {
      color: var(--blanc-lunaire);
      font-size: 2.8rem;
      margin-bottom: var(--espacement-sm);
      position: relative;
      z-index: 1;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .galerie-hero p {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.2rem;
      line-height: 1.6;
      position: relative;
      z-index: 1;
      max-width: 800px;
      margin: 0 auto;
    }

    /* Barre de filtres sticky */
    .galerie-filters {
      position: sticky;
      top: 0;
      background: var(--blanc-lunaire);
      z-index: 100;
      padding: var(--espacement-sm) 0;
      border-bottom: 2px solid var(--vert-orbital);
      box-shadow: var(--ombre-legere);
    }

    .galerie-filters-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: var(--espacement-sm);
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 var(--espacement-sm);
    }

    .galerie-filters button,
    .galerie-filters select {
      padding: 0.6rem 1.2rem;
      font-family: var(--police-corps);
      font-weight: 600;
      font-size: 0.95rem;
      color: var(--bleu-profond);
      background: var(--blanc-lunaire);
      border: 2px solid var(--vert-orbital);
      border-radius: 25px;
      cursor: pointer;
      transition: var(--transition-rapide);
      text-transform: uppercase;
      letter-spacing: 0.03em;
    }

    .galerie-filters button:hover,
    .galerie-filters select:hover {
      background: var(--vert-orbital);
      color: var(--blanc-lunaire);
      transform: translateY(-2px);
      box-shadow: var(--ombre-legere);
    }

    .galerie-filters button.active {
      background: var(--vert-orbital);
      color: var(--blanc-lunaire);
      box-shadow: var(--ombre-moyenne);
    }

    /* Grille de produits */
    .galerie-product-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: var(--espacement-md);
      margin-top: var(--espacement-lg);
      padding: 0 var(--espacement-sm);
    }

    /* Carte produit - IMAGES LIBÉRÉES */
    .galerie-product-card {
      background: var(--blanc-lunaire);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--ombre-legere);
      transition: var(--transition-normale);
      position: relative;
      cursor: pointer;
      border: 2px solid transparent;
      display: flex;
      flex-direction: column;
    }

    .galerie-product-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--ombre-forte);
      border-color: var(--vert-orbital);
    }

    /* Container d'image - Hauteur flexible pour voir toute l'image */
    .galerie-product-card .galerie-image-container {
      width: 100%;
      position: relative;
      overflow: hidden;
      background: var(--gris-clair);
      flex-shrink: 0;
    }

    .galerie-product-card img {
      width: 100%;
      height: auto;
      min-height: 200px;
      max-height: 400px;
      object-fit: cover;
      display: block;
      transition: var(--transition-lente);
    }

    .galerie-product-card:hover img {
      transform: scale(1.05);
    }

    /* Contenu de la carte */
    .galerie-product-card .galerie-card-content {
      padding: var(--espacement-sm);
      text-align: center;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: var(--blanc-lunaire);
    }

    .galerie-product-card h3 {
      font-family: var(--police-titres);
      font-size: 1.2rem;
      color: var(--bleu-profond);
      margin-bottom: var(--espacement-xs);
      font-weight: 600;
      line-height: 1.4;
    }

    .galerie-product-card p {
      color: var(--gris-moyen);
      font-size: 0.95rem;
      line-height: 1.5;
      margin-bottom: 0;
    }

    /* Badge "Nouveau" */
    .galerie-badge-new {
      position: absolute;
      top: var(--espacement-sm);
      left: var(--espacement-sm);
      background: linear-gradient(135deg, var(--jaune-solaire), #ffaa00);
      color: var(--bleu-profond);
      padding: 0.4rem 0.8rem;
      font-size: 0.75rem;
      font-weight: 700;
      border-radius: 20px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      box-shadow: var(--ombre-legere);
      z-index: 10;
    }

    /* Message "Aucun résultat" */
    .galerie-no-results {
      text-align: center;
      padding: var(--espacement-xl) 0;
      color: var(--gris-moyen);
      font-style: italic;
      font-size: 1.1rem;
    }

    /* Pagination */
    .galerie-pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: var(--espacement-xl) 0;
      gap: var(--espacement-xs);
      flex-wrap: wrap;
    }

    .galerie-pagination button {
      padding: 0.6rem 1.2rem;
      min-width: 45px;
      font-family: var(--police-corps);
      font-weight: 600;
      border: 2px solid var(--vert-orbital);
      background: var(--blanc-lunaire);
      color: var(--bleu-profond);
      cursor: pointer;
      transition: var(--transition-rapide);
      border-radius: 8px;
      font-size: 0.95rem;
    }

    .galerie-pagination button:hover:not(.disabled) {
      background: var(--vert-orbital);
      color: var(--blanc-lunaire);
      transform: translateY(-2px);
      box-shadow: var(--ombre-legere);
    }

    .galerie-pagination button.active {
      background: var(--bleu-profond);
      color: var(--blanc-lunaire);
      border-color: var(--bleu-profond);
      box-shadow: var(--ombre-moyenne);
    }

    .galerie-pagination button.disabled {
      opacity: 0.4;
      cursor: not-allowed;
      border-color: var(--gris-clair);
      color: var(--gris-moyen);
    }

    /* Modal - Visionneuse d'images COMPLÈTEMENT LIBÉRÉE */
    .galerie-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 43, 91, 0.97);
      justify-content: center;
      align-items: center;
      z-index: 200;
      padding: 0;
      margin: 0;
    }

    .galerie-modal.active {
      display: flex;
    }

    .galerie-modal-content {
      position: relative;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 4rem 2rem 2rem 2rem;
    }

    .galerie-modal img {
      max-width: 95%;
      max-height: 95%;
      width: auto;
      height: auto;
      object-fit: contain;
      border-radius: 8px;
      box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
      animation: fadeInScale 0.3s ease-out;
    }

    @keyframes fadeInScale {
      from {
        opacity: 0;
        transform: scale(0.9);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .galerie-modal-close {
      position: fixed;
      top: 1rem;
      right: 1rem;
      font-size: 2rem;
      color: var(--blanc-lunaire);
      cursor: pointer;
      background: var(--vert-orbital);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition-rapide);
      font-weight: 300;
      line-height: 1;
      z-index: 201;
      box-shadow: var(--ombre-forte);
    }

    .galerie-modal-close:hover {
      background: var(--jaune-solaire);
      color: var(--bleu-profond);
      transform: rotate(90deg) scale(1.1);
    }

    /* ===================================================================
   RESPONSIVE - Media Queries
   =================================================================== */

    @media screen and (max-width: 992px) {
      .galerie-hero h1 {
        font-size: 2.2rem;
      }

      .galerie-product-list {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: var(--espacement-sm);
      }

      .galerie-product-card img {
        max-height: 350px;
      }
    }

    @media screen and (max-width: 768px) {
      .galerie-hero {
        padding: var(--espacement-lg) 0;
      }

      .galerie-hero h1 {
        font-size: 1.8rem;
      }

      .galerie-hero p {
        font-size: 1rem;
      }

      .galerie-filters-container {
        justify-content: center;
      }

      .galerie-product-list {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      }

      .galerie-product-card img {
        max-height: 300px;
      }

      .galerie-modal-content {
        padding: 3rem 1rem 1rem 1rem;
      }

      .galerie-modal img {
        max-width: 98%;
        max-height: 92%;
      }
    }

    @media screen and (max-width: 480px) {
      .galerie-hero h1 {
        font-size: 1.5rem;
      }

      .galerie-product-list {
        grid-template-columns: 1fr;
      }

      .galerie-product-card img {
        max-height: 280px;
      }

      .galerie-pagination button {
        padding: 0.5rem 0.8rem;
        min-width: 40px;
        font-size: 0.85rem;
      }

      .galerie-modal-close {
        top: 0.5rem;
        right: 0.5rem;
        width: 45px;
        height: 45px;
        font-size: 1.8rem;
      }

      .galerie-modal-content {
        padding: 2.5rem 0.5rem 0.5rem 0.5rem;
      }

      .galerie-modal img {
        max-width: 100%;
        max-height: 94%;
      }
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
              window.scrollTo({
                top: 0,
                behavior: 'smooth'
              });
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