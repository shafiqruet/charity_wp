<?php
// Creating the widget 
class asting_list_give_widget extends WP_Widget {

    function __construct() {

        $widget_ops = array(
            'classname'                   => 'widget_list_give',
            'description'                 => esc_html__( 'Get list give', 'ova-framework' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'give_recent', esc_html__( 'List Give', 'ova-framework' ), $widget_ops );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $title = ! empty( $title ) ? $title : esc_html__( 'Urgent Causes', 'ova-framework' );

        $hierarchical = ! empty( $instance['hierarchical'] ) ? '1' : '0';

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        $args_event = array(
            'post_type' => 'give_forms',
            'posts_per_page' => 3,
            'orderby' => 'ID',
            'order'   => 'DESC'
        );

        $list_event = get_posts( $args_event );

        if ($list_event) {
            ?>
            <div class="list-give">
            <?php
            foreach ( $list_event as $event ) {
                $id = $event->ID;
                $title = get_the_title( $id );
                $url_img = get_the_post_thumbnail_url( $id, 'post-thumbnail' );
                $link = get_the_permalink( $id );
                $show_goal = give_get_meta( $id, '_give_goal_option', true );
                $asting_progress_stats = apply_filters( 'asting_progress_stats', $id );

                              

                ?>

                    <div class="item-event">
                    <div class="ova-thumb-nail">
                           <a href="<?php echo $link ?>" style="background-image:url(<?php echo esc_url( $url_img ) ?>)">
                           </a>
                       </div>
                       <div class="ova-content">
                           <h3 class="title">
                               <a  href="<?php echo $link ?>">
                                   <?php echo $title ?>
                               </a>
                           </h3>
                                <div class="raised">
                                            <div class="income">
                                                <span class=" rain"><?php esc_html_e( 'Raised', 'ova-framework' ); ?></span>
                                                <span><?php echo esc_html( $asting_progress_stats['actual'] ); ?></span>
                                            </div>

                                            <span class="ingo"><?php esc_html_e( '/', 'ova-framework' ); ?></span>

                                            <?php if ($show_goal != 'disabled') { ?>
                                                <div class="goal">
                                                    <span><?php echo esc_html( $asting_progress_stats['goal'] ); ?></span>
                                                </div>
                                            <?php } ?>
                                        </div>


                                        <div class="donate_remaining">
                                            <a href="<?php the_permalink($id); ?>" class="donate"><?php esc_html_e( 'Donate Now', 'ova-framework' ); ?></a>

                                        </div>

                       </div>
                    </div>


                <?php                                   
            }
            ?>
            </div>
            <?php
        }

        echo $args['after_widget'];

    }

    public function form( $instance ) {
       
        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'ova-framework' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>


        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

} 

function asting_list_give_load_widget() {
    register_widget( 'asting_list_give_widget' );
}
if( class_exists('Give') ){
add_action( 'widgets_init', 'asting_list_give_load_widget' );    
}
