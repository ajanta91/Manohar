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


Redux::setSection('manohar_opt', array(
	'title'            => esc_html__( 'Call To Action', 'manohar' ),
	'id'               => 'call_to_action',
	'subsection'       => true,
	'icon'             => 'dashicons dashicons-phone',
	'fields'           => array(
		array(
			'title'     => esc_html__('Phone Number', 'manohar'),
			'subtitle'  => esc_html__( 'The empty field would not display anything', 'manohar' ),
			'id'        => 'call_to_phone',
			'type'      => 'text',
			'compiler'  => true,
			'default'   => esc_html__( '+8801723-664041', 'manohar' ) 
		),
		array(
			'title'     => esc_html__('Quote Button Label', 'manohar'),
			'subtitle'  => esc_html__( 'The empty field would not display anything', 'manohar' ),
			'id'        => 'quote_btn',
			'type'      => 'text',
			'compiler'  => true,
			'default'   => esc_html__( 'Send Quote', 'manohar' )
			
		),	
		array(
			'title'     => esc_html__('Send Quote Link', 'manohar'),
			'subtitle'  => esc_html__( 'Quote link here', 'manohar' ),
			'id'        => 'call_to_action_link',
			'type'      => 'text',
			'compiler'  => true,
			'placeholder'=> esc_html__( 'https://call-to-action-url.com', 'manohar' ),
			'default'   => ''
			
		)		
		
		
	)
) );