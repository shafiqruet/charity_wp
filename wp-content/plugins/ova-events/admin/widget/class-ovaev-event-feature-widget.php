<?php
// Creating the widget 
class ova_event_feature_widget extends WP_Widget {

    function __construct() {

        $widget_ops = array(
            'classname'                   => 'widget_feature_event',
            'description'                 => esc_html__( 'Get feature event', 'ovaev' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'event_feature', esc_html__( 'Feature Event', 'ovaev' ), $widget_ops );
    }

    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        $title = ! empty( $title ) ? $title : esc_html__( 'Featured Event', 'ovaev' );

        $count = isset( $instance['count'] ) ? $instance['count'] : 5;

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $id_event = get_the_ID();

        $args_event = array(
            'post_type' => 'event',
            'posts_per_page' => $count,
            'meta_query' => array(
                array(
                    'key'     => 'ovaev_special',
                    'value'   => 'checked',
                    'compare' => '=',
                ),
            ),
        );

        $events = get_posts( $args_event );

        echo ovaev_get_template( 'widgets/feature_event.php', array( 'events' => $events ) );

        echo $args['after_widget'];

    }

    public function form( $instance ) {
       
        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        ?>
        <p>
            <label>
                <?php esc_html_e( 'Title:', 'ovaev' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <p>
            <label>
                <?php esc_html_e( 'Count:', 'ovaev' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $instance['count'] ); ?>" />
        </p>


        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );
        $instance['count']        = sanitize_text_field( $new_instance['count'] );

        return $instance;
    }

} 

function ovaev_event_feature_load_widget() {
    register_widget( 'ova_event_feature_widget' );
}

add_action( 'widgets_init', 'ovaev_event_feature_load_widget' );