<?php

function manohar_scripts() {
	$opt = get_option('manohar_opt');
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function manohar_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = '';

        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', "Lato font: on or off", 'manohar' ) ) {
            $fonts[] = "Lato:300,400,700,900";
        }
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', "Poppins font: on or off", 'manohar' ) ) {
            $fonts[] = "Poppins:100,300,400,500,600,700";
        }
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', "Open Sans font: on or off", 'manohar' ) ) {
            $fonts[] = "Open Sans:400,500,600,700";
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

    wp_enqueue_style('manohar-fonts',  manohar_fonts_url());
    wp_enqueue_style('bootstrap', MANOHAR_DIR_CSS.'/bootstrap.min.css');
    wp_enqueue_style('elegant-icons', MANOHAR_DIR_VEND.'/elegant/style.css');
    wp_enqueue_style('material-design-icons', MANOHAR_DIR_CSS.'/mdi.min.css');
    wp_enqueue_style('fontawesome', MANOHAR_DIR_CSS.'/font-awesome.min.css');
    wp_register_style('slick', MANOHAR_DIR_CSS.'/slick.min.css');
    wp_register_style('slicknav', MANOHAR_DIR_CSS.'/slicknav.min.css');
    wp_enqueue_style('animate', MANOHAR_DIR_CSS.'/animate.css');
    wp_register_style('flexslider', MANOHAR_DIR_VEND.'/flexslider/flexslider.css');

    wp_enqueue_style('manohar-wpd', MANOHAR_DIR_CSS.'/wpd-style.css');
    if(is_rtl()) {
        wp_enqueue_style('bootstrap-rtl',  MANOHAR_DIR_CSS.'/bootstrap-rtl.css');
    }
    wp_enqueue_style('manohar-main', MANOHAR_DIR_CSS.'/style.css');
    wp_enqueue_style('manohar-responsive', MANOHAR_DIR_CSS . '/responsive.css');
    wp_enqueue_style('manohar-root', get_stylesheet_uri());
    $dynamic_css = '';
    if(!empty($opt['menu_font_color']['regular'])) {
        $dynamic_css .= '
        .navbar-default .navbar-toggle .icon-bar {background: '.esc_attr($opt['menu_font_color']['regular']).';} 
        .header_area.affix .navbar .attr-nav ul li a i {color: '.esc_attr($opt['menu_font_color']['regular']).'}';
    }
    if(!empty($opt['accent_gradient']['to'])) {
        $dynamic_css .= '
        /*.btn-gradient:before {
            background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.8))), radial-gradient(circle at top left, '.esc_attr($opt['accent_gradient']['from']).', '.esc_attr($opt['accent_gradient']['to']).');
            background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.8)), -webkit-radial-gradient(top left, circle, '.esc_attr($opt['accent_gradient']['from']).', '.esc_attr($opt['accent_gradient']['to']).');
            background-image: -o-linear-gradient(rgba(0, 0, 0, 0.8)), -o-radial-gradient(top left, circle, '.esc_attr($opt['accent_gradient']['from']).', '.esc_attr($opt['accent_gradient']['to']).');
            background-image: linear-gradient(rgba(0, 0, 0, 0.8)), radial-gradient(circle at top left, '.esc_attr($opt['accent_gradient']['from']).', '.esc_attr($opt['accent_gradient']['to']).');
        }
        .btn-gradient:hover:before, .btn-gradient:focus:before {
          background: -webkit-gradient(linear, left top, right top, from('.esc_attr($opt['accent_gradient']['from']).'), to('.esc_attr($opt['accent_gradient']['to']).'));
          background: -webkit-linear-gradient(left, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background: -o-linear-gradient(left, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background: linear-gradient(left, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
        }*/
        .progress-bar,
        .btn.btn-candy,
        .pricing-box:hover:after,
        .work_portfolio_filter .work_portfolio_f_item.active, .work_portfolio_filter .work_portfolio_f_item:hover {
          background-image: -moz-linear-gradient(0deg, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -webkit-linear-gradient(0deg, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -ms-linear-gradient(0deg, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
        }
        .pricing-box:hover:after {
          background-image: -webkit-gradient(linear, left bottom, left top, from(#ff5f6d), to(#ffc371));
          background-image: -webkit-linear-gradient(bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -o-linear-gradient(bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: linear-gradient(0deg, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
        }
        .intro-img:before {
            -moz-border-image: -moz-linear-gradient(top, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
            -webkit-border-image: -webkit-linear-gradient(to bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
            -o-border-image: -o-linear-gradient(top, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
            border-image: -webkit-gradient(linear, left top, left bottom, from('.esc_attr($opt['accent_gradient']['from']).'), to('.esc_attr($opt['accent_gradient']['to']).'));
            border-image: linear-gradient(to bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
            border-image-slice: 1;
            z-index: -1;
        }
        .heading-style-one hr.gradient-bg, .heading-style-two h2 span:after,
        .btn.btn-candy:active {
          background-image: -webkit-linear-gradient(bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -o-linear-gradient(bottom, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -webkit-gradient(linear, right top, left top, from('.esc_attr($opt['accent_gradient']['from']).'), to('.esc_attr($opt['accent_gradient']['to']).'));
          background-image: -webkit-linear-gradient(right, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: -o-linear-gradient(right, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
          background-image: linear-gradient(to left, '.esc_attr($opt['accent_gradient']['from']).' 0%, '.esc_attr($opt['accent_gradient']['to']).' 100%);
        }
        ';
    }

    wp_add_inline_style('manohar-root', $dynamic_css);

    // Scripts
    $dynamic_js = '';
	wp_enqueue_script( 'bootstrap', MANOHAR_DIR_JS.'/bootstrap.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'viewport', MANOHAR_DIR_JS.'/viewport.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'wow', MANOHAR_DIR_JS.'/wow.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'slick', MANOHAR_DIR_VEND.'/slick/slick.min.js', array('jquery'), '1.6.0', true );
    
	wp_enqueue_script( 'slicknav', MANOHAR_DIR_JS.'/jquery.slicknav.min.js', array('jquery'), '1.0', true );

	wp_enqueue_script( 'bootstrap-select', MANOHAR_DIR_JS.'/bootstrap-select.min.js', array('jquery'), '1.12.4', true );
	
	wp_enqueue_script( 'manohar-master', MANOHAR_DIR_JS. '/master.js', array('jquery'), '1.0', true );

    wp_add_inline_script('manohar-master', $dynamic_js);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_localize_script( 'manohar-master', 'manohar_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'manohar_scripts');


add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('manohar-admin', MANOHAR_DIR_CSS.'/manohar_admin.css');
});
