<?php

// Header Section
Redux::setSection('manohar_opt', array(
	'title'            => esc_html__( 'Header Settings', 'manohar' ),
	'id'               => 'header_sec',
	'customizer_width' => '400px',
	'icon'             => 'el el-home'
) );


Redux::setSection('manohar_opt', array(
	'title'            => esc_html__( 'Logo', 'manohar' ),
	'id'               => 'logo_opt',
	'subsection'       => true,
	'icon'             => 'dashicons dashicons-schedule',
	'fields'           => array(
		array(
			'title'     => esc_html__('Upload logo', 'manohar'),
			'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'manohar' ),
			'id'        => 'main_logo',
			'type'      => 'media',
			'compiler'  => true,
			'default'  => array(
				'url'   => MANOHAR_DIR_IMG.'/logo-white.png'
			)
		),
		array(
			'title'     => esc_html__('Sticky header logo', 'manohar'),
			'id'        => 'sticky_logo',
			'type'      => 'media',
			'compiler'  => true,
			'default'   => array(
				'url'   => MANOHAR_DIR_IMG.'/logo-dark.png'
			)
		),
		array(
			'title'     => esc_html__('Retina logo', 'manohar'),
			'subtitle'  => esc_html__( 'The retina logo will visible on only retina display and the logo would be 2x of your original logo.', 'manohar' ),
			'id'        => 'retina_logo',
			'type'      => 'media',
			'compiler'  => true,
			'default'   => array(
				'url'   => MANOHAR_DIR_IMG.'/logo-white@2x.png'
			)
		),
		array(
			'title'     => esc_html__('Retina sticky logo', 'manohar'),
			'subtitle'  => esc_html__( 'The retina logo will visible on only retina display and the logo would be 2x of your original logo.', 'manohar' ),
			'id'        => 'sticky_retina_logo',
			'type'      => 'media',
			'compiler'  => true,
			'default'   => array(
				'url'   => MANOHAR_DIR_IMG.'/logo-dark@2x.png'
			)
		),
		array(
			'title'     => esc_html__('Padding', 'manohar'),
			'subtitle'  => esc_html__('Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'manohar'),
			'id'        => 'logo_padding',
			'type'      => 'spacing',
			'output'    => array( '.navbar-brand' ),
			'mode'      => 'padding',
			'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
			'default'   => array(
				'padding-top'    => '0px',
				'padding-right'  => '0px',
				'padding-bottom' => '0px',
				'padding-left'   => '0px'
			)
		),
	)
) );
