<?php
/**
 * Template Name: Checkout Page
 */
get_header('checkout');
?>

<div class="page_title" id="cart-title">
<h2><?php the_title(); ?></h2>
<span class="ligne"></span>
</div>

<section class="container">

<?php echo do_shortcode('[woocommerce_checkout]');?>

</section>


<?php get_footer('checkout');?>