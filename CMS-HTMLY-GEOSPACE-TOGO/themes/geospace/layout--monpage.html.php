<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language(); ?>" class="__variable_space scroll-smooth light" id="html-id">

<head>
    <?php echo head_contents(); ?>
    <?php echo $metatags; ?>
  <link rel="stylesheet" href="/geospace-togo/bootstrap/css/bootstrap.min.css">


    <!-- Tailwind -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/tailwind.css">

    <!-- Styles du thème -->
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/typography.css">
    <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css">


    <!-- Styles personnalisés (dernière priorité) -->
    <link rel="stylesheet" href="/geospace-togo/css/css-image-font.css">

    <link rel="stylesheet" href="/geospace-togo/css/style.css">

</head>






<section class="header-wrapper">
    <div class="flex h-screen flex-col justify-between font-sans">
        <header class="flex items-center justify-between py-10">
            <div>
                <a aria-label="<?php echo blog_title(); ?>" href="<?php echo site_url(); ?>">
                    <div class="flex items-center justify-between">
                        <div class="mr-3">
                            <img class="w-32 h-auto" src="<?php echo theme_path(); ?>logo.jpeg" alt="<?php echo blog_title(); ?>" /> <!-- 224px -->
                        </div>
                        <div class="hidden h-6 text-2xl font-semibold sm:block"><?php echo blog_title(); ?></div>
                    </div>
                </a>
            </div>
            <div class="flex items-center space-x-4 leading-5 sm:space-x-6">
                <?php echo menu('nav-top'); ?>
                <button aria-label="Search" class="search-open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-900 dark:text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                </button>
                <div class="mr-5">
                    <div class="relative inline-block text-left">
                        <div>
                            <button id="theme-toggle" type="button" aria-label="Theme Mode" aria-haspopup="menu" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 text-gray-900 dark:text-gray-100">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <button aria-label="Toggle Menu" class="sm:hidden menu-open" id="menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-8 w-8 text-gray-900 dark:text-gray-100">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="menu-mobile" role="dialog" tabindex="-1">
                    <div class="fixed inset-0 z-60 bg-black/25"></div>
                    <div class="fixed left-0 top-0 z-70 h-full w-full bg-white opacity-95 duration-300 dark:bg-gray-950 dark:opacity-[0.98]">
                        <nav class="mt-8 flex h-full basis-0 flex-col items-start overflow-y-auto pl-12 pt-2 text-left">
                            <?php echo menu('nav-mobile'); ?>
                        </nav>
                        <button class="fixed right-4 top-7 z-80 h-16 w-16 p-4 text-gray-900 hover:text-primary-500 dark:text-gray-100 dark:hover:text-primary-400 menu-close" aria-label="Toggle Menu">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>
    </div>
</section>











