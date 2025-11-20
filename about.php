<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">

    <title>À propos - GEOSPACE TOGO</title>

    <style>
        /* Section domaines d'action */
        .domain-card {
            background-color: #f0f4f8;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .domain-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .domain-card i {
            font-size: 30px;
            color: #6f42c1;
            margin-bottom: 10px;
        }
        .domain-card h3 {
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #333;
        }
        .domain-card p {
            color: #555;
        }

        /* Images responsive avec bordures arrondies */
        .img-fluid {
            border-radius: 10px;
        }

        /* Amélioration des liens contacts */
        .page-info a {
            color: #6f42c1;
            text-decoration: none;
        }
        .page-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<!-- Header -->
<div id="header-placeholder">
    <?php include 'header.php'; ?>
</div>

<div class="blog pb-5">
    <div class="container">
        <!-- Présentation générale -->
        <section class="section single-page">
            <div class="section-title">
                <h1>À propos de GEOSPACE TOGO</h1>
                <div class="underline"></div>
            </div>
            <div class="section-center page-info">
                <p>
                    La <strong>Science Géologique pour un Développement Durable (GEOSPACE TOGO)</strong> est une organisation togolaise
                    dédiée à la promotion des sciences de la Terre et de l'Univers. Fondée dans le but de sensibiliser
                    le public à l’importance de la géologie et de l’astronomie pour le développement durable,
                    GEOSPACE TOGO œuvre à travers des projets éducatifs, des ateliers, des publications et des partenariats locaux
                    et internationaux.
                </p>
                <p>
                    Notre mission est de rendre la science accessible à tous, encourager la recherche scientifique et
                    contribuer à une meilleure compréhension de l'environnement géologique du Togo et de la région
                    ouest-africaine.
                </p>
                <p>
                    Suivez nos actualités et projets sur notre page 
                    <a href="https://www.facebook.com/GEOSPACE.Togo" target="_blank">Facebook GEOSPACE TOGO</a>
                    ainsi que sur LinkedIn et nos partenaires académiques.
                </p>

                <img src="./images/populaire-1.jpg" alt="Équipe GEOSPACE TOGO" class="img-fluid my-3">
                <p class="text-center"><em>Équipe GEOSPACE TOGO lors d'un atelier de vulgarisation scientifique</em></p>
            </div>
        </section>

        <!-- Nos domaines d'action -->
        <section class="section">
            <div class="section-title">
                <h2>Nos domaines d'action</h2>
                <div class="underline"></div>
            </div>
            <div class="section-center row">

                <div class="col-md-6 col-lg-3">
                    <div class="domain-card text-center">
                        <i class="fas fa-book-open"></i>
                        <h3>Formation & Vulgarisation</h3>
                        <p>Ateliers et publications pour sensibiliser le public aux sciences géologiques.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="domain-card text-center">
                        <i class="fas fa-flask"></i>
                        <h3>Recherche</h3>
                        <p>Études géologiques et astronomiques appliquées au développement durable.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="domain-card text-center">
                        <i class="fas fa-handshake"></i>
                        <h3>Partenariats</h3>
                        <p>Collaboration avec universités, ONG et institutions locales et internationales.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="domain-card text-center">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Événements</h3>
                        <p>Conférences, journées portes ouvertes et sessions d’observation scientifique.</p>
                    </div>
                </div>

                <img src="./images/populaire-3.jpg" alt="Champs de géologie" class="img-fluid my-3">
                <p class="text-center"><em>Exemple de nos travaux de terrain</em></p>

            </div>
        </section>

        <!-- Contact et réseaux sociaux -->
        <section class="section">
            <div class="section-title">
                <h2>Contact et réseaux sociaux</h2>
                <div class="underline"></div>
            </div>
            <div class="section-center page-info text-center">
                <p>
                    Pour toute information ou collaboration : 
                    <a href="tel:+22891234567">+228 91 23 45 67</a> | 
                    <a href="mailto:contact@geospace.tg">contact@geospace.tg</a>
                </p>
                <p>
                    Suivez-nous sur : 
                    <a href="https://www.facebook.com/GEOSPACE.Togo" target="_blank"><i class="fab fa-facebook"></i> Facebook</a> · 
                    <a href="https://www.linkedin.com/company/GEOSPACE.Togo" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                </p>
            </div>
        </section>

    </div>
</div>

<!-- Footer -->
<div id="footer-placeholder">
    <?php include 'footer.php'; ?>
</div>

<script src="./js/popper.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./js/script.js"></script>

</body>
</html>
