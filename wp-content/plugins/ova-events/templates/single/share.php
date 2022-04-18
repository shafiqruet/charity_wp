<?php if ( !defined( 'ABSPATH' ) ) exit();

if( has_filter( 'ova_share_social' ) ){ ?>
    <div class="share_social">
    	<span class="ova_label second_font">
    		<?php esc_html_e('Share Article ', 'ovaev'); ?>
    	</span>
    	<?php echo apply_filters('ova_share_social', get_the_permalink(), get_the_title() ); ?>
    </div>
<?php } ?>