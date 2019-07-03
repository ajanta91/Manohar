<?php

// Footer settings
Redux::setSection('manohar_opt', array(
	'title'     => esc_html__('Footer Settings', 'manohar'),
	'id'        => 'manohar_footer',
	'icon'      => 'dashicons dashicons-download',
	'fields'    => array(
		array(
			'title'     => esc_html__('Copyright text', 'manohar'),
			'subtitle'  => esc_html__('Footer Copyright text', 'manohar'),
			'id'        => 'copyright_txt',
			'type'      => 'editor',
			'default'   => wp_kses_post(__('© 2019 <a href="http://www.manoharinternational.com/">Manohar</a>. All rights reserved', 'manohar')),
			'args'    => array(
				'wpautop'       => true,
				'media_buttons' => false,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => false,
			)
		),
        array(
            'title'     => esc_html__('Footer logo', 'manohar'),
            'id'        => 'footer_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url' => MANOHAR_DIR_IMG.'/logo-b.png'
            )
        ),
        array(
            'title'     => esc_html__('Footer logo URL', 'manohar'),
            'id'        => 'footer_logo_url',
            'type'      => 'text',
            'default'  =>  esc_url(home_url('/'))
        ),
	)
));