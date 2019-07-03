<?php
// OneClick Demo Importer Configuration
add_filter( 'pt-ocdi/import_files', function() {
    return array(
        array(
            'import_file_name'             => esc_html__('Manohar Demo', 'manohar'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/screenshot.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Yes! Important" button.', 'manohar' ),
            'preview_url'                  => 'http://www.manoharinternational.com/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/settings.json',
                    'option_name' => 'manohar_opt',
                ),
            ),
        ),
    );
});


add_action( 'pt-ocdi/after_import', function() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main_menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

});