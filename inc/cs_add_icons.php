<?php
/**
 * Add Custom Icons to Codestar FontAwesome icon set
 *
 * @return void.
 */


/**
 * Load Custom Icon Script in admin.
 * @return void
 */
add_action( 'admin_enqueue_scripts', function() {
    wp_enqueue_style('material-design-icons', MANOHAR_DIR_CSS.'/mdi.min.css');
});