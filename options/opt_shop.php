<?php
// Shop page
Redux::setSection('manohar_opt', array(
    'title'            => esc_html__( 'Product Settings', 'manohar' ),
    'id'               => 'shop_opt',
    'icon'             => 'dashicons dashicons-cart',
    'fields'           => array(
        array(
            'title'     => esc_html__('Page title', 'manohar'),
            'subtitle'  => esc_html__('Give here the shop page title', 'manohar'),
            'desc'      => esc_html__('This text will show on the shop page banner', 'manohar'),
            'id'        => 'shop_title',
            'type'      => 'text',
            'default'   => esc_html__('Product Page', 'manohar'),
        ),
        array(
            'title'     => esc_html__('Shop page subtitle', 'manohar'),
            'id'        => 'shop_subtitle',
            'type'      => 'text',
            'default'   => esc_html__('With right sidebar', 'manohar')
        ),
        array(
            'title'     => esc_html__('Title bar background', 'manohar'),
            'subtitle'  => esc_html__('Upload image file as Shop page title bar background', 'manohar'),
            'id'        => 'shop_header_bg',
            'type'      => 'media',
        ),
        array(
            'title'     => esc_html__('Layout', 'manohar'),
            'subtitle'  => esc_html__('Select the product view layout', 'manohar'),
            'id'        => 'shop_layout',
            'type'      => 'image_select',
            'options'   => array(
                'shop_list' => array(
                    'alt' => esc_html__('List Layout', 'manohar'),
                    'img' => MANOHAR_DIR_IMG.'/layouts/list.jpg'
                ),
                'shop_grid' => array(
                    'alt' => esc_html__('Grid Layout', 'manohar'),
                    'img' => MANOHAR_DIR_IMG.'/layouts/grid.jpg'
                ),
            ),
            'default' => 'shop_grid'
        ),
        array(
            'title'     => esc_html__('Sidebar', 'manohar'),
            'subtitle'  => esc_html__('Select the sidebar position of Shop page', 'manohar'),
            'id'        => 'shop_sidebar',
            'type'      => 'image_select',
            'options'   => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'manohar'),
                    'img' => MANOHAR_DIR_IMG.'/layouts/sidebar_left.jpg'
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'manohar'),
                    'img' => MANOHAR_DIR_IMG.'/layouts/sidebar_right.jpg',
                ),
            ),
            'default' => 'left'
        ),
        array(
            'title'     => esc_html__('Product Light-box', 'manohar'),
            'id'        => 'is_product_lightbox',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'manohar'),
            'off'       => esc_html__('Disabled', 'manohar'),
            'default'   => '1'
        ),
    ),
));