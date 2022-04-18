<?php 
$general_css = '';


/* Primary Font */
$default_primary_font = json_decode( asting_default_primary_font() );
$primary_font = json_decode( get_theme_mod( 'primary_font' ) ) ? json_decode( get_theme_mod( 'primary_font' ) ) : $default_primary_font;
$primary_font_family = $primary_font->font;


/* General Typo */
$general_font_size = get_theme_mod( 'general_font_size', '18px' );
$general_line_height = get_theme_mod( 'general_line_height', '36px' );
$general_letter_space = get_theme_mod( 'general_letter_space', '0px' );
$general_color = get_theme_mod( 'general_color', '#88858e' );



/* Primary Color */
$primary_color = get_theme_mod( 'primary_color', '#ff6d12' );
$second_color = get_theme_mod( 'second_color', '#ff9d00' );



/* Second Font */
$default_second_font = json_decode( asting_default_second_font() );
$second_font = json_decode( get_theme_mod( 'second_font' ) ) ? json_decode( get_theme_mod( 'second_font' ) ) : $default_second_font;
$second_font_family = $second_font->font;


// Thrid Font
$default_thrid_font = json_decode( asting_default_thrid_font() );
$thrid_font = json_decode( get_theme_mod( 'thrid_font' ) ) ? json_decode( get_theme_mod( 'thrid_font' ) ) : $default_thrid_font;
$thrid_font_family = $thrid_font->font;


$general_css .= <<<CSS

body{
	font-family: {$primary_font_family};
	font-weight: 400;
	font-size: {$general_font_size};
	line-height: {$general_line_height};
	letter-spacing: {$general_letter_space};
	color: {$general_color};
}
p{
	color: inherit;
	line-height: {$general_line_height};
}

h1,h2,h3,h4,h5,h6, .nav_comment_text,
.sidebar .widget.widget_custom_html .ova_search form .search input,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .price,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers,
.woocommerce .ova-shop-wrap .content-area .onsale,
.woocommerce .ova-shop-wrap .content-area .woocommerce-result-count,
.woocommerce .ova-shop-wrap .content-area .woocommerce-ordering .select2-container--default .select2-selection--single .select2-selection__rendered,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li a .product-title,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li .woocommerce-Price-amount,
.woocommerce .ova-shop-wrap .content-area .product .summary .price,
.woocommerce .ova-shop-wrap .content-area .product .summary .stock,
.woocommerce .ova-shop-wrap .content-area .product .summary .cart .quantity input,
.woocommerce .ova-shop-wrap .content-area .product .summary .cart .single_add_to_cart_button,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .posted_in,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .tagged_as,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs ul.tabs li a,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #comments ol.commentlist li .comment_container .comment-text .meta,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-reply-title,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form label,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount .button,
.woocommerce .woocommerce-cart-form table.shop_table thead tr th,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.product-quantity input,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .coupon .button,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .button,
.woocommerce .cart-collaterals .cart_totals .shop_table th,
.woocommerce .cart-collaterals .cart_totals .shop_table td,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals ul#shipping_method li label,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-destination,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-calculator .shipping-calculator-button,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-calculator .button,
.woocommerce .cart-collaterals .cart_totals .checkout-button,
.woocommerce-checkout .woocommerce-billing-fields .form-row label,
.woocommerce-checkout table.shop_table td,
.woocommerce-checkout table.shop_table th,
.woocommerce-checkout .woocommerce-checkout-payment ul.wc_payment_methods li label,
.woocommerce-checkout #payment .place-order #place_order,
.woocommerce-checkout .woocommerce-additional-fields .form-row label,
.woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart table.variations tr td,
.woocommerce-checkout form.checkout_coupon .button,
.ova_toggle_custom_mistercar .elementor-toggle-item .elementor-tab-title a,
.mistercar_404_page .search-form input[type="submit"],
.ova_mistercar_counter.elementor-widget-counter .elementor-counter-number-wrapper,
.ova_mistercar_counter.elementor-widget-counter .elementor-counter-title,
.mistercar_form_mail_comming_soon .mailchimp_custom .ova_mcwp_mail input[type="email"],
.woocommerce #customer_login .woocommerce-form .form-row label,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_product_tag_cloud .tagcloud a
{
	font-family: {$primary_font_family};
}

