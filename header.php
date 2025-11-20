<!-- HEADER -->
<header>
    <nav class="nav">
        <div class="nav-center">
            <!-- Logo -->
            <a href="index.php" class="nav-logo-link">
                <img src="./images/logo-2.jpeg" class="nav-logo" alt="Logo GEOSPACE Togo">
            </a>

            <!-- Burger -->
            <button class="nav-btn" id="nav-btn" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Menu desktop -->
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="galerie.php">Galerie</a></li>
                <li><a href="/geospace-togo/CMS-HTMLY-GEOSPACE-TOGO/">Blog</a></li>
                <li class="whatsapp-btn">
                    <a href="https://wa.me/22891234567" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i> Discuter
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Overlay blanc transparent -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar mobile -->
    <aside class="sidebar" id="sidebar">
        <button id="close-btn" class="close-btn" aria-label="Fermer le menu">
            <i class="fas fa-times"></i>
        </button>

        <ul class="sidebar-links-header">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="about.php">À propos</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="/geospace-togo/CMS-HTMLY-GEOSPACE-TOGO/">Actualités</a></li>
            <li>
                <a href="https://wa.me/22891234567" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </li>
            <li><a href="tel:+22891234567"><i class="fas fa-phone"></i> +228 91 23 45 67</a></li>
        </ul>
    </aside>
</header>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* RESET */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* NAVBAR */
    .nav {
        width: 100%;
        /* plus de background ni shadow */
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .nav-center {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 1cm;
        max-width: 1400px;
        margin: 0 auto;
    }

    .nav-logo-link {
        display: flex;
        align-items: center;
    }

    .nav-logo {
        height: 60px;
        width: auto;
        object-fit: contain;
    }

    /* Desktop menu */
    .nav-links {
        display: flex;
        gap: 2rem;
        list-style: none;
        align-items: center;
        margin: 0;
    }

    .nav-links a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    

    .whatsapp-btn a {
        background: #25D366;
        color: white !important;
        padding: 0.6rem 1.2rem;
        border-radius: 25px;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .whatsapp-btn a:hover {
        background: #20ba5a;
        transform: scale(1.05);
    }

    /* Burger button */
    .nav-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.8rem;
        color: #333;
        cursor: pointer;
        padding: 0.5rem;
        transition: color 0.3s ease;
    }

    .nav-btn:hover {
        color: #25D366;
    }

    /* OVERLAY */
    .overlay {
        display: none; /* overlay complètement désactivé */
        opacity: 0;
    }

    .overlay.active {
        display: none; /* reste invisible */
        opacity: 0;
    }

    /* SIDEBAR */
    .sidebar {
        position: fixed;
        top: 0;
        left: -320px;
        width: 300px;
        height: 100%;
        padding: 2rem 1rem;
        z-index: 2000;
        transition: left 0.3s ease;
        overflow-y: auto;
    }

    .sidebar.active {
        left: 0;
    }

    /* Close button */
    .close-btn {
        background: none;
        border: none;
        font-size: 2rem;
        color: #ff4444;
        position: absolute;
        right: 20px;
        top: 20px;
        cursor: pointer;
        transition: transform 0.2s ease, color 0.3s ease;
        padding: 0.5rem;
    }

    .close-btn:hover {
        transform: rotate(90deg);
        color: #cc0000;
    }

    /* Sidebar links */
    .sidebar-links-header {
        list-style: none;
        margin-top: 5rem;
        padding: 0;
    }

    .sidebar-links-header li {
        margin: 0;
        border-bottom: 1px solid #eee;
    }

    .sidebar-links-header a {
        color: #333;
        font-size: 1.1rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 0.5rem;
        transition: color 0.3s ease, padding-left 0.3s ease;
    }

    .sidebar-links-header a:hover {
        color: #25D366; /* hover color uniquement */
        padding-left: 1rem;
        background: none; /* plus de fond au hover */
    }

    .sidebar-links-header i {
        font-size: 1.2rem;
        width: 25px;
    }

    /* DESKTOP MODE */
    @media screen and (min-width: 993px) {
        .nav-btn {
            display: none !important;
        }

        .nav-links {
            display: flex !important;
        }

        .sidebar {
            display: none;
        }
    }

    /* TABLET MODE */
    @media screen and (max-width: 992px) {
        .nav-links {
            display: none !important;
        }

        .nav-btn {
            display: block !important;
        }

        .nav-center {
            padding: 15px 20px;
        }
    }

    /* MOBILE MODE */
    @media screen and (max-width: 576px) {
        .nav-logo {
            height: 50px;
        }

        .sidebar {
            width: 280px;
            left: -300px;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Prevent body scroll when sidebar is open */
    body.sidebar-open {
        overflow: hidden;
    }
</style>






<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("nav-btn");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        const closeBtn = document.getElementById("close-btn");
        const body = document.body;

        // Ouvrir le menu
        btn.addEventListener("click", () => {
            sidebar.classList.add("active");
            overlay.classList.add("active");
            body.classList.add("sidebar-open");
        });

        // Fermer le menu
        function closeMenu() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
            body.classList.remove("sidebar-open");
        }

        closeBtn.addEventListener("click", closeMenu);
        overlay.addEventListener("click", closeMenu);

        // Fermer le menu lors du clic sur un lien
        const sidebarLinks = sidebar.querySelectorAll("a");
        sidebarLinks.forEach(link => {
            link.addEventListener("click", () => {
                // Petit délai pour permettre la navigation
                setTimeout(closeMenu, 200);
            });
        });

        // Fermer avec la touche Échap
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && sidebar.classList.contains("active")) {
                closeMenu();
            }
        });
    });
</script>