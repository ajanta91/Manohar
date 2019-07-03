<?php
$opt = get_option('manohar_opt');
$is_preloader = !empty($opt['is_preloader']) ? $opt['is_preloader'] : '';

$slides = !empty( $opt['opt-slides'] ) ? $opt['opt-slides'] : '';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>

    </head>

<body <?php body_class(); ?>>

    <?php if($is_preloader == '1') { ?>
        <div id="loader-overlay">
            <div class="loader">
                <div class="loader-inner"></div>
            </div>
        </div>
    <?php } ?>
    
    <!--=== Wrapper Start ===-->
    <div class="wrapper">
        <!--=== Header Start ===-->
        <header class="header_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="header_top">
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php
                                if (isset($opt['main_logo']['url'])) {
                                    $sticky_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                    $retina_logo = isset($opt['retina_logo'] ['url']) ? $opt['retina_logo'] ['url'] : '';
                                    $sticky_retina_logo = isset($opt['sticky_retina_logo'] ['url']) ? $opt['sticky_retina_logo'] ['url'] : '';
                                    if(!is_404()) { ?>
                                        <img src="<?php echo esc_url($opt['main_logo']['url']); ?>" data-rjs="<?php echo esc_url($retina_logo) ?>" alt="<?php bloginfo('name'); ?>">
                                        <?php
                                    }else {
                                        ?> <img src="<?php echo esc_url($sticky_logo); ?>" alt="<?php bloginfo('name'); ?>"> <?php
                                    }
                                } else {
                                    echo '<h3>' . get_bloginfo('name') . '</h3>';
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="header_top">
                            <?php
                            if( class_exists('GTranslate') ){
                                ?>
                                <div class="translate_menu">
                                    <?php echo do_shortcode('[gtranslate]'); ?>
                                </div>
                                <?php 
                            } ?>
                            <div class="call_to_action">
                                
                                <?php
                                $call_to_phone = !empty( $opt['call_to_phone'] ) ? $opt['call_to_phone'] : '';
                                $callToAction = !empty( $opt['call_to_action_link'] ) ? $opt['call_to_action_link'] : '';
                                $quote_btn = !empty( $opt['quote_btn'] ) ? $opt['quote_btn'] : '';
                                if( $call_to_phone ){
                                    echo '<a href="tel:'.esc_html($call_to_phone).'" class="header_top_phone"><i class="fa fa-phone"></i>'.esc_html( $call_to_phone ).'</a>';
                                }

                                if( $quote_btn ){
                                    echo '<a href="'.esc_url( $callToAction ).'" class="cta_btn">'.esc_html( $quote_btn ).'</a>';
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mobile_menu">
                    <div class="col-md-12 col-xs-12">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu_id" aria-expanded="false">
                                    <span class="sr-only"><?php esc_html_e('Toggle navigation', 'manohar') ?> </span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!--========== Collect the nav links, forms, and other content for toggling ==========-->
                            <?php
                            if(has_nav_menu('main_menu')) {
                                wp_nav_menu(array(
                                    'menu' => 'main_menu',
                                    'theme_location' => 'main_menu',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id' => 'menu_id',
                                    'menu_id'   => 'slick_mneu',
                                    'menu_class' => 'nav navbar-nav',
                                    'walker' => new Manohar_Nav_Navwalker,
                                    'fallback_cv' => 'Manohar_Nav_Navwalker::fallback',
                                    'depth' => 3
                                ));
                            }
                            ?>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <?php // get_template_part('template-parts/header-parts/title', 'bar')

        if( is_array( $slides ) && count( $slides ) > 0 ) {
	        ?>
            <section class="slider_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider_wrap">
                                <?php
                                foreach ( $slides as $slide ) {
	                                ?>
                                    <div class="single_slide">
                                        <?php echo '<img src="'. esc_url( $slide['image'] ) .'" alt="">'; ?>
                                    </div>
	                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	        <?php
        } ?>