.second_font{
	font-family: {$second_font_family};	
}
.thrid_font{
	font-family: {$thrid_font_family};	
}

a,
article.post-wrap .post-meta .post-meta-content .wp-author a:hover,
.sidebar .widget.recent-posts-widget-with-thumbnails ul li a .rpwwt-post-title:hover,
.sidebar .widget.widget_tag_cloud .tagcloud a:hover,
article.post-wrap .carousel .carousel-control-prev:hover i, 
article.post-wrap .carousel .carousel-control-next:hover i,
article.post-wrap .post-title h2.post-title a:hover,
.blog-grid article.post-wrap .post-footer .asting-post-readmore a:hover,
.default article.post-wrap .post-footer .socials-inner .share-social .share-social-icons li a:hover,
.single-post-asting article.post-wrap .ova-next-pre-post .pre .num-2 span,
.single-post-asting article.post-wrap .ova-next-pre-post .next .num-2 span,
.single-post-asting article.post-wrap .ova-next-pre-post .pre .num-2 a:hover,
.single-post-asting article.post-wrap .ova-next-pre-post .next .num-2 a:hover,
.single-post-asting article.post-wrap .ova-next-pre-post .pre .num-1 a:hover i,
.single-post-asting article.post-wrap .ova-next-pre-post .next .num-1 a:hover i,
.content_comments .comments .comment-respond small a,
.ova-search-page .page-title span,
.switch-lang .current-lang .lang-text:hover,
.switch-lang .current-lang .lang-text:hover:after,
.switch-lang .lang-dropdown .selecting-lang .lang-text:hover,
.elementor-widget-ova_header .wrap_ova_header .ova_header_el .ovatheme_breadcrumbs .breadcrumb a:hover,
.ova-contact-info.type2 .address .text_link a:hover,
.ova-contact-info.type2 .icon svg,
.ova-contact-info.type2 .icon i,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-reply-link:hover,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-edit-link:hover,
.ovatheme_header_default nav.navbar li a:hover,
.ova_wrap_search_popup i:hover,
.elementor-widget-ova_menu .ova_nav ul.menu > li > a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu > li.active > a,
.elementor-widget-ova_menu .ova_nav ul.menu > li.current-menu-parent > a,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li.active > a,
.ova-contact-info .address a:hover,
.ova_menu_page .menu li a:hover,
.ova_menu_page .menu li.active a,
.ova_menu_page .menu li.current_page_item a,
.ova-info-content .ova-email a:hover,
.ova-info-content .ova-phone a:hover,

.archive_team .ova-info-content .name:hover,
.asting_list_single_team .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-icon i,
.ova_team_single .ova_info .ova-info-content .ova-email a:hover,
.ova_team_single .ova_info .ova-info-content .ova-phone a:hover,
.asting_counter_team .elementor-counter .elementor-counter-number-wrapper .elementor-counter-number,
.ova-testimonial .slide-testimonials .client_info .icon-quote span::before,
.egov_editor_check svg,

article.post-wrap .post-media .ova-cat a:hover,
article.post-wrap .asting-post-readmore a,

