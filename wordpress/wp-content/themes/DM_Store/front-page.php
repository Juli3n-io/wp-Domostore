<?php get_header(); // appel du fichier header.php ?>

<div class="main-image">

<h1> <?php bloginfo( 'name' );?></h1>
<span class="ligne"></span>
<h3><?php bloginfo( 'description' ); ?></h3>
</div>

<div class="container">
				<!-- Example row of columns -->
				<div class="row">

<section>
<?php //echo do_shortcode('[product_categories]')?>

<?php
get_terms($args);

$args = array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'parent' => 0,
);
$result = get_terms($args);
?>


<div class="container-fluid">
	<div class="row">
		<?php
		foreach ( $result as $cat ) {
			if ( 'Uncategorized' !== $cat->name ) {
			$term_link = get_term_link( $cat, 'product_cat' );
			$cat_thumb_id =	get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$shop_catalog_img_arr = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
			$cat_img = $shop_catalog_img_arr[0];
				?>
			<div class="col-sm">
			<div>
					<a href="<?php echo $term_link; ?>">
						<?php echo $cat->name; ?>
					</a>
				</div>

				<div>
					<a href="<?php echo $term_link; ?>"><img src="<?php echo $cat_img; ?>" alt=""></a>
				</div>
				
			</div>
		<?php
			}
		}
		?>
	</div>
</div>

</section>
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="col-md-12">
				<!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
				<div class="contenu"><?php the_content(); ?></div>
				</div>
				<?php endwhile; else: ?>
				<div class="col-md-12">
				<p><?php _e('Sorry, no posts matched your criteria.','nouveau_theme'); ?></p>
				</div>
				<?php endif; ?>
</div> <!-- /container -->


<div>
<img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>"></div>
			<?php get_footer(); // appel du fichier footer.php ?>