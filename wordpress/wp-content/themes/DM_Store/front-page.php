<?php 
get_header('front');
?>
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

>

<h1 class="f-name"> <?php bloginfo( 'name' );?></h1>
<span class="ligne f-name"></span>
<h3 class="f-name"><?php bloginfo( 'description' ); ?></h3>
</div>

<!-- Titre de la page-->
<!-- <div class="page_front_title">
<h2><?php the_title(); ?></h2>
<span class="ligne"></span>
</div> -->


			
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
	<h3 class="front_titre article_front_title">Les derniers articles </h3>
		<?php
		$args = array( 'numberposts' => 5, 'order'=> 'ASC', 'orderby' => 'date' );
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post);
		$id = get_the_id();
 		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->$id )); ?> 

<div class="blog-post">
        <div class="blog-post__img">
			<img src="<?php echo esc_url( $image[0] ); ?>" alt="View more info" />
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




<?php 
	get_footer('front');
?>