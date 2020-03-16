<?php get_header();?>

<div class="container-fluid page404">
    <main id="main" class="site-main" role="main">

    <section class="error-404 not-found">

        <head class="head_404">
            <h1 class="title_404">404</h1>
            <span class="ligne ligne_404"></span>
            <h3 class="text_404">hey désolé, mais cette page n'existe pas!</h3>
        </head>

        <div class="page-content">

        
        <div class="back_to_home_404">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" >
                    Retour à l'accueil
        </a>  
        </div>      
        

        </div>

    </section>

    </main>
</div>

<?php get_footer();?>