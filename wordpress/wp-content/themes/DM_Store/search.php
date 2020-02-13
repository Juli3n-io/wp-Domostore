<?php get_header(); 

$args =array(
    'post_type'=>'product',
);
$result = new wp_query($args);
?>

<div class="container">

    <div class="search_title" id="cart-title">
        <h1>Résultats de la recherche :</h1>
        <span class="ligne"></span>
    </div>

    <div class="row">
        
    
 <!-- DEBUT de la boucle -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
 $id = get_the_id();
 ?>
    
 <div class="card" style="width: 18rem;">
  <img src=<?php the_post_thumbnail(); ?>
  <div class="card-body">
    <h5 class="card-title"><?php the_title();?></h5>
    <p class="card-text"></p>
    <a href="<?php the_permalink();?>" class="btn btn-primary">voir</a>
    <div class=""><?php echo do_shortcode('[add_to_cart id="'.$id.'"]');?></div>
  </div>
</div>
    

    
 <!-- FIN de la boucle -->
 <?php endwhile; else: ?>
 
 <p>
 <?php _e("Aucun résultat pour cette recherche"); ?>
 </p>
 <?php endif; ?>
 
    </div> <!-- FIN row -->
</div>  <!-- FIN container -->


<?php get_footer(); ?>