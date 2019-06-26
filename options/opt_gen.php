<?php
Redux::setSection('manohar_opt', array(
    'title'            => esc_html__( 'General Settings', 'manohar' ),
    'id'               => 'opt_gen',
    'icon'             => 'dashicons dashicons-star-filled',
    'fields'           => array(
        array(
            'title'     => esc_html__('Pre-loader', 'manohar'),
            'id'        => 'is_preloader',
            'type'      => 'switch',
            'default'   => false,
            'on'        => esc_html__('Enabled', 'manohar'),
            'off'       => esc_html__('Disabled', 'manohar'),
        ),

	    array(
		    'id'       => 'opt-layout',
		    'type'     => 'image_select',
		    'title'    => __('Main Layout', 'manohar'),
		    'subtitle' => __('Select main content and sidebar alignment.', 'manohar'),
		    'options'  => array(
			    '1'      => array(
				    'alt'   => '1 Column',
				    'img'   => ReduxFramework::$_url.'assets/img/1col.png'
			    ),
			    '2'      => array(
				    'alt'   => '2 Column Left',
				    'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
			    ),
			    '3'      => array(
				    'alt'   => '2 Column Right',
				    'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
			    )
		    ),
		    'default' => '2'
	    )
    )
));