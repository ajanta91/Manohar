<?php

// Typography section
Redux::setSection('manohar_opt', array(
	'title'     => esc_html__('Typography', 'manohar'),
	'desc'     => esc_html__('Theme Typography Options', 'manohar'),
	'id'        => 'typography',
	'icon'      => 'dashicons dashicons-editor-textcolor',
	'fields'    => array(
		array(
			'id'            => 'body-typo',
			'type'          => 'typography',
			'title'         => esc_html__( 'Body Font', 'manohar' ),
			'subtitle'      => esc_html__( 'Specify the body font properties.', 'manohar' ),
			'line-height'   => false,
			'google'        => false,
			'text-align'    => false,
			'default'  => array(
				'font-family'   => '\'Hind\', sans-serif',
				'font-weight'   => '400',
				'color'         => '#505050',
				'font-size'     => '14px',
			),
			'output'  => 'body'
		),
		array(
			'id'       => 'heading-typo',
			'type'     => 'typography',
			'title'    => esc_html__( 'Heading font', 'manohar' ),
			'subtitle' => esc_html__( 'Specify the h1,h2,h3,h4,h5,h6 font properties.', 'manohar' ),
			'font-backup'   => false,
			'line-height'   => false,
			'text-align'    => false,
			'font-size'     => false,
			'google'        => false,
			'color'         => false,
			'default'  => array(
				'font-family'   => '\'Raleway\', sans-serif;',
				'font-weight'   => 'normal',
			),
			'output'    => 'h1,h2,h3,h4,h5,h6'
		),
		array(
			'id'          => 'page-title-bar-typo',
			'type'        => 'typography',
			'title'       => esc_html__( 'Page title bar', 'manohar' ),
			'subtitle'    => esc_html__( 'Typography options for page title bar', 'manohar' ),
			'compiler'      => true,
			'font-backup'   => false,
			'font-family'   => false,
			'google'        => false,
			'line-height'   => false,
			'text-align'    => false,
			'units'       => 'px',
			'default'     => array(
				'color'         => '#ffffff',
				'font-size'     => '30px',
				'font-weight'   => '800',
			),
			'output'    => '.page-banner h1'
		),
	)
));