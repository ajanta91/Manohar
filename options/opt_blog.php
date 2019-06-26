<?php

Redux::setSection('manohar_opt', array(
	'title'     => esc_html__('Blog Page', 'manohar'),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
	'fields'    => array(
		array(
			'title'     => esc_html__('Blog page title', 'manohar'),
			'subtitle'  => esc_html__('Give here the blog page title', 'manohar'),
			'desc'      => esc_html__('This text will show on the blog page banner', 'manohar'),
			'id'        => 'blog_title',
			'type'      => 'text',
			'default'   => esc_html__('Blog List', 'manohar')
		),
		array(
			'title'     => esc_html__('Blog page subtitle', 'manohar'),
			'id'        => 'blog_subtitle',
			'type'      => 'text',
		),
		array(
			'title'     => esc_html__('Title bar background', 'manohar'),
			'subtitle'  => esc_html__('Upload image file as Blog page title bar background', 'manohar'),
			'id'        => 'blog_header_bg',
			'type'      => 'media',
		),

	)
));


Redux::setSection('manohar_opt', array(
	'title'     => esc_html__('Blog archive', 'manohar'),
	'id'        => 'blog_meta_opt',
	'icon'      => 'dashicons dashicons-info',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__('Blog excerpt', 'manohar'),
            'subtitle'  => esc_html__('How much words you want to show in blog page.', 'manohar'),
            'id'        => 'blog_excerpt',
            'type'      => 'text',
            'default'   => '20'
        ),
        array(
            'title'     => esc_html__('Read more link label', 'manohar'),
            'id'        => 'blog_read_more',
            'type'      => 'text',
            'default'   => 'Read More'
        ),
		array(
			'title'     => esc_html__('Social share', 'manohar'),
			'id'        => 'is_social_share',
			'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'manohar'),
            'off'       => esc_html__('Disabled', 'manohar'),
            'default'   => '1'
		),
		array(
			'title'     => esc_html__('Post meta', 'manohar'),
			'subtitle'  => esc_html__('Show/hide post meta on blog archive page', 'manohar'),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1',
		),
		array(
			'title'     => esc_html__('Show/hide post author name', 'manohar'),
			'id'        => 'is_post_author',
			'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__('Post date', 'manohar'),
			'id'        => 'is_post_date',
			'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__('Post category', 'manohar'),
			'id'        => 'is_post_cat',
			'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
	)
));


Redux::setSection('manohar_opt', array(
	'title'     => esc_html__('Blog single', 'manohar'),
	'id'        => 'blog_single_opt',
	'icon'      => 'dashicons dashicons-info',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__('Social share', 'manohar'),
			'id'        => 'is_social_share',
			'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'manohar'),
            'off'       => esc_html__('Disabled', 'manohar'),
            'default'   => '1'
		),
		array(
			'title'     => esc_html__('Post tag', 'manohar'),
			'id'        => 'is_post_tag',
			'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => '1'
		),
        array(
            'title'     => esc_html__('Related posts ', 'manohar'),
            'id'        => 'is_related_posts',
            'type'      => 'switch',
            'on'        => esc_html__('Show', 'manohar'),
            'off'       => esc_html__('Hide', 'manohar'),
            'default'   => ''
        ),
        array(
            'title'     => esc_html__('Related posts section title', 'manohar'),
            'id'        => 'related_posts_title',
            'type'      => 'text',
            'default'   => esc_html__('Related Post', 'manohar'),
            'required'  => array('is_related_posts', '=', '1')
        ),
        array(
            'title'     => esc_html__('Show related posts count', 'manohar'),
            'id'        => 'related_posts_count',
            'type'      => 'slider',
            'default'       => 3,
            'min'           => 3,
            'step'          => 1,
            'max'           => 50,
            'display_value' => 'label',
            'required'  => array('is_related_posts', '=', '1')
        ),
	)
));
