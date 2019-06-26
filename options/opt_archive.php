<?php

Redux::setSection('manohar_opt', array(
    'title'            => esc_html__( 'Portfolio archive', 'manohar' ),
    'id'               => 'portfolio_archive_opt',
    'icon'             => 'dashicons dashicons-portfolio',
    'fields'           => array(
        array(
            'title'     => esc_html__('Custom archive page', 'manohar'),
            'id'        => 'is_portfolio_custom_archive',
            'type'      => 'switch',
            'on'        => esc_html__('Yes', 'manohar'),
            'off'       => esc_html__('No', 'manohar')
        ),
        array(
            'title'     => esc_html__('Custom archive page URL', 'manohar'),
            'subtitle'  => esc_html__('Enter here your custom portfolio archive page URL. You can create this archive page with the Portfolio shortcode.', 'manohar'),
            'id'        => 'portfolio_custom_archive_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array('is_portfolio_custom_archive', '=', '1')
        ),
    ),
));