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
      <!-- Bouton Achat -->
      <?php
          echo '<span class="cart">';
              $product_id = $product->get_id();
              $link   = esc_url( $product->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
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
          <a href=<?php  echo wp_get_attachment_image($attachment_ids[0]);?>
           <img src=<?php  echo wp_get_attachment_image($attachment_ids[0]);?>
          </a>
          <a href=<?php  echo wp_get_attachment_image($attachment_ids[1]);?>
           <img src=<?php  echo wp_get_attachment_image($attachment_ids[1]);?>
          </a>
          <a href=<?php  echo wp_get_attachment_image($attachment_ids[2]);?>
           <img src=<?php  echo wp_get_attachment_image($attachment_ids[2]);?>
          </a>
          <a href=<?php  echo wp_get_attachment_image($attachment_ids[3]);?>
           <img src=<?php  echo wp_get_attachment_image($attachment_ids[3]);?>
          </a>
        
          
        </div>

      </div>
      
      <div class="col-md-6 col-sm-6">
        <div class="info-right">
          <h4>Informations Complémentaires:</h4>
          <br>
          <p>Poids: <span><?php echo $product->get_weight();?> g.</span></p>
          <p>Dimensions: <span><?php echo $product->get_dimensions();?></span></p>
          <p>sku : <span><?php echo $product->get_sku();?></span></p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Récupération des produits liés-->
<?php 
        $related_products_ids = $product->get_related();
        $product_1_ids = $related_products_ids[0];
        $product_1 = wc_get_product($product_1_ids);
        $product_2_ids = $related_products_ids[1];
        $product_2 = wc_get_product($product_2_ids);
        $product_3_ids = $related_products_ids[2];
        $product_3 = wc_get_product($product_3_ids);
    ?>

<section id=info2>
  <h4>Vous pourriez aimer également :</h4>

  <div class="container">
    <div class="row">

    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href="<?php echo get_permalink($product_1->get_id());?>">
              <img src=<?php echo $product_1->get_image();?>
          </a>
          
        </div>
        <h6>
          <a href=" <?php echo get_permalink($product_1->get_id());?> " class="related_product_name">
             <?php echo $product_1->get_name();?> 
          </a>
        </h6>

        <p class="price">
          <?php echo $product_1->get_regular_price();?> €
        </p>
        <p class="regular_price">
          <?php if ( $product_1->is_on_sale() ) : ?>
            <?php echo $product_1->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_1->get_id();
              $link   = esc_url( $product_1->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>
   
    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href=""<?php echo get_permalink($product_2->get_id());?>">
              <img src=<?php echo $product_2->get_image();?>
          </a>
        </div>
        <h6>
          <a href=" "<?php echo get_permalink($product_2->get_id());?> " class="related_product_name">
             <?php echo $product_2->get_name();?> 
          </a>
        </h6>

        <p class="price">
          <?php echo $product_2->get_regular_price();?> €
        </p>
        <p class="regular_price">
          <?php if ( $product_2->is_on_sale() ) : ?>
            <?php echo $product_2->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_2->get_id();
              $link   = esc_url( $product_2->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>

    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href=""<?php echo get_permalink($product_3->get_id());?>">
              <img src=<?php echo $product_3->get_image();?>
          </a>
        </div>
        <h6>
          <a href=""<?php echo get_permalink($product_3->get_id());?>" class="related_product_name">
             <?php echo $product_3->get_name();?> 
          </a>
        </h6>

        <p class="price">
          <?php echo $product_3->get_price();?> €
        </p>
        <p class="regular_price">
          <?php if ( $product_3->is_on_sale() ) : ?>
            <?php echo $product_3->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_3->get_id();
              $link   = esc_url( $product_3->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>

    </div>
  </div>
</section>


<?php get_footer();?>