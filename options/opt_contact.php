<?php

// Map settings
Redux::setSection('manohar_opt', array(
    'title'     => esc_html__('Map settings', 'manohar'),
    'id'        => 'map_settings',
    'icon'      => 'dashicons dashicons-chart-area',
    'fields'    => array(
        array(
            'title'     => esc_html__('Map API key', 'manohar'),
            'subtitle'  => wp_kses_post(__('Enter her your Google map API key. Get it from <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">here</a>', 'manohar')),
            'id'        => 'map_api',
            'type'      => 'text',
        ),
        array(
            'title'     => esc_html__('Place name', 'manohar'),
            'id'        => 'place_name',
            'type'      => 'text',
            'default'   => esc_html__('Chaos', 'manohar'),
        ),
        array(
            'title'     => esc_html__('Map latitude key', 'manohar'),
            'subtitle'  => wp_kses_post(__('Get the latitude from <a href="https://www.latlong.net/">here</a>', 'manohar')),
            'id'        => 'latitude',
            'type'      => 'text',
            'default'   => esc_html__('42.008315', 'manohar')
        ),
        array(
            'title'     => esc_html__('Map Longitude key', 'manohar'),
            'subtitle'  => wp_kses_post(__('Get the Longitude from <a href="https://www.latlong.net/">here</a>', 'manohar')),
            'id'        => 'longitude',
            'type'      => 'text',
            'default'   => esc_html__('-88.163807', 'manohar')
        ),
        array(
            'title'     => esc_html__('Map zoom label', 'manohar'),
            'id'        => 'map_zoom',
            'type'      => 'slider',
            'default'       => 12,
            'min'           => 5,
            'step'          => 1,
            'max'           => 100,
            'display_value' => 'label',
        ),
        array(
            'title'     => esc_html__('Place marker icon', 'manohar'),
            'id'        => 'map_marker',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => MANOHAR_DIR_IMG.'/pin.png'
            )
        ),
    )
));