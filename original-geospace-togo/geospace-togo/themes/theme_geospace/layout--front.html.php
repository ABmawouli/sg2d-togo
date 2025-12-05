<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language(); ?>" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <title>Accueil - GEOSPACE TOGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php echo head_contents(); ?>
    <?php echo $metatags; ?>

    <!-- Polices Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Genericons (thème HTMLy) -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>genericons/genericons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css">

    <!-- CSS GEOSPACE TOGO - Charte Graphique -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/mon_style.css">
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/ban-carou-style.css">

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

    <!-- Scripts jQuery -->
    <script type="text/javascript" src="<?php echo theme_path(); ?>js/jquery.js"></script>
    <style>
        .section-center-decouvrir {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--espacement-xl);
            align-items: center;
            padding: var(--espacement-xl) 0;
            min-height: 600px;
        }

        /* Responsive */
        @media screen and (max-width: 992px) {
            .section-center-decouvrir {
                grid-template-columns: 1fr;
                gap: var(--espacement-lg);
                padding: var(--espacement-lg) 0;
            }
        }

        @media screen and (max-width: 768px) {

            .section-center-decouvrir {
                padding: var(--espacement-md) 0;
            }
        }

        /* Bouton */
        .btn {
            display: inline-block;
            padding: 0.9rem 2.5rem;
            background: linear-gradient(135deg, var(--vert-orbital), #00a844);
            color: var(--blanc-lunaire);
            font-family: var(--police-titres);
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 50px;
            box-shadow: var(--ombre-moyenne);
            transition: var(--transition-normale);
            margin-top: var(--espacement-sm);
        }

        .btn:hover {
            background: linear-gradient(135deg, var(--jaune-solaire), #ffc400);
            color: var(--bleu-profond);
            transform: translateY(-3px);
            box-shadow: var(--ombre-forte);
        }
    </style>
</head>

<body>

    <div id="header-placeholder">
        <?php include __DIR__ . '/mes-includes/header.php'; ?>
    </div>
    <!-- ============================================
     SECTION BANNER / CAROUSEL
     ============================================ -->
    <div class="ban-banner">
        <div class="ban-container">
            <div class="car-carousel">
                <!-- Indicateurs -->
                <ol class="car-carousel-indicators">
                    <li class="active" data-slide="0"></li>
                    <li data-slide="1"></li>
                    <li data-slide="2"></li>
                </ol>

                <div class="car-carousel-inner">
                    <!-- SLIDE 1 -->
                    <div class="car-carousel-item active">
                        <section>
                            <div class="ban-section-center">
                                <!-- Image du banner -->
                                <article class="ban-banner-img">
                                    <div class="ban-banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=600&fit=crop"
                                            alt="GEOSPACE TOGO Science Durable"
                                            class="ban-banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="ban-banner-info">
                                    <div class="ban-banner-title">
                                        <h3>Découvrir GEOSPACE TOGO</h3>
                                        <h2>Science Durable</h2>
                                    </div>
                                    <p class="ban-banner-text">
                                        Science Géologique pour un Développement Durable agit pour la
                                        vulgarisation des sciences de la Terre et pour la formation
                                        des jeunes.
                                    </p>
                                    <p class="ban-banner-text">
                                        L'ONG GEOSPACE TOGO promeut la connaissance du sol, la préservation
                                        des ressources et la culture scientifique au Togo.
                                    </p>
                                    <a href="#" class="ban-btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 2 -->
                    <div class="car-carousel-item">
                        <section>
                            <div class="ban-section-center">
                                <!-- Image du banner -->
                                <article class="ban-banner-img">
                                    <div class="ban-banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?w=800&h=600&fit=crop"
                                            alt="GEOSPACE TOGO Formation Astronomie"
                                            class="ban-banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="ban-banner-info">
                                    <div class="ban-banner-title">
                                        <h3>Former à l'Astronomie</h3>
                                        <h2>Apprendre GEOSPACE TOGO</h2>
                                    </div>
                                    <p class="ban-banner-text">
                                        GEOSPACE TOGO initie des activités éducatives sur les sciences
                                        géologiques et astronomiques au service du développement.
                                    </p>
                                    <p class="ban-banner-text">
                                        Nous soutenons la recherche et la diffusion des savoirs
                                        pour inspirer une jeunesse curieuse et engagée.
                                    </p>
                                    <a href="#" class="ban-btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 3 -->
                    <div class="car-carousel-item">
                        <section>
                            <div class="ban-section-center">
                                <!-- Image du banner -->
                                <article class="ban-banner-img">
                                    <div class="ban-banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=800&h=600&fit=crop"
                                            alt="GEOSPACE TOGO Projets Durables"
                                            class="ban-banner-picture" />
                                    </div>
                                </article>

                                <!-- Informations du banner -->
                                <article class="ban-banner-info">
                                    <div class="ban-banner-title">
                                        <h3>Agir pour demain</h3>
                                        <h2>Projet GEOSPACE TOGO</h2>
                                    </div>
                                    <p class="ban-banner-text">
                                        L'ONG mène des projets de sensibilisation sur la Terre,
                                        la géologie et l'environnement pour un avenir durable.
                                    </p>
                                    <p class="ban-banner-text">
                                        Ensemble, GEOSPACE TOGO fait découvrir la planète et valorise
                                        les sciences pour le bien de tous.
                                    </p>
                                    <a href="#" class="ban-btn">Découvrir</a>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Contrôles du carousel -->
                <button class="car-carousel-control car-carousel-control-prev" type="button">
                    ‹
                </button>
                <button class="car-carousel-control car-carousel-control-next" type="button">
                    ›
                </button>
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
                <div class="section-center-decouvrir projects-center">
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
                    <div class="section-center-actualite featured-center">
                        <div class="row justify-content-start" id="blog-container">
                            <!-- Les articles seront injectés ici par JavaScript -->
                        </div>
                        <!-- 🔥 Zone d’erreur déjà prête avec style de section -->
                        <section id="blog-error" class="hero-contact" style="display:none;">
                            <div class="container text-center">
                                <i class="fas fa-exclamation-circle" style="font-size:2rem; color:var(--vert-orbital);"></i>
                                <h2>Impossible de charger les articles</h2>
                                <p>Cliquez sur <strong>« Voir Plus »</strong> pour accéder au blog.</p>
                            </div>
                        </section>

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

            let posts = [];
            const container = document.getElementById("blog-container");
            const errorContainer = document.getElementById("blog-error");

            try {
                const response = await fetch(API_URL);

                // Si l'API renvoie une erreur HTTP (404, 500, ...)
                if (!response.ok) {
                    throw new Error("Réponse HTTP non valide : " + response.status);
                }

                posts = await response.json();

                // Masquer le message d'erreur si succès
                errorContainer.style.display = "none";

            } catch (error) {
                console.error("Erreur API ou chemin incorrect :", error);

                // Afficher le message d'erreur
                errorContainer.style.display = "flex";

                // Afficher le bouton "Voir Plus"
                addSeeMoreButton(container);
                return; // Stop l'exécution
            }

            // Nettoyer l'affichage
            container.innerHTML = "";

            // Garder seulement les articles qui ont une image
            const postsWithImage = posts.filter(p => p.image && p.image.trim() !== "");

            // Limiter à 3 articles
            const postsToShow = postsWithImage.slice(0, 3);

            // Afficher les cartes
            postsToShow.forEach(post => {
                const dateObj = new Date(post.date);
                const formattedDate = dateObj.toLocaleDateString('fr-FR', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });

                const card = `
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="${post.image}" alt="${post.titre}">
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

            // 🔥 RÈGLE D'AFFICHAGE DU LIEN "VOIR PLUS"
            const shouldShowLink =
                postsWithImage.length === 0 || // aucun article récupéré
                postsWithImage.length > 3; // plus de 3 articles

            if (shouldShowLink) {
                addSeeMoreButton(container);
            }
        }

        // Fonction pour ajouter le bouton "Voir Plus"
        function addSeeMoreButton(container) {
            // Vérifier si le bouton existe déjà pour éviter les doublons
            if (!document.querySelector(".see-more-btn")) {
                const seeMoreBtn = document.createElement("div");
                seeMoreBtn.className = "see-more-btn";
                seeMoreBtn.innerHTML = `
            <a href="/geospace-togo/blog/" class="btn btn-secondary">
                Voir plus
            </a>
        `;
                container.parentElement.appendChild(seeMoreBtn);
            }
        }

        // Charger au démarrage
        loadHTMLyPosts();
    </script>

    <script>
        (() => {
            const carousel = document.querySelector('.car-carousel');
            const items = carousel.querySelectorAll('.car-carousel-item');
            const indicators = carousel.querySelectorAll('.car-carousel-indicators li');
            const prevBtn = carousel.querySelector('.car-carousel-control-prev');
            const nextBtn = carousel.querySelector('.car-carousel-control-next');

            let currentIndex = 0;
            let autoplayInterval;

            function showSlide(index) {
                // Gestion de l'index circulaire
                if (index >= items.length) currentIndex = 0;
                else if (index < 0) currentIndex = items.length - 1;
                else currentIndex = index;

                // Mise à jour des slides
                items.forEach((item, i) => {
                    item.classList.toggle('active', i === currentIndex);
                });

                // Mise à jour des indicateurs
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle('active', i === currentIndex);
                });
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetAutoplay();
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetAutoplay();
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    showSlide(index);
                    resetAutoplay();
                });
            });

            // Autoplay
            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, 5000);
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }

            // Pause au hover
            carousel.addEventListener('mouseenter', stopAutoplay);
            carousel.addEventListener('mouseleave', startAutoplay);

            // Support tactile
            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                if (touchEndX < touchStartX - 50) {
                    nextSlide();
                    resetAutoplay();
                }
                if (touchEndX > touchStartX + 50) {
                    prevSlide();
                    resetAutoplay();
                }
            }

            // Support clavier
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                }
                if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });

            // Démarrage
            startAutoplay();
        })();
    </script>

    <!-- Script du thème -->
    <script src="<?php echo theme_path(); ?>js/custom.js" id="custom-js"></script>
    <script src="<?php echo theme_path(); ?>js/maison/popper.min.js"></script>
    <!-- Script personnalisé GEOSPACE -->

    <!-- Analytics (si activé dans la config HTMLy) -->
    <?php if (analytics()) echo analytics(); ?>

</body>

</html>