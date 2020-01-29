<?php get_header(); // appel du fichier header.php ?>
<!-- En tête personalisé -->
<div class="main-image" 
style="
background: url(<?php header_image(); ?>) no-repeat;
width: 100%;
height: 100vh;    
top:0;
background-size: cover;
background-position: center;
" 
id="top_from_page"
>

<h1 class="f-name"> <?php bloginfo( 'name' );?></h1>
<span class="ligne"></span>
<h3><?php bloginfo( 'description' ); ?></h3>
</div>

<!-- Titre de la page-->
<div class="page_title">
<h2><?php the_title(); ?></h2>
<span class="ligne"></span>
</div>

<section>
<!-- Récupération des catégories de produits-->
<?php
get_terms($args);

$args = array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'parent' => 0,
);
$result = get_terms($args);
?>

<div class="container"> 
<h3 class="front_titre">Choisir une Catégorie </h3>
<!--  affichage des différentes catégorie de produits-->
	<div class="row">
	
		<?php
		foreach ( $result as $cat ) {
			if ( 'Uncategorized' !== $cat->name ) {
			$term_link = get_term_link( $cat, 'product_cat' );
			$cat_thumb_id =	get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$shop_catalog_img_arr = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
			$cat_img = $shop_catalog_img_arr[0];
				?>
				

			<div class="col-sm front_cat_product" 
			style="background: url(<?php echo $cat_img; ?>) no-repeat;
			background-size: cover;
			background-position: center;">
				
					<a href="<?php echo $term_link; ?>">
						<?php echo $cat->name; ?>
					</a>				
			</div>
		<?php
			}
		}
		?>
	</div> <!-- /row -->
</div> <!-- /container -->

</section>
			
<section> <!-- Affichage des contenu rajouté par l'utilisateur -->
	<div class="container">
		<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<div class="col-md-12">
				
				<div class="contenu"><?php the_content(); ?></div>
				</div>
				<?php endwhile; else: ?>
				<div class="col-md-12">
				<p><?php _e('Sorry, no posts matched your criteria.','nouveau_theme'); ?></p>
		</div><!-- /row -->
		<?php endif; ?>
	</div> <!-- /container -->
</section>
				
<section> <!-- Affichage des articles -->
	<div class="container">
	<h3 class="front_titre">Les derniers articles </h3>
		<?php
		$args = array( 'numberposts' => 5, 'order'=> 'ASC', 'orderby' => 'date' );
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); ?> 

<div class="blog-post">
        <div class="blog-post__img">
            <img src=<?php the_post_thumbnail(); ?>
        </div>
        <div class="blog-post__info">
            <div class="blog-post__date">
                <span><?php the_date(); ?></span>
            </div>
            <h2 class="blog-post__title"><?php the_title(); ?></h2>
            <p class="blog-post__text"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink() ?>" class="blog-post__cta">Voir l'article</a>
        </div>

    </div>



		

		<?php endforeach; ?>
		
	</div><!-- /container -->
</section>




<?php get_footer(); // appel du fichier footer.php ?>