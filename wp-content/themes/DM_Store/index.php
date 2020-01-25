<?php get_header(); // appel du fichier header.php ?>

<div>

</div>

<div class="container">
				
<div class="row">
				
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
<div class="col-md-12">
	
	<h2>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<p>coucou</p>
<div class="contenu"><?php the_content(); ?></div>
</div>
				
<?php endwhile; else: ?>
				
<div class="col-md-12">
	<p><?php _e('Sorry, no posts matched your criteria.','nouveau_theme'); ?></p>
</div>
<?php endif; ?>

</div> <!-- /container -->
				 
<?php get_footer(); // appel du fichier footer.php ?>