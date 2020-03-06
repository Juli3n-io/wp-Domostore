<?php get_header(); 

$product =wc_get_product();

$args =array(
    'post_type'=>'product',
);
$result = new wp_query($args);



if ( is_product_category() ){ global $wp_query; $cat = $wp_query->get_queried_object();
	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id );
	// if ( $image ) {
	// 	echo '<img class="classtopright" src="' . $image . '" alt="" width="280"/>';
	// }
	
}


?>


<div class="container-fluid">
<!-- Example row of columns -->
	<div class="title_page" style="background: url(<?php echo $image;?>) no-repeat; 
	background-size: cover;
	background-position: center">

		<h2>
			<?php the_title(); ?>
			
		</h2>
			
	</div> <!-- fin div title_page-->

	<div class="menu_filter_open">
	<p class="filter"><i class="fas fa-arrow-circle-right"></i> Filtres</p>
    </div>
	
	<div class="responsive_sidebar">
		<div class="responsive_close">
			<i class="fas fa-times"></i>
        </div>
	<?php echo get_sidebar('responsive');  ?>
	</div>
	


	<div class="row">
		<div class="col-md-3 col-sm-12 sidebar">
		<?php echo get_sidebar('gauche');  ?>
		</div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$id = get_the_id();
		?>
				
		<div class="col-md-9 col-sm-12">
					
			<div class="contenu"><?php the_content(); ?></div>
		</div>
		
		
		<?php endwhile; else: ?>

		<div class="col-md-8 col-sm-12">

			<p><?php _e('Sorry, no posts matched your criteria.','DM_Store'); ?></p>

		</div>

		
	</div><!-- /row -->

		<?php endif; ?>
</div> <!-- /container -->


				 
<?php get_footer(); // appel du fichier footer.php ?>