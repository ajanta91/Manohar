<?php

// Footer settings
Redux::setSection('manohar_opt', array(
    'title'     => esc_html__('Slug Re-write', 'manohar'),
    'id'        => 'manohar_cp_slugs',
    'icon'      => 'dashicons dashicons-admin-links',
    'fields'    => array(
        array(
            'title'     => esc_html__('Service Slug', 'manohar'),
            'subtitle'  => esc_html__('Save the Permalinks Settings From Settings > Permalinks after changing the slug value.', 'manohar'),
            'id'        => 'service_slug',
            'type'      => 'text',
            'default'   => 'service'
        ),
        array(
            'title'     => esc_html__('Portfolio Slug', 'manohar'),
            'subtitle'  => esc_html__('Save the Permalinks Settings From Settings > Permalinks after changing the slug value.', 'manohar'),
            'id'        => 'portfolio_slug',
            'type'      => 'text',
            'default'   => 'portfolio'
        ),
        array(
            'title'     => esc_html__('Team Slug', 'manohar'),
            'subtitle'  => esc_html__('Save the Permalinks Settings From Settings > Permalinks after changing the slug value.', 'manohar'),
            'id'        => 'team_slug',
            'type'      => 'text',
            'default'   => 'team'
        ),
    )
));