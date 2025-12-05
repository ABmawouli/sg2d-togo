<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>À Propos - GEOSPACE TOGO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php echo head_contents(); ?>
  <?php echo $metatags; ?>

  <!-- Polices Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

  <!-- FontAwesome pour les icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- CSS GEOSPACE TOGO -->
  <link href="<?php echo theme_path(); ?>css/barlow.css" rel="stylesheet">
  <link rel="stylesheet" id="genericons-css" href="<?php echo theme_path(); ?>genericons/genericons.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/mon_style.css">
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/autrepage_style.css">

  <!-- Mon favicon personnalisé -->
  <link rel="icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">
  <link rel="shortcut icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">

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

  <script type="text/javascript" src="<?php echo theme_path(); ?>js/jquery.js" id="jquery-core-js"></script>
</head>

<body>
  <div id="header-placeholder">
    <?php include 'mes-includes/header.php'; ?>
  </div>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-content container">
      <h1>À Propos de GEOSPACE TOGO</h1>
      <p class="devise">"La Terre est notre demeure, l'Espace est notre avenir"</p>
    </div>
  </section>

  <!-- Mission, Vision, Valeurs -->
  <section class="mvv-section">
    <div class="container">
      <div class="section-title">
        <h2>Notre Raison d'Être</h2>
        <div class="underline"></div>
      </div>

      <div class="mvv-grid">
        <div class="mvv-card">
          <i class="fas fa-bullseye"></i>
          <h3>Notre Mission</h3>
          <p>
            Démocratiser l'accès à l'astronomie et aux sciences spatiales en Afrique, en offrant des programmes éducatifs de qualité, en soutenant la recherche scientifique et en inspirant la nouvelle génération d'explorateurs spatiaux africains.
          </p>
        </div>

        <div class="mvv-card">
          <i class="fas fa-eye"></i>
          <h3>Notre Vision</h3>
          <p>
            Devenir le centre d'excellence en astronomie et sciences spatiales de référence en Afrique de l'Ouest, contribuant activement à la recherche internationale et au développement des capacités scientifiques du continent.
          </p>
        </div>

        <div class="mvv-card">
          <i class="fas fa-heart"></i>
          <h3>Nos Valeurs</h3>
          <p>
            <strong>Excellence</strong> dans la recherche et l'éducation<br>
            <strong>Innovation</strong> technologique et pédagogique<br>
            <strong>Accessibilité</strong> pour tous les publics<br>
            <strong>Collaboration</strong> internationale et locale<br>
            <strong>Durabilité</strong> environnementale et sociale
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Histoire / Timeline -->
  <section class="timeline-section">
    <div class="container">
      <div class="section-title">
        <h2>Notre Histoire</h2>
        <div class="underline"></div>
      </div>
      <div class="timeline">
        <div class="timeline-item">
          <div class="timeline-content">
            <h4>Fondation de GEOSPACE TOGO</h4>
            <p>Création de l'organisation par des passionnés d'astronomie avec pour objectif de rendre l'espace accessible à tous les Togolais.</p>
          </div> <span class="timeline-date">2018</span>
        </div>
        <div class="timeline-item">
          <div class="timeline-content">
            <h4>Premier Observatoire Mobile</h4>
            <p>Lancement de notre programme d'observation itinérant dans les écoles et villages du Togo, touchant plus de 5 000 personnes.</p>
          </div> <span class="timeline-date">2019</span>
        </div>
        <div class="timeline-item">
          <div class="timeline-content">
            <h4>Partenariat International</h4>
            <p>Signature d'accords de collaboration avec l'Agence Spatiale Européenne (ESA) et plusieurs universités africaines.</p>
          </div> <span class="timeline-date">2020</span>
        </div>
        <div class="timeline-item">
          <div class="timeline-content">
            <h4>Centre de Formation Spatiale</h4>
            <p>Inauguration de notre centre de formation équipé de télescopes professionnels et d'un planétarium numérique.</p>
          </div> <span class="timeline-date">2022</span>
        </div>
        <div class="timeline-item">
          <div class="timeline-content">
            <h4>Prix d'Excellence Africaine</h4>
            <p>Reconnaissance par l'Union Africaine pour notre contribution à l'éducation scientifique et à l'innovation.</p>
          </div> <span class="timeline-date">2024</span>
        </div>
      </div>
    </div>
  </section>
  <!-- Statistiques -->
  <section class="stats-section">
    <div class="container">
      <h2 style="color: var(--blanc-lunaire); margin-bottom: 1rem;">Notre Impact en Chiffres</h2>
      <div class="stats-grid">
        <div class="stat-item">
          <i class="fas fa-users"></i>
          <span class="stat-number">25,000+</span>
          <span class="stat-label">Personnes formées</span>
        </div>
        <div class="stat-item">
          <i class="fas fa-school"></i>
          <span class="stat-number">150+</span>
          <span class="stat-label">Écoles partenaires</span>
        </div>
        <div class="stat-item">
          <i class="fas fa-telescope"></i>
          <span class="stat-number">500+</span>
          <span class="stat-label">Observations publiques</span>
        </div>
        <div class="stat-item">
          <i class="fas fa-award"></i>
          <span class="stat-number">12</span>
          <span class="stat-label">Prix et distinctions</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Équipe -->
  <section class="team-section">
    <div class="container">
      <div class="section-title">
        <h2>Notre Équipe</h2>
        <div class="underline"></div>
        <p style="max-width: 700px; margin: 1rem auto; color: var(--gris-moyen);">
          Des experts passionnés dédiés à l'avancement de l'astronomie en Afrique
        </p>
      </div>

      <div class="team-grid">
        <div class="team-card">
          <div class="team-photo">
            <img src="/geospace-togo/images/logo-1.jpeg" alt="Nom de la personne">
          </div>

          <div class="team-info">
            <h4>M. Doh Koffi ADDOR</h4>
            <p class="role">Directeur Général</p>
            <p>Astrophysicien, 15 ans d'expérience en recherche spatiale</p>
          </div>
        </div>

        <div class="team-card">
          <div class="team-photo">
            <img src="/geospace-togo/images/logo-1.jpeg" alt="Nom de la personne">
          </div>

          <div class="team-info">
            <h4>M. Doh Koffi ADDOR</h4>
            <p class="role">Directeur Général</p>
            <p>Astrophysicien, 15 ans d'expérience en recherche spatiale</p>
          </div>
        </div>
        <div class="team-card">
          <div class="team-photo">
            <img src="/geospace-togo/images/logo-1.jpeg" alt="Nom de la personne">
          </div>

          <div class="team-info">
            <h4>M. Doh Koffi ADDOR</h4>
            <p class="role">Directeur Général</p>
            <p>Astrophysicien, 15 ans d'expérience en recherche spatiale</p>
          </div>
        </div>

        <div class="team-card">
          <div class="team-photo">
            <img src="/geospace-togo/images/logo-1.jpeg" alt="Nom de la personne">
          </div>

          <div class="team-info">
            <h4>M. Doh Koffi ADDOR</h4>
            <p class="role">Directeur Général</p>
            <p>Astrophysicien, 15 ans d'expérience en recherche spatiale</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================
         FOOTER
         ============================================ -->
  <div id="footer-placeholder">
    <?php include __DIR__ . '/mes-includes/footer.php'; ?>
  </div>
  <!-- Script du thème -->
  <script src="<?php echo theme_path(); ?>js/custom.js" id="custom-js"></script>
  <script src="<?php echo theme_path(); ?>js/maison/popper.min.js"></script>
  <!-- Script personnalisé GEOSPACE -->

  <!-- Analytics (si activé dans la config HTMLy) -->
  <?php if (analytics()) echo analytics(); ?>

</body>

</html>