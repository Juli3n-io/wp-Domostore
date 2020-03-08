<?php
/**
 * Template Name: Contact
 */
get_header();
?>
<main  class="contact_main" style="
background: url(<?php header_image(); ?>) no-repeat;
width: 100%;
height: 100%;    
background-size: cover;
background-attachment: fixed;
background-position: center;">

<div class="contact_titre">

		<h2>
			<?php the_title(); ?>
		</h2>
						
    </div> <!-- fin div title_page-->
    
<section class="container contact_container">
    <div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
		<div class="col">
					
			<div class="contenu"><?php the_content(); ?></div>
		</div>
		
		
		<?php endwhile; else: ?>

		<div class="col">

			<p><?php _e('Sorry, no posts matched your criteria.','DM_Store'); ?></p>

		</div>

		
	</div><!-- /row -->

		<?php endif; ?>
</section>
</main>
<?php get_footer();?>