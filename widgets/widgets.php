<?php

// Register Widget areas
add_action('widgets_init', function() {

    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'manohar'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'manohar'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>'
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Sidebar', 'manohar'),
        'description'   => esc_html__('Add widgets here for Footer sidebar area', 'manohar'),
        'id'            => 'footer_sidebar',
        'before_widget' => '<div class="col-sm-6 col-md-3"> <div class="widget widget-links %2$s">',
        'after_widget'  => '</div> </div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>'
    ));

});



require get_template_directory() . '/widgets/Manohar_newsletter_widget.php';
require get_template_directory() . '/widgets/Manohar_product_list.php';
require get_template_directory() . '/widgets/Manohar_download_btn.php';
require get_template_directory() . '/widgets/Manohar_testimonial.php';