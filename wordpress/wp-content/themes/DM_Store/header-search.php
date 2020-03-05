<!doctype html>
<html>
  <head <?php language_attributes(); // langue du site ?>>
    <meta charset="<?php bloginfo( 'charset' ); //charset du site ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php bloginfo( 'name' ); wp_title('-', true, 'left'); ?></title>

    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/woocommerce.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/single-product.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/light-box.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/my-account.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/search.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script> <!-- for single-product page-->
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	
	<?php wp_head(); // intégre des éléments indispensable à WP. Comme les fichiers css, js, la barre d'administration côté FrontEnd, etc. ?>
  </head>

  <body id="body" <?php body_class(); // correspond plus ou moins au nom de la ressource en classe css. https://codex.wordpress.org/Function_Reference/body_class ?>>		
	
  <header>

<!-- container top-->
<div class="container-fluid party_1">
  <div class="row justify-content-end ">
    

      <div class="col-4">
          <div class="container_logo">
              <span class="custom_logo">
                <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo();}?>
              </span>

               <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="h-name">
                  <?php bloginfo( 'name' );?>
                 </a>   
          </div>
      </div> <!-- fin dev logo-->

      <div class="col-4">
        <div class="navbar-nav ">
          <p class="my-md-4 header-links">
          
          <i class="responsive-btn">
            <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="nav-icon-1"></span>
            <span class="nav-icon-2"></span>
            <span class="nav-icon-3"></span>
            </button>
          </i>
            
              <i class="fas fa-search search_click px-2"></i>
           
              <?php global $woocommerce ; ?>
            <a class="panier" href= "<?php echo $woocommerce-> cart-> get_cart_url ();?> "
            title = "<?php _e ('Cart View', 'woothemes');?>" > <i class="fas fa-shopping-cart"></i></a>
            <span class="navbar_cart_total">
            <?php echo sprintf ( _n ( '% d ' , '% d ' , $woocommerce-> cart-> cart_contents_count, 'woothemes' ) ,
            $woocommerce-> cart-> cart_contents_count ) ;?>
            </span>
          </p>
        </div>
      </div> <!-- fin div partie droite -->
 
  </div> <!-- fin row -->
</div><!-- fin container -->

<!-- search container-->
<div class="container search_container" style="display:none;">
<div class="row justify-content-md-center">
  
  <div class="col-md-auto">
  <?php echo get_sidebar('entete');  ?>
  </div>
</div>
</div>
      
<!-- deuxieme container-->
<div class="container-fluid p-0">
<div class="row justify-content-md-center party_2">

  <div class="col-md-auto">
    <nav class="navbar navbar-expand-lg navbar-light">
      
      <div class=mx-auto>
       <?php wp_nav_menu([
        'theme_location'  => 'primary',
        'container'       => 'div',
        'container_id'    => 'bs4navbar',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav mr-auto',
        'depth'           => 2,
        'fallback_cb'     => 'bs4navwalker::fallback',
        'walker'          => new bs4navwalker()
        ]);?>
    </div>
</div><!-- fin row -->
</div><!-- fin container -->

</header>
  
<div class="clear"></div>
<div id="top_from_page"></div>
<main role="main">