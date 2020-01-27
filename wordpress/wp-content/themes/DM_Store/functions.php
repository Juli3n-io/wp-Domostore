<?php	
	
	// require du fichier custom navwalker necessaire au bon affichage du menu bootstrap4 sur WP
	require_once('bs4navwalker.php');
	

	
	// --- REGION/WIDGET
	add_action( 'widgets_init', 'DM_Store_init_sidebar' ); // j'exécute la fonction nommé "nouveau_theme_init_sidebar".
	function nouveau_theme_init_sidebar() // fonction qui contient la déclaration de mes régions.
	{
		if(function_exists('register_sidebar')) // si la fonction register_sidebar existe (c'est une fonction interne à wordpress), alors je déclare des régions.
		{
			register_sidebar( array(
				'name'          => __( 'region-entete', 'DM_Store' ),
				'id'            => 'region-entete',
				'description'   => __( 'Add widgets here to appear in your entete region.', 'nouveau_theme' )
			) );
			register_sidebar( array(
				'name'          => __( 'colonne de droite', 'DM_Store' ),
				'id'            => 'colonne-droite',
				'description'   => __( 'Add widgets here to appear in your colonne droite region.', 'nouveau_theme' )
			) );
			register_sidebar( array(
				'name'          => __( 'region-footer', 'DM_Store' ),
				'id'            => 'region-footer',
				'description'   => __( 'Add widgets here to appear in your region.', 'nouveau_theme' )
			) );
		}
	}


	
	$defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );
	
	

	add_theme_support( 'custom-logo' );
	add_theme_support('custom-background');
	add_theme_support( 'customize-selective-refresh-widgets' );
	

	function domostore_custom_header_setup() {
		$args = array(
			'default-image' => get_stylesheet_directory_uri() . '/assets/img/house.jpg', 
			'header-selector' => '.main-image',
			'default-text-color' => '000',
			'width'              => 1000,
			'height'             => 250,
			'flex-width'         => true,
			'flex-height'        => true,
		);
		add_theme_support( 'custom-header', $args );
	}
	add_action( 'after_setup_theme', 'domostore_custom_header_setup' );

	function register_my_menus() {
		register_nav_menus(
		array(
		'primary' => __( 'Header Navigation Menu' ),
		'secondary' => __( 'Menu Secondaire' ),
		'footer-menu' => __( 'Menu Footer' ),
		)
		);
	   }
	   add_action( 'init', 'register_my_menus' );

// Change le texte 'Ajouter au panier' sur la page de produit unique

add_filter( 'woocommerce_product_single_add_to_cart_text', 'bryce_add_to_cart_text' );

function bryce_add_to_cart_text() {

        return __( 'Acheter maintenant', 'woocommerce' );

}

// Change le texte 'Ajouter au panier' sur la page archive des produits

add_filter( 'woocommerce_product_add_to_cart_text', 'bryce_archive_add_to_cart_text' );

function bryce_archive_add_to_cart_text() {

        return __( 'Acheter', 'your-slug' );

}

//feuille de style personnalisée pour la page login WordPress
function login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login.css' );
}
add_action( 'login_enqueue_scripts', 'login_stylesheet' );

function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Custom', 'DM_Store' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'DM_Store' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

?>