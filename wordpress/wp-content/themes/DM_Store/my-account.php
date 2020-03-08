<?php
/**
 * Template Name: My Account
 */
get_header();
?>

<div class="page_title_account" id="cart-title">
<h2><?php the_title(); ?></h2>

</div>

<section class="container">

<?php echo do_shortcode('[woocommerce_my_account]');?>

</section>


<?php get_footer();?>