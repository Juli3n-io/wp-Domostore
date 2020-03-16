<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ivole_Google_Shopping_Settings' ) ):

/**
 * Class for Google Shopping Reviews XML settings.
 *
 * @since 3.47
 */
class Ivole_Google_Shopping_Settings {

	/**
	 * @var Ivole_Settings_Admin_Menu The instance of the settings admin menu
	 */
	protected $settings_menu;

	/**
	 * @var string The slug of this tab
	 */
	protected $tab;

	/**
	 * @var array The fields for this tab
	 */
	protected $settings;

	/**
	 * Constructor.
	 *
	 * @since 3.47
	 *
	 * @param Ivole_Settings_Admin_Menu $settings_menu Admin menu object
	 */
	public function __construct( $settings_menu ) {
		$this->settings_menu = $settings_menu;
		$this->tab = 'google_shopping';

		add_filter( 'ivole_settings_tabs', array( $this, 'register_tab' ) );
		add_action( 'ivole_settings_display_' . $this->tab, array( $this, 'display' ) );
		add_action( 'ivole_save_settings_' . $this->tab, array( $this, 'save' ) );

		add_action( 'woocommerce_admin_field_ivole_field_map', array( $this, 'display_field_map' ) );
		add_action( 'woocommerce_admin_field_feed_file_url', array( $this, 'display_feed_file_url' ) );
		add_filter( 'woocommerce_admin_settings_sanitize_option_ivole_google_field_map', array( $this, 'sanitize_field_map' ) );
		add_filter( 'woocommerce_admin_settings_sanitize_option_feed_file_url', array( $this, 'sanitize_feed_file_url' ) );
	}

	/**
	 * Register the Google tab
	 *
	 * @since 3.47
	 *
	 * @return array
	 */
	public function register_tab( $tabs ) {
		$tabs[$this->tab] = __( 'Google', IVOLE_TEXT_DOMAIN );
		return $tabs;
	}

	/**
	 * Display settings form
	 *
	 * @see Ivole_Settings_Admin_Menu
	 *
	 * @since 3.47
	 */
	public function display() {
		$this->init_settings();
		WC_Admin_Settings::output_fields( $this->settings );
	}

	/**
	 * Save settings from form
	 *
	 * @see Ivole_Settings_Admin_Menu::save_settings
	 *
	 * @since 3.47
	 */
	public function save() {
		$this->init_settings();
		WC_Admin_Settings::save_fields( $this->settings );

		$feed = new Ivole_Google_Shopping_Feed();

		if ( $feed->is_enabled() ) {
			$feed->activate();
		} else {
			$feed->deactivate();
		}
	}

	/**
	 * Set the settings to be displayed on this settings tab
	 *
	 * @since 3.47
	 *
	 * @access protected
	 */
	protected function init_settings() {
		$field_map = get_option( 'ivole_google_field_map', array(
			'gtin'  => '',
			'mpn'   => '',
			'sku'   => '',
			'brand' => ''
		) );

		$this->settings = array(
			array(
				'title' => __( 'Integration with Google Services', IVOLE_TEXT_DOMAIN ),
				'type'  => 'title',
				'desc'  => __( '<b>Review Stars in Google Search Organic Listings</b><br><br>' .
				'The standard WooCommerce functionality already includes structured data mark up to display your product reviews effectively within organic search results. This plugin extends the standard functionality and adds some extra mark up to help search engines properly crawl your shop. It is important to understand that having a valid structured data mark up in place makes your website eligible for organic stars in Google but it doesn\'t guarantee that they will be shown. You can test the rich snippets using <a href="https://search.google.com/structured-data/testing-tool">Google’s Structured Data Testing Tool</a>.<br><br>' .
				'<b>Review Stars in Google Shopping</b><br><br>Google Shopping is a service that allows merchants to list their products by uploading a product feed in the <a href="https://merchants.google.com/">Merchant Center</a>. The Google Shopping XML Product Review Feed is necessary to show your product reviews inside Google Shopping search results.', IVOLE_TEXT_DOMAIN ),
				'id'    => 'ivole_google_shopping'
			),

			array(
				'id'       => 'ivole_google_generate_xml_feed',
				'title'    => __( 'Generate Product Review Feed', IVOLE_TEXT_DOMAIN ),
				'desc'     => __( 'Generate XML Product Review Feed for Google Shopping', IVOLE_TEXT_DOMAIN ),
				'desc_tip' => __( 'When active, an XML file for Google Shopping Reviews will be generated immediately after saving settings and then updated every 24 hours.', IVOLE_TEXT_DOMAIN ),
				'default'  => 'no',
				'type'     => 'checkbox'
			),

			array(
				'id'       => 'ivole_google_exclude_variable_parent',
				'title'    => __( 'Exclude Parent Product', IVOLE_TEXT_DOMAIN ),
				'desc'     => __( 'Exclude product IDs for parents of variable products from the XML feed', IVOLE_TEXT_DOMAIN ),
				'default'  => 'yes',
				'type'     => 'checkbox'
			),

			array(
				'id'       => 'ivole_google_encode_special_chars',
				'title'    => __( 'Encode Special Characters', IVOLE_TEXT_DOMAIN ),
				'desc'     => __( 'Encode special characters in the XML feed', IVOLE_TEXT_DOMAIN ),
				'default'  => 'no',
				'type'     => 'checkbox'
			),

			array(
				'id'       => 'ivole_feed_file_url',
				'title'    => __( 'File URL', IVOLE_TEXT_DOMAIN ),
				'type'     => 'feed_file_url',
				'desc'     => __( 'URL of the file with the feed that should be maintained in Google Merchant Center.', IVOLE_TEXT_DOMAIN ),
				'desc_tip' => true,
				'css'      => 'width: 500px;max-width:100%;'
			),

			array(
				'id'        => 'ivole_google_field_map',
				'type'      => 'ivole_field_map',
				'title'     => __( 'Fields Mapping', IVOLE_TEXT_DOMAIN ),
				'desc'      => __( 'Specify WooCommerce fields that should be mapped to GTIN, MPN, SKU, and Brand fields in XML Product Review Feed for Google Shopping.', IVOLE_TEXT_DOMAIN ),
				'desc_tip'  => true,
				'field_map' => $field_map
			),

			array(
				'id'                => 'ivole_google_brand_static',
				'title'             => __( 'Brand (Static)', IVOLE_TEXT_DOMAIN ),
				'type'              => 'text',
				'desc'     => __( 'Specify a default brand for all products in your store. If this field is non-empty, the plugin will use this brand for all products in XML Product Review Feed for Google Shopping.', IVOLE_TEXT_DOMAIN ),
				'desc_tip' => true,
				'default'           => '',
				'css'               => 'width: 500px;max-width:100%;'
			),

			array(
				'type' => 'sectionend',
				'id'   => 'ivole_google_shopping'
			)
		);
	}