<!-- Banner -->
<div class="banner">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
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
                            <!-- banner-img -->
                            <article class="banner-img">
                                <div class="banner-picture-container">
                                    <img src="/geospace-togo/images/visuel-1.jpg" alt="GEOSPACE TOGO" class="banner-picture" />
                                </div>
                            </article>
                            <!-- banner-info -->
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
                                    L’ONG GEOSPACE TOGO promeut la connaissance du sol, la préservation
                                    des ressources et la culture scientifique au Togo.
                                    L’ONG GEOSPACE TOGO promeut la connaissance du sol, la préservation
                                    des ressources et la culture scientifique au Togo.
                                </p>
                                <a href="detail.html" class="btn">Voir plus</a>
                            </article>
                        </div>
                    </section>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <section>
                        <div class="section-center clearfix">
                            <!-- banner-img -->
                            <article class="banner-img">
                                <div class="banner-picture-container">
                                    <img src="/geospace-togo/images/visuel-2.jpg" alt="GEOSPACE TOGO" class="banner-picture" />
                                </div>
                            </article>
                            <!-- banner-info -->
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
                                    pour inspirer une jeunesse curieuse et engagée.
                                    pour inspirer une jeunesse curieuse et engagée.
                                    pour inspirer une jeunesse curieuse et engagée.

                                </p>
                                <a href="detail.html" class="btn">Voir plus</a>
                            </article>
                        </div>
                    </section>
                </div>

                <!-- SLIDE 3 -->
                <div class="carousel-item">
                    <section>
                        <div class="section-center clearfix">
                            <!-- banner-img -->
                            <article class="banner-img">
                                <div class="banner-picture-container">
                                    <img src="/geospace-togo/images/visuel-3.jpg" alt="GEOSPACE TOGO" class="banner-picture" />
                                </div>
                            </article>
                            <!-- banner-info -->
                            <article class="banner-info">
                                <div class="banner-title">
                                    <h3>Agir pour demain</h3>
                                    <h2>Projet GEOSPACE TOGO</h2>
                                </div>
                                <p class="banner-text">
                                    L’ONG mène des projets de sensibilisation sur la Terre,
                                    la géologie et l’environnement pour un avenir durable.
                                </p>
                                <p class="banner-text">
                                    Ensemble, GEOSPACE TOGO fait découvrir la planète et valorise
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.
                                    les sciences pour le bien de tous.

                                </p>
                                <a href="detail.html" class="btn">Découvrir</a>
                            </article>
                        </div>
                    </section>
                </div>
            </div>

            <!-- CONTROLS -->
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

<style>
    .banner-info {
        background: rgba(0, 0, 0, 0.45);
        /* noir léger, plus neutre que le rouge */
        backdrop-filter: blur(6px);
        /* flou un peu plus doux */
        padding: 20px 25px;
        border-radius: 12px;

        /* bordure subtile pour bien délimiter sans trop de contraste */
        border: 1px solid rgba(255, 255, 255, 0.15);

        /* texte lisible */
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8);
    }
</style>
<!-- end banner -->

<br><br>
<!-- publications spéciales cliquable -->
<a href="#all-articles" class="popular-post-link" style="text-decoration: none; color: inherit;">
    <div class="popular-post">
        <div class="container">
            <section class="section projects">
                <div class="section-title">
                    <h2>À découvrir</h2>
                    <div class="underline"></div>
                </div>
                <br><br><br>

                <div class="section-center projects-center">
                    <!-- article 1 -->
                    <div class="project-1">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-1.jpg" alt="GEOSPACE TOGO géologie" class="project-img" />
                            <div class="project-info">
                                <h4>Observer le ciel profond</h4>
                                <p>Astronomie</p>
                            </div>
                        </article>
                    </div>
                    <!-- article 2 -->
                    <div class="project-2">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-2.jpg" alt="GEOSPACE TOGO développement durable" class="project-img" />
                            <div class="project-info">
                                <h4>Explorer l'Univers vivant</h4>
                                <p>Astronomie</p>
                            </div>
                        </article>
                    </div>
                    <!-- article 3 -->
                    <div class="project-3">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-3.jpg" alt="GEOSPACE TOGO science planétaire" class="project-img" />
                            <div class="project-info">
                                <h4>Les mystères des planètes</h4>
                                <p>Sciences</p>
                            </div>
                        </article>
                    </div>
                    <!-- article 4 -->
                    <div class="project-4">
                        <article class="project">
                            <img src="/geospace-togo/images/populaire-4.jpg" alt="GEOSPACE TOGO éducation scientifique" class="project-img" />
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
</a>
<!-- fin publications spéciales -->
<br> <br>
<!-- Liste des domaines -->
<div class="categori-list">
    <div class="container">
        <section class="section bg-grey">
            <!-- Titre -->
            <div class="section-title mt-5">
                <h2>Focus sur nos domaines</h2>
                <div class="underline"></div>
            </div>

            <!-- Cartes des domaines -->
            <div class="section-center services-center">
                <!-- Domaine 1 : Astronomie pratique -->
                <article class="service">
                    <i class="fas fa-star ser-icon"></i>
                    <h4>Astronomie pratique</h4>
                    <div class="underline"></div>
                    <p>
                        Apprenez à observer les étoiles, les planètes et les constellations, et développez votre
                        passion pour le ciel nocturne.
                    </p>
                </article>

                <!-- Domaine 2 : Systèmes planétaires -->
                <article class="service">
                    <i class="fa fa-globe ser-icon" aria-hidden="true"></i>
                    <h4>Systèmes planétaires</h4>
                    <div class="underline"></div>
                    <p>
                        Explorez les planètes, le Soleil, la Lune et les étoiles pour mieux comprendre notre
                        univers et son fonctionnement.
                    </p>
                </article>

                <!-- Domaine 3 : Éducation scientifique -->
                <article class="service">
                    <i class="fa fa-graduation-cap ser-icon"></i>
                    <h4>Éducation scientifique</h4>
                    <div class="underline"></div>
                    <p>
                        Programmes éducatifs, des ateliers et des activités pour former les jeunes
                        à l’astronomie et aux sciences de la Terre.
                    </p>
                </article>
            </div>
        </section>
    </div>
