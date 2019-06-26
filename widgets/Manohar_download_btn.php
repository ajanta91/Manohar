<?php
/**
 * @version  1.0
 * @package  Manohar
 *
 */
 
 
/**************************************
*Creating Download Button Widget
***************************************/

class manohar_download_btn_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'manohar_download_btn',


        // Widget name will appear in UI
        esc_html__( '[ Manohar ] Download PDF Button', 'manohar' ),

        // Widget description
        array( 'description' => esc_html__( 'Add sidebar PDF download button.', 'manohar' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {

    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );



    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );

    echo '<a class="download_brochure" href="'. esc_url( $desc ) .'" target="_blank" rel="noopener">'. esc_html( $title ) .'</a>';

    echo wp_kses_post( $args['after_widget'] );
    }

    // Widget Backend
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Download Button', 'manohar' );
        }



        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = '';
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

    <?php
    }


    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;

    }

} // Class manohar_download_btn_widget ends here


// Register and load the widget
function manohar_download_btn_load_widget() {
	register_widget( 'manohar_download_btn_widget' );
}
add_action( 'widgets_init', 'manohar_download_btn_load_widget' );