	/**
	 * Display the field map field type
	 *
	 * @since 3.47
	 *
	 * @param array $options {
	 * 		@type string	$id			The id of the field, used as the option_name
	 * 		@type string	$type		The type of field, always ivole_field_map
	 * 		@type string	$title		The title for the field
	 * 		@type array		$field_map	The field map. Assosciative array represents the map
	 * }
	 */
	public function display_field_map( $options ) {
		$options = wp_parse_args( $options, array(
			'field_map' => array(
				'gtin'  => '',
				'mpn'   => '',
				'sku'   => '',
				'brand' => ''
			)
		) );
		$tmp = Ivole_Admin::ivole_get_field_description( $options );
		$tooltip_html = $tmp['tooltip_html'];
		?>
		<tr valign="top">
			<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
					<?php echo $tooltip_html; ?>
			</th>
      <td colspan="2">
        <table class="ivole-field-map widefat striped" border="0">
					<thead>
						<tr>
							<th><?php _e( 'XML Feed Field', IVOLE_TEXT_DOMAIN ); ?></th>
							<th><?php _e( 'WooCommerce Field', IVOLE_TEXT_DOMAIN ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e( 'GTIN', IVOLE_TEXT_DOMAIN ); ?></td>
							<td>
								<select name="ivole_field_wc_target_gtin" style="width:270px;">
									<option value=""></option>
									<?php foreach ( $this->get_product_attributes() as $attribute_value => $attribute_name ): ?>
										<option value="<?php echo $attribute_value; ?>" <?php if ( $attribute_value == $options['field_map']['gtin'] ) echo "selected"; ?>><?php echo $attribute_name; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e( 'MPN', IVOLE_TEXT_DOMAIN ); ?></td>
							<td>
								<select name="ivole_field_wc_target_mpn" style="width:270px;">
									<option value=""></option>
									<?php foreach ( $this->get_product_attributes() as $attribute_value => $attribute_name ): ?>
										<option value="<?php echo $attribute_value; ?>" <?php if ( $attribute_value == $options['field_map']['mpn'] ) echo "selected"; ?>><?php echo $attribute_name; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e( 'SKU', IVOLE_TEXT_DOMAIN ); ?></td>
							<td>
								<select name="ivole_field_wc_target_sku" style="width:270px;">
									<option value=""></option>
									<?php foreach ( $this->get_product_attributes() as $attribute_value => $attribute_name ): ?>
										<option value="<?php echo $attribute_value; ?>" <?php if ( $attribute_value == $options['field_map']['sku'] ) echo "selected"; ?>><?php echo $attribute_name; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e( 'Brand', IVOLE_TEXT_DOMAIN ); ?></td>
							<td>
								<select name="ivole_field_wc_target_brand" style="width:270px;">
									<option value=""></option>
									<?php foreach ( $this->get_product_attributes() as $attribute_value => $attribute_name ): ?>
										<option value="<?php echo $attribute_value; ?>" <?php if ( $attribute_value == $options['field_map']['brand'] ) echo "selected"; ?>><?php echo $attribute_name; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
            </td>
		</tr>
		<?php
	}

	public function display_feed_file_url( $value ) {
		$tmp = Ivole_Admin::ivole_get_field_description( $value );
		$tooltip_html = $tmp['tooltip_html'];
		$upload_url = wp_upload_dir();
    ?>
    <tr valign="top">
			<th scope="row" class="titledesc">
				<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
				<?php echo $tooltip_html; ?>
			</th>
			<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
				<input
					name="<?php echo esc_attr( $value['id'] ); ?>"
					id="<?php echo esc_attr( $value['id'] ); ?>"
					type="text"
					style="<?php echo esc_attr( $value['css'] ); ?>"
					class="<?php echo esc_attr( $value['class'] ); ?>"
					readonly
					value="<?php echo $upload_url['baseurl'] . '/cr/product_reviews.xml'; ?>"
					/>
			</td>
		</tr>
		<?php
	}

	/**
	 * Build single field map option from fields
	 *
	 * @since 3.47
	 *
	 * @return array
	 */
	public function sanitize_field_map( $value ) {
		if ( isset(
			$_POST['ivole_field_wc_target_gtin'],
			$_POST['ivole_field_wc_target_mpn'],
			$_POST['ivole_field_wc_target_sku'],
			$_POST['ivole_field_wc_target_brand']
		) ) {
			$value = array(
				'gtin'  => sanitize_key( $_POST['ivole_field_wc_target_gtin'] ),
				'mpn'   => sanitize_key( $_POST['ivole_field_wc_target_mpn'] ),
				'sku'   => sanitize_key( $_POST['ivole_field_wc_target_sku'] ),
				'brand' => sanitize_key( $_POST['ivole_field_wc_target_brand'] )
			);
		}

		return $value;
	}

	public function sanitize_feed_file_url( $value ) {
		if ( isset( $_POST['ivole_feed_file_url'] ) ) {
			$value = sanitize_key( $_POST['ivole_feed_file_url'] );
		}

		return $value;
	}

	/**
	 * Returns a list of mappable product attributes
	 *
	 * @since 3.47
	 *
	 * @access protected
	 *
	 * @return array
	 */
	protected function get_product_attributes() {
		global $wpdb;

		$product_attributes = array(
			'product_id'   => __( 'Product ID', IVOLE_TEXT_DOMAIN ),
			'product_sku'  => __( 'Product SKU', IVOLE_TEXT_DOMAIN ),
			'product_name' => __( 'Product Name', IVOLE_TEXT_DOMAIN )
		);

		$product_attributes = array_reduce( wc_get_attribute_taxonomies(), function( $attributes, $taxonomy ) {
			$key = 'attribute_' . $taxonomy->attribute_name;
			$attributes[$key] = ucfirst( $taxonomy->attribute_label );

			return $attributes;
		}, $product_attributes );

		$meta_attributes = $wpdb->get_results(
			"SELECT meta.meta_id, meta.meta_key, meta.meta_value
			FROM {$wpdb->postmeta} AS meta, {$wpdb->posts} AS posts
			WHERE meta.post_id = posts.ID AND posts.post_type LIKE '%product%' AND (
				meta.meta_key NOT LIKE '\_%'
				OR meta.meta_key LIKE '\_woosea%'
				OR meta.meta_key LIKE '\_wpm%'
				OR meta.meta_key LIKE '\_yoast%'
				OR meta.meta_key = '_product_attributes'
			)
			GROUP BY meta.post_id, meta.meta_key",
			ARRAY_A
		);

		if ( is_array( $meta_attributes ) ) {
			$product_attributes = array_reduce( $meta_attributes, function( $attributes, $meta_attribute ) {

				// If the meta entry is _product_attributes, then consider each attribute spearately
				if ( $meta_attribute['meta_key'] === '_product_attributes' ) {

					$attrs = maybe_unserialize( $meta_attribute['meta_value'] );
					if ( is_array( $attrs ) ) {

						foreach ( $attrs as $attr_key => $attr ) {
							$key = 'attribute_' . $attr_key;
							$attributes[$key] = ucfirst( $attr['name'] );
						}

					}

				} else {
					$key = 'meta_' . $meta_attribute['meta_key'];
					$attributes[$key] = ucfirst( str_replace( '_', ' ', $meta_attribute['meta_key'] ) );
				}

				return $attributes;
			}, $product_attributes );
		}

		return $product_attributes;
	}
}

endif;
