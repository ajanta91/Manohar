<?php


// Title-bar
Redux::setSection('manohar_opt', array(
	'title'            => esc_html__( 'Slider', 'manohar' ),
	'id'               => 'slider_opt',
	'icon'             => 'dashicons dashicons-format-gallery',
	'fields'           => array(

		array(
			'id'          => 'opt-slides',
			'type'        => 'slides',
			'title'       => __('Slides Options', 'manohar'),
			'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'manohar'),
			'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'manohar'),
			'placeholder' => array(
				'title'           => __('This is a title', 'manohar'),
				'description'     => __('Description Here', 'manohar'),
				'url'             => __('Give us a link!', 'manohar'),
			),
		),


	)
));

