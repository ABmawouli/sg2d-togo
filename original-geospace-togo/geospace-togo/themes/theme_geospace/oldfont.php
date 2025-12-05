<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language(); ?>" class="scroll-smooth">

<head>
    <?php echo head_contents(); ?>
    <?php echo $metatags; ?>

    <!-- Polices Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap (pour carousel uniquement) -->

    <!-- Genericons (thème HTMLy) -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>genericons/genericons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css">
    <!-- CSS GEOSPACE TOGO - Charte Graphique -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/mon_style.css">
    <!-- Scripts jQuery -->
    <script type="text/javascript" src="<?php echo theme_path(); ?>js/jquery.js"></script>
</head>

<body>

    <div id="header-placeholder">
        <?php include __DIR__ . '/mes-includes/header.php'; ?>
    </div>
    <!-- ============================================
         SECTION BANNER / CAROUSEL
         ============================================ -->
    <div class="banner">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <!-- Indicateurs -->
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <!-- SLIDE 1 -->
                    <div class="carousel-item active">
                        <section>
                            <div class="section-center clearfix">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="/geospace-togo/images/visuel-1.jpg"
                                            alt="GEOSPACE TOGO Science Durable"
                                            class="banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="banner-info">
                                    <div class="banner-title">
                                        <h3>Découvrir GEOSPACE TOGO</h3>
                                        <h2>Science Durable</h2>
                                    </div>
                                    <p class="banner-text">
                                        Science Géologique pour un Développement Durable agit pour la
                                        vulgarisation des sciences de la Terre et pour la formation
                                        des jeunes.
                                    </p>
                                    <p class="banner-text">
                                        L'ONG GEOSPACE TOGO promeut la connaissance du sol, la préservation
                                        des ressources et la culture scientifique au Togo.
                                    </p>
                                    <a href="/geospace-togo/about/" class="btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 2 -->
                    <div class="carousel-item">
                        <section>
                            <div class="section-center clearfix">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="/geospace-togo/images/visuel-2.jpg"
                                            alt="GEOSPACE TOGO Formation Astronomie"
                                            class="banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="banner-info">
                                    <div class="banner-title">
                                        <h3>Former à l'Astronomie</h3>
                                        <h2>Apprendre GEOSPACE TOGO</h2>
                                    </div>
                                    <p class="banner-text">
                                        GEOSPACE TOGO initie des activités éducatives sur les sciences
                                        géologiques et astronomiques au service du développement.
                                    </p>
                                    <p class="banner-text">
                                        Nous soutenons la recherche et la diffusion des savoirs
                                        pour inspirer une jeunesse curieuse et engagée.
                                    </p>
                                    <a href="/geospace-togo/about/" class="btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 3 -->
                    <div class="carousel-item">
                        <section>
                            <div class="section-center clearfix">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="/geospace-togo/images/visuel-3.jpg"
                                            alt="GEOSPACE TOGO Projets Durables"
                                            class="banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="banner-info">
                                    <div class="banner-title">
                                        <h3>Agir pour demain</h3>
                                        <h2>Projet GEOSPACE TOGO</h2>
                                    </div>
                                    <p class="banner-text">
                                        L'ONG mène des projets de sensibilisation sur la Terre,
                                        la géologie et l'environnement pour un avenir durable.
                                    </p>
                                    <p class="banner-text">
                                        Ensemble, GEOSPACE TOGO fait découvrir la planète et valorise
                                        les sciences pour le bien de tous.
                                    </p>
                                    <a href="/geospace-togo/about/" class="btn">Découvrir</a>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Contrôles du carousel -->
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Fin Banner -->

    <!-- ============================================
         SECTION PUBLICATIONS SPÉCIALES - À DÉCOUVRIR
         ============================================ -->
    <!-- <a href="#all-articles" class="popular-post-link">
        </a> -->

    <div class="popular-post">
        <div class="container">
            <section class="section projects">
                <!-- Titre de section -->
                <div class="section-title">
                    <h2>À découvrir</h2>
                    <div class="underline"></div>
                </div>

                <!-- Grille de projets -->
                <div class="section-center projects-center">
                    <!-- Article 1 -->
                    <div class="project-1">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-1.jpg"
                                alt="Observer le ciel profond - GEOSPACE TOGO"
                                class="project-img" />
                            <div class="project-info">
                                <h4>Observer le ciel profond</h4>
                                <p>Astronomie</p>
                            </div>
                        </article>
                    </div>

                    <!-- Article 2 -->
                    <div class="project-2">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-2.jpg"
                                alt="Explorer l'Univers vivant - GEOSPACE TOGO"
                                class="project-img" />
                            <div class="project-info">
                                <h4>Explorer l'Univers vivant</h4>
                                <p>Astronomie</p>
                            </div>
                        </article>
                    </div>

                    <!-- Article 3 -->
                    <div class="project-3">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-3.jpg"
                                alt="Les mystères des planètes - GEOSPACE TOGO"
                                class="project-img" />
                            <div class="project-info">
                                <h4>Les mystères des planètes</h4>
                                <p>Sciences</p>
                            </div>
                        </article>
                    </div>

                    <!-- Article 4 -->
                    <div class="project-4">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-4.jpg"
                                alt="Apprendre la Terre et le ciel - GEOSPACE TOGO"
                                class="project-img" />
                            <div class="project-info">
                                <h4>Apprendre la Terre et le ciel</h4>
                                <p>Éducation</p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Fin Publications Spéciales -->

    <!-- ============================================
         SECTION DOMAINES D'EXPERTISE
         ============================================ -->
    <div class="categori-list">
        <div class="container">
            <section class="section">
                <!-- Titre -->
                <div class="section-title mt-5">
                    <h2>Focus sur nos domaines</h2>
                    <div class="underline"></div>
                </div>

                <!-- Grille de services -->
                <div class="section-center services-center">
                    <!-- Domaine 1 : Astronomie pratique -->
                    <article class="service">
                        <i class="fas fa-star ser-icon"></i>
                        <h4>Astronomie pratique</h4>
                        <div class="underline"></div>
                        <p>
                            Apprenez à observer les étoiles, les planètes et les constellations,
                            et développez votre passion pour le ciel nocturne.
                        </p>
                    </article>

                    <!-- Domaine 2 : Systèmes planétaires -->
                    <article class="service">
                        <i class="fa fa-globe ser-icon" aria-hidden="true"></i>
                        <h4>Systèmes planétaires</h4>
                        <div class="underline"></div>
                        <p>
                            Explorez les planètes, le Soleil, la Lune et les étoiles pour mieux
                            comprendre notre univers et son fonctionnement.
                        </p>
                    </article>

                    <!-- Domaine 3 : Éducation scientifique -->
                    <article class="service">
                        <i class="fa fa-graduation-cap ser-icon"></i>
                        <h4>Éducation scientifique</h4>
                        <div class="underline"></div>
                        <p>
                            Programmes éducatifs, ateliers et activités pour former les jeunes
                            à l'astronomie et aux sciences de la Terre.
                        </p>
                    </article>
                    <!-- Domaine 3 : Éducation scientifique -->
                    <article class="service">
                        <i class="fa fa-graduation-cap ser-icon"></i>
                        <h4>Éducation scientifique</h4>
                        <div class="underline"></div>
                        <p>
                            Programmes éducatifs, ateliers et activités pour former les jeunes
                            à l'astronomie et aux sciences de la Terre.
                        </p>
                    </article>
                </div>
            </section>
        </div>
    </div>
    <!-- Fin Domaines -->

    <!-- ============================================
         SECTION BLOG - TOUS LES ARTICLES
         ============================================ -->
    <div class="blog" id="all-articles">
        <div class="container">
            <!-- Titre -->
            <div class="section-title mt-5">
                <h2>Tous les articles</h2>
                <div class="underline"></div>
            </div>

            <div class="mb-5">
                <section class="section" id="featured">
                    <div class="section-center featured-center">
                        <div class="row justify-content-start" id="blog-container">
                            <!-- Les articles seront injectés ici par JavaScript -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Fin Blog -->

    <!-- ============================================
         SECTION PARTENAIRES
         ============================================ -->
    <section class="partenaires-section">
        <div class="container">
            <!-- Titre -->
            <div class="section-title mt-5">
                <h2>Nos partenaires</h2>
                <div class="underline"></div>
            </div>

            <!-- Grille de partenaires -->
            <div class="section-center services-center">
                <!-- Partenaire 1 -->
                <article class="service partner-card">
                    <img src="/geospace-togo/images/logo-1.jpeg"
                        alt="Logo Partenaire 1 - GEOSPACE TOGO"
                        class="partner-logo" />
                    <div class="overlay">
                        <h4>Partenaire 1</h4>
                    </div>
                </article>

                <!-- Partenaire 2 -->
                <article class="service partner-card">
                    <img src="/geospace-togo/images/logo-1.jpeg"
                        alt="Logo Partenaire 2 - GEOSPACE TOGO"
                        class="partner-logo" />
                    <div class="overlay">
                        <h4>Partenaire 2</h4>
                    </div>
                </article>

                <!-- Partenaire 3 -->
                <article class="service partner-card">
                    <img src="/geospace-togo/images/logo-1.jpeg"
                        alt="Logo Partenaire 3 - GEOSPACE TOGO"
                        class="partner-logo" />
                    <div class="overlay">
                        <h4>Partenaire 3</h4>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- Fin Partenaires -->

    <!-- ============================================
         FOOTER
         ============================================ -->
    <div id="footer-placeholder">
        <?php include __DIR__ . '/mes-includes/footer.php'; ?>
    </div>

    <!-- Chargement des articles via API HTMLy -->
    <script>
        async function loadHTMLyPosts() {
            const API_URL = "/geospace-togo/themes/theme_geospace/mes-includes/api.php";

            try {
                const response = await fetch(API_URL);
                const posts = await response.json();
                const container = document.getElementById("blog-container");

                container.innerHTML = "";

                // Limiter l'affichage à 4 articles
                const postsToShow = posts.slice(0, 4);

                postsToShow.forEach(post => {
                    const dateObj = new Date(post.date);
                    const options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    const formattedDate = dateObj.toLocaleDateString('fr-FR', options);

                    const card = `
                <div class="col-md-4 mb-4">
                    <div class="blog-card">
                        <img src="${post.image || 'placeholder.jpg'}" alt="${post.titre}">
                        <div class="blog-content">
                            <div class="blog-top">
                                <span class="blog-category">${post.categorie || 'Général'}</span>
                                <span class="blog-date">${formattedDate}</span>
                            </div>
                            <h3>${post.titre}</h3>
                            <p class="blog-description">${post.description.substring(0, 150)}...</p>
                            <div class="blog-bottom">
                                <span class="blog-author">${post.auteur || 'HTMLy'}</span>
                                <a href="${post.link}" class="btn btn-primary">Suite →</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    container.innerHTML += card;
                });

                // Ajouter le bouton "Voir plus" si plus de 4 articles
                if (posts.length > 4) {
                    const seeMoreBtn = document.createElement("div");
                    seeMoreBtn.className = "col-12 text-center mt-4";
                    seeMoreBtn.innerHTML = `<a href="/geospace-togo/blog/" class="btn btn-secondary">Voir plus</a>`;
                    container.appendChild(seeMoreBtn);
                }

            } catch (error) {
                console.error("Erreur API:", error);
                container.innerHTML = "<p>Impossible de charger les articles pour le moment.</p>";
            }
        }

        // Charger les articles au chargement de la page
        loadHTMLyPosts();
    </script>

    <!-- Scripts Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Script du thème -->
    <script src="<?php echo theme_path(); ?>js/custom.js" id="custom-js"></script>
    <script src="<?php echo theme_path(); ?>js/maison/popper.min.js"></script>
    <!-- Script personnalisé GEOSPACE -->

    <!-- Analytics (si activé dans la config HTMLy) -->
    <?php if (analytics()) echo analytics(); ?>

</body>

</html>