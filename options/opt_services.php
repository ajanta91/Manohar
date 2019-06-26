<?php

Redux::setSection('manohar_opt', array(
    'title'     => esc_html__('Service single page', 'manohar'),
    'id'        => 'service_opt',
    'icon'      => 'dashicons dashicons-format-aside',
    'fields'    => array(
        array(
            'title'     => esc_html__('Show/hide related services', 'manohar'),
            'id'        => 'is_related_services',
            'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1'
        ),
        array(
            'title'     => esc_html__('Related service title', 'manohar'),
            'subtitle'  => esc_html__('Enter here the related service section title.', 'manohar'),
            'id'        => 'related_service_title',
            'type'      => 'text',
            'default'   => esc_html__('Related services you may know', 'manohar'),
            'required'  => array('is_related_services', '=', '1')
        ),
        array(
            'title'     => esc_html__('Related service subtitle', 'manohar'),
            'subtitle'  => esc_html__('Enter here the related service section subtitle.', 'manohar'),
            'id'        => 'related_service_subtitle',
            'type'      => 'text',
            'default'   => esc_html__('YOU MAY ALSO SEE', 'manohar'),
            'required'  => array('is_related_services', '=', '1')
        ),
        array(
            'title'     => esc_html__('Show related services count', 'manohar'),
            'id'        => 'related_services_count',
            'type'      => 'slider',
            'default'   => 3,
            'min'       => 3,
            'step'      => 1,
            'max'       => 50,
            'display_value' => 'label',
            'required'      => array('is_related_services', '=', '1')
        ),
        array(
            'title'     => esc_html__('Show related services count', 'manohar'),
            'id'        => 'related_services_count',
            'type'      => 'slider',
            'default'       => 3,
            'min'           => 3,
            'step'          => 1,
            'max'           => 30,
            'display_value' => 'label',
            'required'      => array('is_related_services', '=', '1')
        ),
    )
));