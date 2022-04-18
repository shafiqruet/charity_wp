<?php
/*
 * Remove title archive shop page
 */

add_filter( 'woocommerce_show_page_title', 'asting_woocommerce_hide_title_shop_page' );
function asting_woocommerce_hide_title_shop_page( $param ){
	return false;
}


/*
 * Add div ova-shop-wrap
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', function(){
	?>
	<div class="ova-shop-wrap">
	<?php
	wc_get_template( 'global/wrapper-start.php' );
}, 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'woocommerce_sidebar', function(){
	wc_get_template( 'global/sidebar.php' );
	?>
	</div>
	<?php
}, 10);

/*
 * Remove breadcrum woo
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


/*
 * Pagination change next, pre text
 */

function asting_woocommerce_pagination_args( $array ) { 
    $array_next_pre = array(
        'prev_text' => '<i data-feather="chevron-left"></i>' . esc_html__( 'Previous', 'asting' ), 
        'next_text' => esc_html__( 'Next', 'asting' ) . '<i data-feather="chevron-right"></i>', 
    );

    $agrs = array_merge( $array, $array_next_pre );

    return $agrs; 
}; 
add_filter( 'woocommerce_pagination_args', 'asting_woocommerce_pagination_args' );

/* Change number product related */
add_filter( 'woocommerce_output_related_products_args', 'asting_change_number_product_related' );
function asting_change_number_product_related( $agrs ){
	$agrs_setting = [
		'posts_per_page' => 3,
		'columns'        => 3,
	];
	$agrs = array_merge( $agrs, $agrs_setting );
	return $agrs;
}

/* add data prettyPhoto in gallery */
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'asting_single_product_image_thumbnail_html', 10, 2 );
function asting_single_product_image_thumbnail_html( $html, $attachment_id ){
	
	if ( $attachment_id ) {

		$img_url_thumbnail = wp_get_attachment_image_url ($attachment_id,'large' );
		$img_url = wp_get_attachment_image_url ($attachment_id,'large' );

		$image_title 	= esc_attr( get_the_title( $attachment_id ) );

		$html = '<a href="'.esc_url( $img_url ).'" class="woocommerce-product-gallery__image" data-fancybox="product_gallery"><img src="'.esc_url( $img_url_thumbnail ).'" alt="'.esc_attr( $image_title ).'"></a>';

	} else {

		$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image"  />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'asting' ) );
			$html .= '</div>';
	}
	return $html;

} 

add_action( 'woocommerce_login_form', function(){
	?>
	<p class="form-row woocommerce-form-row rememberme_lost_password">
		<span class="rememberme-asting">
				<label class="second_font woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'asting' ); ?></span>
			</label>
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		</span>
		<span class="lost_password_asting woocommerce-LostPassword lost_password">
			<a class="second_font" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'asting' ); ?></a>
		</span>
		
	</p>

	<p class="form-row woocommerce-form-row">
		<button type="submit" class="second_font woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'asting' ); ?>"><?php esc_html_e( 'Log in', 'asting' ); ?></button>
	</p>
	
	<?php
	
}, 5 );

add_action( 'woocommerce_before_customer_login_form', function(){
	?>
	<ul class="asting-login-register-woo">
		<li class="active">
			<a href="javascript:void(0)" class="second_font" data-type="login">
				<?php esc_html_e( 'Login', 'asting' ); ?>
			</a>
		</li>
		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
		<li>
			<a href="javascript:void(0)" class="second_font"  data-type="register">
				<?php esc_html_e( 'Register', 'asting' ); ?>
			</a>
		</li>
		<?php endif ?>
	</ul>
	<?php
}, 100 );



// Insert category to loop product
add_action( 'woocommerce_shop_loop_item_title', 'asting_woocommerce_template_loop_product_cat', 5 );
function asting_woocommerce_template_loop_product_cat(){

	$id = get_the_id();

	$cats  = get_the_terms( $id, 'product_cat') ? get_the_terms( $id, 'product_cat') : '' ;

	$cat_array = array();
	if ( $cats != '' ) {
		foreach ( $cats as $value ) {
			$value_cats[] = $value->term_id ? '<span class="cat_product">' . $value->name . '</span>' : "";


		}
	}
	echo implode('', $value_cats); 
	
}

$show_title = get_theme_mod( 'show_hide_title_woo', 'yes' ); 
if( $show_title != 'yes' ){ 

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

}
