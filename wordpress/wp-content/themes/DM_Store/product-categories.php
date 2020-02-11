<?php
/**
 * Template Name: Product Categories
 */
get_header('cart');
?>
<div class="page_title" id="cart-title">
<h2><?php the_title(); ?></h2>
<span class="ligne"></span>
</div>

<!-- <?php $args= array(
    'post_type' => 'product',
    );
 $result = new WP_Query($args); 
 
 if ($result->have_posts()){
    while($result->have_posts()) : $result->the_post();
    the_title();
    echo '<br>';
endwhile;
 }
    ?> -->

<!-- <?php  echo do_shortcode('[product_categories]');?> -->

<?php 

$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
);
$result = get_terms($args);
;?>

<section class="container">
    <div class="row">
<?php 
foreach ($result as $cat){?>
<div class="col-md-6 col-sm-6"></div>
<?php

}
;?>

    </div>
</section>
<?php get_footer();?> 