<?php function asting_breadcrumbs_header(){
    if( ! ( class_exists( 'woocommerce' ) && is_woocommerce() ) ){
        if( get_post_meta(  asting_get_current_id() ,'asting_met_show_breadcrumbs', true ) != 'no' ){
            asting_breadcrumbs();
        }
    }else{
        $args = array(
            'delimiter' => '<span class="separator"></span>',
            'wrap_before' => '<div id="breadcrumbs" ><ul class="breadcrumb">',
            'wrap_after' => '</ul></div>',
            'before' => '<li>',
            'after' => '</li>',
            'home' => esc_html__( 'Home', 'asting' )
        );
         woocommerce_breadcrumb( $args );
    }
}



function asting_breadcrumbs() {
	$html = '<div id="breadcrumbs">';
	       
	        	$separator = '<li class="li_separator"><span class="separator"></span></li>';
		        $home = esc_html__('Home', 'asting');
		       

				$html .= '<ul class="breadcrumb">';
					global $post;
			        global $wp_query;
			        
			        $homeLink = esc_url( home_url('/') );
			        $type=get_post_type();

			        
			        $html .= '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $separator . ' ';	
			        
			        
			        if ( is_category() ) {
				        
				        $cat_obj = $wp_query->get_queried_object();
				        $thisCat = $cat_obj->term_id;
				        $thisCat = get_category($thisCat);
				        $parentCat = get_category($thisCat->parent);
				        if ($thisCat->parent != 0) $html .=  get_category_parents($parentCat, TRUE, ' ');
				        $html .= '<li>' . single_cat_title('', false) . '</li>';



			        } elseif ( is_day() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>' . $separator . ' ';
				        $html .= '<li>' . esc_html__('Archive by date', 'asting').' ' . get_the_time('d') . '</li>';

			        } elseif ( is_month() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= '<li>' . esc_html__('Archive by month', 'asting').' ' . get_the_time('F') . '</li>';

			        } elseif ( is_year() ) {

			        	$html .= '<li>' . esc_html__('Archive by year', 'asting').' ' . get_the_time('Y') . '</li>';

			        } elseif ( is_single() && !is_attachment() ) {

				        if ( get_post_type() != 'post' ) {
					        $post_type = get_post_type_object(get_post_type());
					        $slug = $post_type->rewrite;
					        $html .= '<li><a href="' . $homeLink .  $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>' . $separator . ' ';
					        $html .= '<li>' . get_the_title() . '</li>';
				        } else {
					        $cat = get_the_category(); $cat = $cat[0];
					        $html .= ' ' . get_category_parents($cat, TRUE, ' ' . $separator . ' ') . ' ';
					        $html .= '<li>' . get_the_title() . '</li>';
				        }
			        }elseif ( is_search()) {
			            $html .= '<li>' . esc_html__('Search results for', 'asting').' ' . get_search_query() . '</li>';
			        }elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

				        $post_type = get_post_type_object(get_post_type());

				        $html .= $post_type ? '<li>' . $post_type->labels->singular_name . '</li>' : '';

			        } elseif ( is_attachment() ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
				        $html .= '<li>' . get_the_title() . '</li>';

			        }elseif ( is_page() && !$post->post_parent ) {

			        	$html .= '<li>' . get_the_title() . '</li>';

			        } elseif ( is_page() && $post->post_parent ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
			        	$html .= '<li>' . get_the_title() . '</li>';

			        }elseif ( is_tag() ) {
			        	$html .= '<li>' . esc_html__('Archive by tag', 'asting').' ' . single_tag_title('', false) . '</li>';
			        } elseif ( is_author() ) {
			        global $author;
			        $userdata = get_userdata($author);
			        	$html .= '<li>' . esc_html__('Articles posted by', 'asting').' ' . $userdata->display_name . '</li>';
			        } elseif ( is_home() ){
			        	$html .= '<li>' . esc_html__('Blog', 'asting').'&nbsp;' . '</li>';
			        }elseif ( is_404() ) {
			        	$html .= '<li>' . esc_html__('Page not Found', 'asting') . '</li>';
			        }
			        if ( get_query_var('paged') ) {
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= ' ';
				        
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= '';
			        }
					$html .= '</ul>';
	      
	$html .= '</div>';

	$args = array(
	    'a' => array(
	        'href' => array(),
	        'title' => array()
	    ),
	    'div'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'ul'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'li'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'span'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'br' => array(),
	    'em' => array(),
	    'strong' => array(),
	);
	echo wp_kses( $html, $args );

}