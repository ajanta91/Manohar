<?php

Redux::setSection('manohar_opt', array(
    'title'     => esc_html__('404 Error Page', 'manohar'),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-info',
    'fields'    => array(
        array(
            'title'     => esc_html__('Error Heading Text', 'manohar'),
            'id'        => 'error_heading',
            'type'      => 'text',
            'default'   => esc_html__("404", 'manohar')
        ),
        array(
            'title'     => esc_html__('Title', 'manohar'),
            'id'        => 'error_title',
            'type'      => 'text',
            'default'   => esc_html__("Looks Like you're Lost", 'manohar')
        ),
        array(
            'title'     => esc_html__('Subtitle', 'manohar'),
            'id'        => 'error_subtitle',
            'type'      => 'text',
            'default'   => esc_html__("We can't seem to find the page you're looking for", 'manohar')
        ),
        array(
            'title'     => esc_html__('Home button label', 'manohar'),
            'id'        => 'error_home_btn_label',
            'type'      => 'text',
            'default'   => esc_html__("Back to home", 'manohar')
        ),
    )
));
