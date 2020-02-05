<!doctype html>
<html>
  <head <?php language_attributes(); // langue du site ?>>
    <meta charset="<?php bloginfo( 'charset' ); //charset du site ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php bloginfo( 'name' ); wp_title('-', true, 'right'); ?></title>

    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/woocommerce.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/single-product.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/light-box.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/my-account.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script> <!-- for single-product page-->
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	
	<?php wp_head(); // intégre des éléments indispensable à WP. Comme les fichiers css, js, la barre d'administration côté FrontEnd, etc. ?>
  </head>

  <body id="body" <?php body_class(); // correspond plus ou moins au nom de la ressource en classe css. https://codex.wordpress.org/Function_Reference/body_class ?>>		
	
<header class="header block">
  <div class="navbar ">
    <ul>
      <li>
        <div class="container_logo">
          <span class="custom_logo">
            <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo();}?>
          </span>

          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="h-name">
           <?php bloginfo( 'name' );?>
          </a>   
         </div>
       </li>

      <li>
        <nav class="menu" id="menu-p">  
          <?php
             wp_nav_menu( 
              array( 
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'menu_cat'        
            ) ); 
          ?>    
        </nav> 
      </li>

      <li class="navbar_panier">
            
      <div class="panier">      
      <?php global $woocommerce ; ?>
     
        <a class= "" href= "<?php echo $woocommerce-> cart-> get_cart_url ();?> "
        title = "<?php _e ('Cart View', 'woothemes');?>" > <i class="fas fa-shopping-cart"></i></a>
        <span class="navbar_cart_total">
       <?php echo sprintf ( _n ( '% d item' , '% d ' , $woocommerce-> cart-> cart_contents_count, 'woothemes' ) ,
      $woocommerce-> cart-> cart_contents_count ) ;?>
      </span>
      
      
    </div>
       
      </li>
    </ul>
    

    

    
    


<div class="clear"></div>

  </div>

  <div class="responsive-bar ">
    <ul>
      <li>
        <div class="responsive-btn ">
        <input type="checkbox" name="menu-bnt" id="menu-btn" class="menu-btn">
        <label for="menu-btn" class="menu-icon" id="menu-icon"><span class="nav-icon"></span></label>
        </div>
      </li>

    <li>
      <div class="responsive_container_logo">
        <span class="custom_logo">
        <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo();}?>
        </span>

        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="h-name" >
       <?php bloginfo( 'name' );?>
        </a>  
      </div>
    </li>

    <li>
      <div class="responsive_cart" >
      <a class= "" id="responsive_cart" href= "<?php echo $woocommerce-> cart-> get_cart_url ();?> "
        title = "<?php _e ('Cart View', 'woothemes');?>" ><i class="fas fa-shopping-cart"></i></a>
      <span class="responsive_cart_total">
       <?php echo sprintf ( _n ( '% d item' , '% d ' , $woocommerce-> cart-> cart_contents_count, 'woothemes' ) ,
      $woocommerce-> cart-> cart_contents_count ) ;?>
      </span>
      </div>
    </li>
           
    </ul>
<div class="clear"></div>

    </div>

	<?php get_sidebar('entete'); // appel au fichier sidebar-entete.php ?>
</header>
  
<div class="clear"></div>

<main role="main">