.ova_icon_quote_blog i:before,
article.post-wrap .ova-cat-no-img a:hover,
.ova_button.type4,
.ova-heading .sub_title,
.wrap-portfolio .archive-por ul.list-cat-por li:hover a,
.wrap-portfolio .archive-por ul.list-cat-por li.active a,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre:hover .num-2 .title,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next:hover .num-2 .title,
.wrap-portfolio .single-por.type2 .wrap-content-por .content-info .info-por a:hover,
.ova_team_single .ova_info .content_info .ova-info-content .job,
.ova-info-content .job,
.archive_team .content .items .content_info .ova-media .ova-social ul li a:hover i,
.archive_team .content .items .content_info .ova-info-content .name:hover,
.ova_box_feature_1 .item:hover .icon i:before,
.ova_box_contact_1 .icon i,
.default article.post-wrap .post-title h2.post-title a:hover,
.default article.post-wrap .post-meta .post-meta-content .post-author .right a:hover,
.default article.post-wrap .post-meta .post-meta-content .comment .right a:hover,
.default article.post-wrap .post-footer .socials-inner .share-social .share-social-icons li a:hover,
.default article.post-wrap .post-meta .post-meta-content .post-author i ,
.default article.post-wrap .post-meta .post-meta-content .comment i,
article.post-wrap.type-grid .post-meta .post-meta-content .post-author i,
article.post-wrap.type-grid .post-meta .post-meta-content .comment i ,
article.post-wrap.type-grid .post-meta .post-meta-content .post-author a:hover,
article.post-wrap.type-grid .post-meta .post-meta-content .comment a:hover,
article.post-wrap .post-meta .post-meta-content .post-date .left i,
.sidebar .widget.recent-posts-widget-with-thumbnails .rpwwt-widget .rpwwt-post-comments-number:before ,
.single-post-asting article.post-wrap .post-meta .post-meta-content .post-author i,
.single-post-asting article.post-wrap .post-meta .post-meta-content .comment i,
.single-post-asting article.post-wrap .post-meta .post-meta-content .post-author .right a:hover,
.single-post-asting article.post-wrap .post-meta .post-meta-content .comment .right a:hover,
.single-post-asting article.post-wrap .post-tag .post-tags a:hover,
.content_comments .comments ul.commentlists li.comment .comment-details .ova_reply a:hover,
.archive_give_donation.content_related .summary .wrap_summary .give_detail .detail_body .title a:hover,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li a .product-title:hover,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_product_tag_cloud .tagcloud a:hover,
.woocommerce .star-rating span::before,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form .comment-form-rating .stars:hover a,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .posted_in a:hover ,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .tagged_as a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary .price .woocommerce-Price-amount,
.ovatheme_header_default nav.navbar .navbar-brand, .ovatheme_header_default nav.navbar .navbar-brand,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.product-remove a,
.ovatheme_breadcrumbs ul.breadcrumb li,
.ovatheme_breadcrumbs ul.breadcrumb a:hover,
.default h2.page-title span
{
	color: {$primary_color};
}


.wrap-portfolio .archive-por .content-por.grid-portfolio .ovapor-item .content-item .readmore a:hover,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre:hover .num-1 .icon,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next:hover .num-1 .icon,
.wrap-related-por .related-por .ovapor-item .content-item .readmore a:hover,
.default article.post-wrap .post-footer .asting-post-readmore a:hover,
article.post-wrap .post-footer .asting-post-readmore a:hover,
.sidebar .widget.widget_custom_html ,
.content_comments .comments ul.commentlists li.comment .comment-details .ova_reply a,
.content_comments .comments .comment-respond .comment-form p.form-submit #submit,
.archive_give_donation .summary .wrap_summary .give_detail .detail_body .progress .wrap_percentage_2,
.archive_give_donation .summary .wrap_summary .give_detail .detail_body .progress .wrap_percentage_1,
.project-percent,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount .button:hover,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .button, .woocommerce .ova-shop-wrap .content-area ul.products li.product a.added_to_cart,
.woocommerce .cart-collaterals .cart_totals .checkout-button,
.woocommerce-checkout #payment .place-order #place_order,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart .single_add_to_cart_button,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .button,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form .form-submit input,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .coupon .button,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers.current,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers:hover,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers:focus,
.woocommerce .woocommerce-message a.button,
.elementor-drop-cap,
.woocommerce-checkout form.checkout_coupon .button,
.asting_404_page .search-form input[type="submit"],
.page-content-none input[type="submit"]

{
	background-color: {$primary_color};
	border-color: {$primary_color};
}

article.post-wrap.type-grid .post-date,
.archive_give_donation .summary .wrap_summary .give_detail .image_future .post_cat a,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .button:hover, .woocommerce .ova-shop-wrap .content-area ul.products li.product a.added_to_cart:hover,
.woocommerce .cart-collaterals .cart_totals .checkout-button:hover,
.woocommerce-checkout #payment .place-order #place_order:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart .single_add_to_cart_button:hover,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .button:hover,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form .form-submit input:hover,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .coupon .button:hover,
.woocommerce .woocommerce-message a.button:hover
{
	background-color: {$second_color};
	border-color: {$second_color};
}

article.post-wrap.sticky{
	border-color: {$primary_color};
}

.woocommerce-message{
	border-top-color: {$primary_color};
}
.woocommerce-message::before{
	color: {$primary_color};
}


CSS;



return $general_css;


