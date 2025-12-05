<?php if (facebook()) {
    echo facebook();
} ?>
<?php if (login()) {
    toolbar();
} ?>
<svg width="0" height="0" style="display: none;">
    <symbol viewBox="0 0 16 16" id="menu-toggle">
        <title>menu</title>
        <path d="M0,14h16v-2H0V14z M0,2v2h16V2H0z M0,9h16V7H0V9z" />
    </symbol>
    <symbol viewBox="0 0 16 16" id="menu-close">
        <title>close</title>
        <polygon points="12.7,4.7 11.3,3.3 8,6.6 4.7,3.3 3.3,4.7 6.6,8 3.3,11.3 4.7,12.7 8,9.4 11.3,12.7 12.7,11.3 9.4,8" />
    </symbol>
    <symbol viewBox="0 0 16 16" id="search">
        <title>search</title>
        <path d="M14.7,13.3L11,9.6c0.6-0.9,1-2,1-3.1C12,3.5,9.5,1,6.5,1S1,3.5,1,6.5S3.5,12,6.5,12c1.2,0,2.2-0.4,3.1-1l3.7,3.7L14.7,13.3zM2.5,6.5c0-2.2,1.8-4,4-4s4,1.8,4,4s-1.8,4-4,4S2.5,8.7,2.5,6.5z" />
    </symbol>
    <symbol id="icon-twitter" viewBox="0 0 512 512">
        <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
    </symbol>
    <symbol id="icon-facebook" viewBox="0 0 512 512">
        <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
    </symbol>
    <symbol viewBox="0 0 16 16" id="icon-feed">
        <title>feed</title>
        <g enable-background="new">
            <path d="M2,6v2c3.3,0,6,2.7,6,6h2C10,9.6,6.4,6,2,6z M2,2v2c5.5,0,10,4.5,10,10h2C14,7.4,8.6,2,2,2z M3.5,11C2.7,11,2,11.7,2,12.5S2.7,14,3.5,14S5,13.3,5,12.5S4.3,11,3.5,11z" />
        </g>
    </symbol>
</svg>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <header id="masthead" class="site-header" role="banner">
        <div class="header-main">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo site_url(); ?>" rel="home"><?php echo blog_title(); ?></a></h1>
                <p class="site-description">
                    <img src="/geospace-togo/images/logo-2.jpeg" alt="Logo" class="site-logo">
                </p>
                <style>
                    .site-logo {
                        height: 60px;
                        /* modifie selon la taille souhaitée */
                        width: auto;
                        display: block;
                        margin: 0 auto;
                        /* centrer si tu veux */
                    }
                </style>
            </div><!-- .site-branding -->

            <button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <svg class="icon icon-menu" aria-hidden="true" role="img">
                    <use xlink:href="#menu-toggle"></use>
                </svg><svg class="icon icon-close" aria-hidden="true" role="img">
                    <use xlink:href="#menu-close"></use>
                </svg> <span class="menu-toggle-text">Menu</span>
            </button>

            <div class="primary-navigation">
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                    <?php echo menu('menu'); ?>
                </nav><!-- #site-navigation -->
            </div><!-- .primary-navigation -->
        </div><!-- .header-main -->
    </header><!-- #masthead -->

</div>