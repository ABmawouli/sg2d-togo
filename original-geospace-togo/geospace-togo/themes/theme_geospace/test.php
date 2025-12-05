<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bannière GEOSPACE TOGO</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Couleurs principales (Charte Graphique) */
            --bleu-profond: #002B5B;
            --vert-orbital: #00C853;
            --jaune-solaire: #FFD200;
            --blanc-lunaire: #FFFFFF;

            /* Couleurs secondaires et nuances */
            --gris-fonce: #333333;
            --gris-moyen: #666666;
            --gris-clair: #F5F5F5;
            --bleu-clair: #E3F2FD;

            /* Polices officielles */
            --police-titres: 'Poppins', 'Arial Black', sans-serif;
            --police-corps: 'Poppins', 'Arial', sans-serif;
            --police-devise: 'Exo 2', 'Poppins', sans-serif;

            /* Espacements réduits */
            --espacement-xs: 0.5rem;
            --espacement-sm: 1rem;
            --espacement-md: 1.5rem;
            --espacement-lg: 2.5rem;
            --espacement-xl: 3.5rem;

            /* Ombres */
            --ombre-legere: 0 2px 8px rgba(0, 43, 91, 0.1);
            --ombre-moyenne: 0 4px 16px rgba(0, 43, 91, 0.15);
            --ombre-forte: 0 8px 24px rgba(0, 43, 91, 0.2);

            /* Transitions */
            --transition-rapide: 0.2s ease;
            --transition-normale: 0.3s ease;
            --transition-lente: 0.5s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--police-corps);
            color: var(--gris-fonce);
            background: var(--gris-clair);
        }

        /* ===== BANNIÈRE / CAROUSEL ===== */
        .banner {
            position: relative;
            width: 100%;
            min-height: 600px;
            background: linear-gradient(135deg, var(--bleu-profond), #003d7a);
            overflow: hidden;
        }

        .banner::before {
            content: '✦';
            position: absolute;
            top: 10%;
            right: 10%;
            font-size: 8rem;
            color: rgba(255, 210, 0, 0.1);
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.1;
            }

            50% {
                opacity: 0.3;
            }
        }

        .carousel {
            position: relative;
            width: 100%;
            height: 100%;
        }

        /* Slides */
        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .carousel-item {
            display: none;
            width: 100%;
            animation: fadeIn 0.8s ease-out;
        }

        .carousel-item.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Container et layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--espacement-md);
        }

        .section-center {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--espacement-xl);
            align-items: center;
            padding: var(--espacement-xl) 0;
            min-height: 600px;
        }

        /* Image du banner */
        .banner-img {
            position: relative;
        }

        .banner-picture-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--ombre-forte);
            transition: var(--transition-normale);
        }

        .banner-picture-container:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 12px 40px rgba(0, 200, 83, 0.3);
        }

        .banner-picture {
            width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
        }

        /* Info du banner */
        .banner-info {
            color: var(--blanc-lunaire);
            padding: var(--espacement-md);
        }

        .banner-title h3 {
            font-family: var(--police-devise);
            font-size: 1.1rem;
            font-weight: 400;
            font-style: italic;
            color: var(--jaune-solaire);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: var(--espacement-xs);
        }

        .banner-title h2 {
            font-family: var(--police-titres);
            font-size: 3rem;
            font-weight: 700;
            color: var(--blanc-lunaire);
            margin-bottom: var(--espacement-md);
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .banner-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: var(--espacement-md);
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

        /* Indicateurs */
        .carousel-indicators {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: var(--espacement-sm);
            list-style: none;
            z-index: 10;
        }

        .carousel-indicators li {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: var(--transition-rapide);
        }

        .carousel-indicators li:hover {
            background: rgba(255, 255, 255, 0.7);
            transform: scale(1.2);
        }

        .carousel-indicators li.active {
            width: 40px;
            border-radius: 6px;
            background: var(--vert-orbital);
        }

        /* Contrôles de navigation */
        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(0, 200, 83, 0.8);
            border: none;
            border-radius: 50%;
            color: var(--blanc-lunaire);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition-normale);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-control:hover {
            background: var(--vert-orbital);
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.4);
        }

        .carousel-control-prev {
            left: 30px;
        }

        .carousel-control-next {
            right: 30px;
        }

        /* Responsive */
        @media screen and (max-width: 992px) {
            .section-center {
                grid-template-columns: 1fr;
                gap: var(--espacement-lg);
                padding: var(--espacement-lg) 0;
            }

            .banner-title h2 {
                font-size: 2.5rem;
            }

            .banner-picture {
                height: 350px;
            }
        }

        @media screen and (max-width: 768px) {
            .banner {
                min-height: auto;
            }

            .section-center {
                padding: var(--espacement-md) 0;
            }

            .banner-title h2 {
                font-size: 2rem;
            }

            .banner-text {
                font-size: 1rem;
            }

            .carousel-control {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .carousel-control-prev {
                left: 15px;
            }

            .carousel-control-next {
                right: 15px;
            }

            .banner-picture {
                height: 280px;
            }
        }

        @media screen and (max-width: 480px) {
            .banner-title h2 {
                font-size: 1.6rem;
            }

            .btn {
                padding: 0.7rem 2rem;
                font-size: 0.9rem;
            }

            .carousel-indicators {
                bottom: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================
       SECTION BANNER / CAROUSEL
       ============================================ -->
    <div class="banner">
        <div class="container">
            <div class="carousel">
                <!-- Indicateurs -->
                <ol class="carousel-indicators">
                    <li class="active" data-slide="0"></li>
                    <li data-slide="1"></li>
                    <li data-slide="2"></li>
                </ol>

                <div class="carousel-inner">
                    <!-- SLIDE 1 -->
                    <div class="carousel-item active">
                        <section>
                            <div class="section-center">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=600&fit=crop"
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
                                    <a href="#" class="btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 2 -->
                    <div class="carousel-item">
                        <section>
                            <div class="section-center">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?w=800&h=600&fit=crop"
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
                                    <a href="#" class="btn">Voir plus</a>
                                </article>
                            </div>
                        </section>
                    </div>

                    <!-- SLIDE 3 -->
                    <div class="carousel-item">
                        <section>
                            <div class="section-center">
                                <!-- Image du banner -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=800&h=600&fit=crop"
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
                                    <a href="#" class="btn">Découvrir</a>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Contrôles du carousel -->
                <button class="carousel-control carousel-control-prev" type="button">
                    ‹
                </button>
                <button class="carousel-control carousel-control-next" type="button">
                    ›
                </button>
            </div>
        </div>
    </div>

    <script>
        (() => {
            const carousel = document.querySelector('.carousel');
            const items = carousel.querySelectorAll('.carousel-item');
            const indicators = carousel.querySelectorAll('.carousel-indicators li');
            const prevBtn = carousel.querySelector('.carousel-control-prev');
            const nextBtn = carousel.querySelector('.carousel-control-next');

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

</body>

</html>