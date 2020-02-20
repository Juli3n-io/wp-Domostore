<?php get_header();?>

<?php $product =wc_get_product();
$id= $product->get_id()
?>

<section id="showcase">
  <div class="container">
    <div class="row">
    
    <div class="col-md-6 col-sm-6">
      <div class="showcase-left">
        <div class="img"><?php echo $product->get_image();?></div>
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
      <h4 class="sp_price"><?php echo $product->get_price();?> € </h4>

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
  <?php    
    $gallery = get_post_gallery_images( $post );
    ?>  

<img src=<?php  echo wp_get_attachment_image($gallery[0]);?>               
  
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
          <a href="#portfolio-item-0" class="portfolio__item">
          <img src=<?php  echo wp_get_attachment_image($attachment_ids[0]);?>
          </a>
          <a href="#portfolio-item-1" class="portfolio__item">
          <img src=<?php  echo wp_get_attachment_image($attachment_ids[1]);?>
          </a>
          <a href="#portfolio-item-2" class="portfolio__item">
          <img src=<?php  echo wp_get_attachment_image($attachment_ids[2]);?>
          </a>
          <a href="#portfolio-item-3" class="portfolio__item">
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
          <br>
          <h4>Partager:</h4>
    <?php echo do_shortcode("[Sassy_Social_Share]");?>

    <?php 
    $handle=new WC_Product_Variable($id);
        $variations1=$handle->get_children();
        foreach ($variations1 as $value) {
        $single_variation=new WC_Product_Variation($value);
            echo '<option  value="'.$value.'">'.implode(" / ", $single_variation->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$single_variation->price.'</option>';
}
    ?>
        </div>
        
      </div>
    </div>
  </div>
</section>

<section id="review" class="review">
  <div class="container">
    <h4>Les derniers avis clients :</h4>
    <div class="row">
      <?php echo do_shortcode('[woocommerce_reviews id="'.$id.'" no_of_reviews="2"]');?>
    </div>
    </div>
  </div>
</section>

<!-- Formulaire d'avis client-->

<section id="formulaire" class="form">
<h4>Laisser votre avis</h4>
  <div class="container">
      <div class="row">
        
        <div class="col-12">
        <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'woocommerce' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email' => array(
						'label'    => __( 'Email', 'woocommerce' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
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

<section id=related>
  <h4>Vous pourriez aimer également :</h4>

  <div class="container">
    <div class="row">

    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href="<?php echo get_permalink($product_1->get_id());?>">
              <div class="img_related"><?php echo $product_1->get_image();?></div>
          </a>
          
        </div>
        <h6>
          <a href=" <?php echo get_permalink($product_1->get_id());?> " class="related_product_name">
             <?php echo $product_1->get_name();?> 
          </a>
        </h6>

        <p class="related_price">
          <?php echo $product_1->get_regular_price();?> €
        </p>
        <p class="related_regular_price">
          <?php if ( $product_1->is_on_sale() ) : ?>
            <?php echo $product_1->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_1->get_id();
              $link   = esc_url( $product_1->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="related_btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>
   
    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href="<?php echo get_permalink($product_2->get_id());?>">
          <div class="img_related"><?php echo $product_2->get_image();?></div>
          </a>
        </div>
        <h6>
          <a href="<?php echo get_permalink($product_2->get_id());?> " class="related_product_name">
             <?php echo $product_2->get_name();?> 
          </a>
        </h6>

        <p class="related_price">
          <?php echo $product_2->get_regular_price();?> €
        </p>
        <p class="related_regular_price">
          <?php if ( $product_2->is_on_sale() ) : ?>
            <?php echo $product_2->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_2->get_id();
              $link   = esc_url( $product_2->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="related_btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>

    <div class="col-md-4 col-sm-4">
      <div class="related_products">
        <div>
          <a href="<?php echo get_permalink($product_3->get_id());?>">
          <div class="img_related"><?php echo $product_3->get_image();?></div>
          </a>
        </div>
        <h6>
          <a href=""<?php echo get_permalink($product_3->get_id());?>" class="related_product_name">
             <?php echo $product_3->get_name();?> 
          </a>
        </h6>

        <p class="related_price">
          <?php echo $product_3->get_price();?> €
        </p>
        <p class="related_regular_price">
          <?php if ( $product_3->is_on_sale() ) : ?>
            <?php echo $product_3->get_regular_price();?> €
          <?php endif;?>
        </p>

        <?php
          echo '<span class="cart">';
              $product_id = $product_3->get_id();
              $link   = esc_url( $product_3->add_to_cart_url() );
              $label  = apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
          echo sprintf('<a href="%s" data-product_id="%s" class="related_btn_achat add_to_cart_button product_type_%s">Acheter</a>', $link,  $product_id->id,  $product_id->product_type, $label);
          echo '</span>';
      ?>
      </div> 
    </div>

    </div>
  </div>
</section>

 <section class="portfolio-lightboxes">

    <div class="portfolio-lightbox" id="portfolio-item-0">
      <div class="portfolio-lightbox__content">
        <a href="#" class="close"></a>
        <a href="#portfolio-item-1" class="next"></a>
        <a href="#portfolio-item-0" class="prev"></a>
        <img width="300px" height="300px" src=<?php  echo wp_get_attachment_image($attachment_ids[0]);?>
      </div>
    </div>

    <div class="portfolio-lightbox" id="portfolio-item-1">
      <div class="portfolio-lightbox__content">
        <a href="#" class="close"></a>
        <a href="#portfolio-item-2" class="next"></a>
        <a href="#portfolio-item-1" class="prev"></a>
        <img width="300px" height="300px" src=<?php  echo wp_get_attachment_image($attachment_ids[1]);?>
      </div>
    </div>

    <div class="portfolio-lightbox" id="portfolio-item-2">
      <div class="portfolio-lightbox__content">
        <a href="#" class="close"></a>
        <a href="#portfolio-item-3" class="next"></a>
        <a href="#portfolio-item-2" class="prev"></a>
        <img  width="300px" height="300px"src=<?php  echo wp_get_attachment_image($attachment_ids[2]);?>
      </div>
    </div>

    <div class="portfolio-lightbox" id="portfolio-item-3">
      <div class="portfolio-lightbox__content">
        <a href="#" class="close"></a>
        <a href="#portfolio-item-0" class="next"></a>
        <a href="#portfolio-item-2" class="prev"></a>
        <img width="300px" height="300px"  src=<?php  echo wp_get_attachment_image($attachment_ids[3]);?>
      </div>
    </div>
 </section>

 <script>
 
 </script>

<?php get_footer();?> 