<?php
// Creating the widget 
class ova_list_event_widget extends WP_Widget {

    function __construct() {

        $widget_ops = array(
            'classname'                   => 'widget_list_event',
            'description'                 => __( 'Get list upcomming event', 'ovaev' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'event_upcomming', __( 'Upcomming Event' ), $widget_ops );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $title = ! empty( $title ) ? $title : esc_html__( 'Upcoming Events', 'ovaev' );

        $hierarchical = ! empty( $instance['hierarchical'] ) ? '1' : '0';

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        $args_event = array(
            'post_type' => 'event',
            'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key' => 'ovaev_start_date_time',
                    'value' => current_time( 'timestamp' ),
                    'compare' => '>'
                )
            )
        );

        $list_event = get_posts( $args_event );
        $time = OVAEV_Settings::archive_event_format_time();

        if ($list_event) {
            ?>
            <div class="list-event">
            <?php
            foreach ( $list_event as $event ) {
                $id = $event->ID;
                $title = get_the_title( $id );


                $url_img = get_the_post_thumbnail_url( $id, 'post-thumbnail' );
                $link = get_the_permalink( $id );

                $ovaev_start_date = get_post_meta( $id, 'ovaev_start_date_time', true );
                $ovaev_end_date   = get_post_meta( $id, 'ovaev_end_date_time', true );

                $date_start    = $ovaev_start_date != '' ? date_i18n(get_option('date_format'), $ovaev_start_date) : '';
                $date_end      = $ovaev_end_date != '' ? date_i18n(get_option('date_format'), $ovaev_end_date) : '';

                $time_start = $ovaev_start_date != '' ? date_i18n( $time, $ovaev_start_date) : '';
                $time_end = $ovaev_end_date != '' ? date_i18n( $time, $ovaev_end_date) : '';

                ?>

                    <div class="item-event">
                       <div class="ova-thumb-nail">
                           <a href="<?php echo $link ?>" style="background-image:url(<?php echo esc_url( $url_img ) ?>)">
                           </a>
                       </div>
                       <div class="ova-content">
                           <h3 class="title">
                               <a href="<?php echo $link ?>">
                                   <?php echo $title ?>
                               </a>
                           </h3>
                           <?php if( $date_start == $date_end && $date_start != '' && $date_end != '' ){ ?>
                                <div class="time">
                                    <span class="date"><?php echo esc_html($date_start);?></span>
                                    <span class="bellow">@<?php echo esc_html($time_start); ?> - <?php echo esc_html($time_end); ?></span>
                                </div>
                               
                            <?php } elseif( $date_start != $date_end && $date_start != '' && $date_end != '' ){ ?>
                                <div class="time">
                                    <span class="date"><?php echo esc_html($date_start);?></span>
                                    <span class="bellow">@<?php echo esc_html($date_end);?></span>
                                </div>

                            <?php } ?>
                       </div>
                    </div>


                <?php                                   
            }
            ?>
            </div>
            <div class="button-all-event">
                <a href="<?php echo esc_url(get_post_type_archive_link( 'event' )); ?>">
                    <?php esc_html_e( 'View All Events', 'ovaev' ) ?>
                    <i class="arrow_carrot-right"></i>
                </a>
            </div>
            <?php
        }

        echo $args['after_widget'];

    }

    public function form( $instance ) {
       
        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>


        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

} 

function ovaev_list_event_load_widget() {
    register_widget( 'ova_list_event_widget' );
}

add_action( 'widgets_init', 'ovaev_list_event_load_widget' );