</div>
<!-- fin liste des domaines -->


<!-- Blog debut -->
<div class="blog" id="all-articles">
    <div class="container">
        <div class="section-title mt-5">
            <h2>Tous les articles</h2>
            <div class="underline"></div>
        </div>

        <div class="mb-5">
            <!-- Articles en vedette -->
            <section class="section" id="featured">
                <div class="section-center featured-center">
                    <div class="row justify-content-start" id="blog-container">
                        <!-- Les articles seront injectés ici par JavaScript -->

                    </div>
                    <div class="blog-btn mt-5 text-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<br>
<!-- Blog fin -->

<style>
    /* Container blog */
    .blog-card {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Image */
    .blog-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
    }

    /* Content */
    .blog-content {
        padding: 12px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    /* Top info: category + date */
    .blog-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .blog-category {
        background-color: #25D366;
        /* couleur badge */
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 8px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .blog-date {
        font-size: 0.75rem;
        color: #888;
        position: relative;
        /* pas absolute */
        float: none;
    }



    /* Title */
    .blog-content h3 {
        font-size: 1.2rem;
        margin: 4px 0 8px;
        color: #333;
        font-weight: 600;
    }

    /* Description: max 3 lines */
    .blog-description {
        font-size: 0.95rem;
        color: #555;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 12px;
    }

    /* Bottom: author + button */
    .blog-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .blog-author {
        font-size: 0.85rem;
        color: #777;
    }

    .blog-card .btn {
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.9rem;
    }

    /* Responsive grid */
    .row#blog-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .row#blog-container>div {
        flex: 1 1 calc(33.333% - 20px);
        /* 3 par ligne sur PC */
    }

    /* Tablette */
    @media screen and (max-width: 992px) {
        .row#blog-container>div {
            flex: 1 1 calc(50% - 20px);
            /* 2 par ligne */
        }
    }

    /* Mobile */
    @media screen and (max-width: 576px) {
        .row#blog-container>div {
            flex: 1 1 100%;
            /* 1 par ligne */
        }

        .blog-card img {
            height: 180px;
        }
    }
</style>

<script>
    async function loadHTMLyPosts() {
        const API_URL = "/geospace-togo/api.php";

        try {
            const response = await fetch(API_URL);
            const posts = await response.json();
            const container = document.getElementById("blog-container");

            container.innerHTML = "";

            posts.forEach(post => {
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
                            <a href="${post.link}" class="btn btn-primary">Lire la suite →</a>
                        </div>
                    </div>
                </div>
            </div>
            `;
                container.innerHTML += card;
            });

        } catch (error) {
            console.error("Erreur API:", error);
            document.getElementById("blog-container").innerHTML = "<p>Impossible de charger les articles.</p>";
        }
    }

    loadHTMLyPosts();
</script>




<script src="/geospace-togo/js/popper.min.js"></script>
<script src="/geospace-togo/bootstrap/js/bootstrap.min.js"></script>
<script src="/geospace-togo/js/script.js"></script>


</body>

</html>