<?php

class ovaframework_hooks {

	public function __construct() {
		
		
		
		// Share Social in Single Post
		add_filter( 'ova_share_social', array( $this, 'asting_content_social' ), 2, 10 );

		// Allow add font class to title of widget
		add_filter( 'widget_title', array( $this, 'ova_html_widget_title' ) );
		

		add_filter( 'widget_text', 'do_shortcode' );

		add_filter( 'upload_mimes', array( $this, 'ova_upload_mimes' ), 1, 10);

		/* Filter Animation Elementor */
       add_filter( 'elementor/controls/animations/additional_animations', array( $this, 'ova_add_animations'), 10 , 0 );


       
       	add_filter( 'asting_progress_stats', array( $this, 'asting_progress_stats' ), 10, 1 );

       	add_filter( 'asting_count_donor', array( $this, 'asting_count_donor' ) );

    }

    

	public function asting_content_social( $link, $title ) {
 		$html = '<ul class="share-social-icons clearfix">
			
			<li><a class="share-ico ico-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.$link.'"><i class="fa fa-facebook"></i></a></li>
			
			<li><a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url='.$link.'&amp;text='.urlencode($title).'&amp;hashtags=simplesharebuttons"><i class="fab fa-twitter"></i></a></li>
			
			<li><a class="share-ico ico-tumblr" target="_blank" href="http://www.tumblr.com/share/link?url='.$link.'&amp;title='.$title.'"><i class="fab fa-tumblr"></i></a></li>                                 
			
			
		</ul>';
		return $html;
 	}

 	public function ova_upload_mimes($mimes){
 		$mimes['zip'] = 'application/zip';
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}


	// Filter class in widget title
	public function ova_html_widget_title( $title ) {
		$title = str_replace( '{{', '<i class="', $title );
		$title = str_replace( '}}', '"></i>', $title );
		return $title;
	}

	public function ova_add_animations(){
        $animations = array(
            'OvaTheme' => array(
                'ova-move-up' 		=> esc_html__('Move Up', 'ova-framework'),
                'ova-move-down' 	=> esc_html__( 'Move Down', 'ova-framework' ),
                'ova-move-left'     => esc_html__('Move Left', 'ova-framework'),
                'ova-move-right'    => esc_html__('Move Right', 'ova-framework'),
                'ova-scale-up'      => esc_html__('Scale Up', 'ova-framework'),
                'ova-flip'          => esc_html__('Flip', 'ova-framework'),
                'ova-helix'         => esc_html__('Helix', 'ova-framework'),
                'ova-popup'			=> esc_html__( 'PopUp','ova-framework' )
            ),
        );

        return $animations;
    }

    	function asting_progress_stats( $id = '' ){
		$form = new Give_Donate_Form( $id );
		if (function_exists('give_goal_progress_stats')) {
			$donation_progress_stats = give_goal_progress_stats( $form );
		}
		$goal_format = get_post_meta( $id, '_give_goal_format', true );

		if (function_exists('give_human_format_large_amount') && function_exists('give_format_amount') ) {
			$get_income = give_human_format_large_amount( give_format_amount( $donation_progress_stats['raw_actual'], array() ), array() );
			$get_goal   = give_human_format_large_amount( give_format_amount( $donation_progress_stats['raw_goal'], array() ), array() );
		}

		if (function_exists('give_currency_filter')) {
			$convert_income = give_currency_filter( $get_income, array( 'form_id' => $id ) );
			$conver_goal = give_currency_filter( $get_goal, array( 'form_id' => $id ) );
		}

		if ($goal_format == 'amount' || $goal_format == 'percentage') {
			$result['actual'] = $convert_income;
			$result['goal'] = $conver_goal;
			$result['progress'] = $donation_progress_stats['progress'];
		} else {
			$result['actual'] = $donation_progress_stats['actual'];
			$result['goal'] = $donation_progress_stats['goal'];
			$result['progress'] = $donation_progress_stats['progress'];
		}
		return $result;
	}

    	function asting_count_donor( $id = '' ){
		$form = new Give_Donate_Form( $id );
		return apply_filters( 'give_goal_donations_raised_output', $form->sales, $id, $form );
	}

}

new ovaframework_hooks();

