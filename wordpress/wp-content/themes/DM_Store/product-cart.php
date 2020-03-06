<?php
/**
 * Template Name: Product Cart
 */
get_header('cart');
?>



<div class="page_title" id="cart-title">

<h2><?php the_title(); ?></h2>
<span class="ligne"></span>
</div>

<section class="container">
<?php echo do_shortcode("[woocommerce_cart]");?>
</section>


<?php get_footer('cart');?>