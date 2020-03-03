<?php  
/**
 * Template Name: text page
 */
get_header();
?>


<div class="container">

<div class="page_title" id="cart-title">
    <h2><?php the_title(); ?></h2>
</div>


<div class="row">
		

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$id = get_the_id();
		?>
				
		<div class="col-12">
					
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