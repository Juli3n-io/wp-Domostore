<?php get_header();?>

<?php $product =wc_get_product();?>

<section id="showcase">
  <div class="container">
    <div class="row">
    
    <div class="col-md-6 col-sm-6">
      <div class="showcase-left">
        <img src=<?php echo $product->get_image();?>
      </div>
    </div>

    <div class="col-md-6 col-sm-6">
      <div class="showcase-right">

        <!-- Affichage classic-->
        <h1><?php echo $product->get_name();?></h1>
        <p><?php echo $product->get_short_description();?></p>
        
        <!-- visible si produit en solde-->
      <?php if ( $product->is_on_sale() ) : ?>

        <?php echo '<span class="badge_promo">Promotion</span>' ;?>
 
      <?php endif;?>

      </div>
      <br>
      <h4 class="price"><?php echo $product->get_price();?> € </h4>

      <p class="regular_price">

      <?php if ( $product->is_on_sale() ) : ?>

        <?php echo $product->get_regular_price();?> €

      <?php endif;?>
      
    </p>
      <br>
      <a href="" class="btn_achat">Acheter</a>
    </div>

    </div>
  </div>
</section>


<section id="description">
  <div class="container">
  <p><?php echo $product->get_description();?></p>
  </div>
</section>

<?php 
$attachment_ids =$product->get_gallery_image_ids();
?>


<section id="info1">
  <div class="container">
    <div class="row">

      <div class="col-md-6 col-sm-6">
        <div class="info-left">
        <?php 
          foreach( $attachment_ids as $attachment_id ) 
          {
            echo wp_get_attachment_image($attachment_id);
        };?>  
        </div>

      </div>
      
      <div class="col-md-6 col-sm-6">
        <div class="info-right">
          <h4>Informations Complémentaires</h4>
          <br>
          <p>Poids: <span><?php echo $product->get_weight();?> g.</span></p>
          <p>Dimensions: <span><?php echo $product->get_dimensions();?></span></p>
          <p>sku : <span><?php echo $product->get_sku();?></span></p>
        </div>
      </div>

    </div>
  </div>
</section>



<section id=info2>
  <div class="container">
    <div class="row">

    <div class="col-md-6 col-sm-6">
      <div class="rewiew_form">
        <h5>laisser un avis</h5>

      </div>    
    </div>

    <div class="col-md-6 col-sm-6">
      <div class="rewiews">
        <h5>Avis Clients</h5>
        <?php echo $product->get_average_rating();?>
      </div>
    </div>

    </div>
  </div>
</section>







<?php get_footer();?>