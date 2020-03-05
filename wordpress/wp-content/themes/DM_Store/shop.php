<?php 
/**
 * Template Name: Shop-page
 */
get_header(); 
?>


<div class="container-fluid">
<!-- Example row of columns -->
	<div class="title_page" style="background: url(<?php header_image(); ?>) no-repeat; 
	background-size: cover;
	background-position: center">

		<h2>
			<?php the_title(); ?>
			
		</h2>
			
	</div> <!-- fin div title_page-->

	<div class="menu_filter_open">
	<p><i class="fas fa-arrow-circle-right"></i> Filtres</p>
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