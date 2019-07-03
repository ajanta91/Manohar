<?php
/**
 * @version  1.0
 * @package  Manohar
 *
 */
 
 
/**************************************
*Creating Download Button Widget
***************************************/

class Manohar_testimoial_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'manohar_testimoial',


        // Widget name will appear in UI
        esc_html__( '[ Manohar ] Testimonial', 'manohar' ),

        // Widget description
        array( 'description' => esc_html__( 'Add sidebar Testimonial.', 'manohar' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {

    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );
    $quote_auth = apply_filters( 'quote_auth', $instance['quote_auth'] );



    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
        echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        echo '<div class="sidebar_testimonial">';
        ?>
            <div class="single_testimonial">
                <p class="quote_text"> <?php echo esc_html( $desc ) ?> </p>
                <span class="quote_author">- <?php echo esc_html( $quote_auth ) ?></span>
            </div>

        <?php
        echo '</div>';
    echo wp_kses_post( $args['after_widget'] );
    }

    // Widget Backend
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Testimonials', 'manohar' );
        }

        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = '';
        }

        //	Text Area
        if ( isset( $instance[ 'quote_auth' ] ) ) {
            $quote_auth = $instance[ 'quote_auth' ];
        }else {
            $quote_auth = '';
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'manohar'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'manohar'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'quote_auth' ) ); ?>"><?php esc_html_e( 'Quote Author:' ,'manohar'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quote_auth' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quote_auth' ) ); ?>" type="text" value="<?php echo esc_attr( $quote_auth ); ?>" />
        </p>

    <?php
    }


    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['desc']       = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
        $instance['quote_auth'] = ( ! empty( $new_instance['quote_auth'] ) ) ? strip_tags( $new_instance['quote_auth'] ) : '';

        return $instance;

    }

} // Class Manohar_testimoial_widget ends here


// Register and load the widget
function manohar_testimoial_load_widget() {
	register_widget( 'Manohar_testimoial_widget' );
}
add_action( 'widgets_init', 'manohar_testimoial_load_widget' );