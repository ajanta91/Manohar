<?php
/**
 * @version  1.0
 * @package  Manohar
 *
 */


/**************************************
 *Creating Newsletter Widget
 ***************************************/

class Manohar_product_list_widget extends WP_Widget {


	function __construct() {

		parent::__construct(
		// Base ID of your widget
			'manohar_product_list',


			// Widget name will appear in UI
			esc_html__( '[ Manohar ] Product Dropdown', 'manohar' ),

			// Widget description
			array( 'description' => esc_html__( 'Add Product dropdown.', 'manohar' ), )
		);

	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		$title 		= apply_filters( 'widget_title', $instance['title'] );




		// before and after widget arguments are defined by themes
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $title ) )
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );




		$terms = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
			)
		);

// Check if any term exists

		if ( ! empty( $terms ) && is_array( $terms ) ) { ?>

            <div id="accordion">
                <?php
                $a = 0;
			    foreach ( $terms as $term ) {
			        $aa = $a++;

				    ?>
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $aa; ?>">
                            <h5 class="mb-0">
                                <span class="cat_list" data-toggle="collapse" data-target="#collapse<?php echo $aa; ?>"
                                        aria-expanded="true" aria-controls="collapse<?php echo $aa; ?>">
	                                <?php echo $term->name; ?>
                                </span>
                            </h5>
                        </div>

                        <div id="collapse<?php echo $aa; ?>" class="collapse" aria-labelledby="heading<?php echo $aa; ?>"
                             data-parent="#accordion">
                            <div class="card-body">
                                <ul class="cat_title_list">
		                            <?php
		                            $posts_array = get_posts(
			                            array(
				                            'posts_per_page' => -1,
				                            'post_type' => 'product',
				                            'tax_query' => array(
					                            array(
						                            'taxonomy' => 'product_cat',
						                            'field' => 'term_id',
						                            'terms' => $term->term_id,
					                            )
				                            )
			                            )
		                            );

		                            foreach ( $posts_array as $product_title ){


			                            echo '<li>';
			                            echo '<a href="'.esc_url( $product_title->guid ).'">'. $product_title->post_title.'</a>';
			                            echo '</li>';

		                            }


		                            ?>
                                </ul>
                            </div>
                        </div>
                    </div>
				    <?php
			    }?>
            </div>


			<?php
		}

		?>





		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	// Widget Backend
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = esc_html__( 'Product Dropdown', 'manohar' );
		}





		// Widget admin form
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'manohar'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>



		<?php
	}


	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}

} // Class Manohar_product_list_widget ends here


// Register and load the widget
function manohar_product_dropdown_widget() {
	register_widget( 'Manohar_product_list_widget' );
}
add_action( 'widgets_init', 'manohar_product_dropdown_widget' );