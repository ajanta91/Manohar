<?php
/**
 * Theme's title bar for all pages based on conditions
 */

$opt = get_option('manohar_opt');

if(is_home()) :
    $blog_header_bg = !empty($opt['blog_header_bg']['url']) ? $opt['blog_header_bg']['url'] : '';
    $blog_title = ! empty( $opt['blog_title'] ) ? $opt['blog_title'] : esc_html__('Blog', 'manohar');
    $blog_subtitle = ! empty( $opt['blog_subtitle'] ) ? $opt['blog_subtitle'] : get_bloginfo( 'description' );
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(!empty($blog_header_bg)) : ?>
            <div class="parallax-overlay">
                <img src="<?php echo esc_url($blog_header_bg) ?>" alt="<?php echo esc_attr($blog_title) ?>">
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <?php if(!empty($blog_title)) : ?>
                    <h1 class="font-600"> <?php echo esc_html($blog_title) ?> </h1>
                <?php endif; ?>
                <?php if(!empty($blog_subtitle)) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($blog_subtitle) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section> <?php

elseif(is_tax('portfolio_cat')) :
    $term_data = get_term_meta( get_queried_object()->term_id, '_portfolio_cat_config', true );
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(!empty($term_data['port_cat_banner_bg'])) { ?>
            <div class="parallax-overlay">
                <img src="<?php echo esc_url($term_data['port_cat_banner_bg']) ?>" alt="">
            </div>
        <?php } ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600"> <?php esc_html_e('Category: ', 'manohar'); single_cat_title() ?> </h1>
                <?php if(!empty($term_data['port_cat_banner_subtitle'])) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($term_data['port_cat_banner_subtitle']) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php

elseif(is_singular(array('service'))) :
    $service_metas = get_post_meta(get_the_ID(), 'service_metas', true);
    $service_subtitle = isset($service_metas['subtitle']) ? $service_metas['subtitle'] : '';
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(get_the_post_thumbnail(get_the_ID())) { ?>
            <div class="parallax-overlay">
                <?php the_post_thumbnail('full') ?>
            </div>
        <?php } ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600"> <?php the_title() ?> </h1>
                <?php if(!empty($service_subtitle)) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($service_subtitle) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php

elseif(is_search()) : ?>
    <section class="title-hero-bg parallax-effect">
        <div class="parallax-overlay">
        </div>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600"> <?php esc_html_e('Search result', 'manohar'); ?> </h1>
                <h4 class="mt-30"> <?php esc_html_e('Search result for: “', 'manohar'); echo get_search_query().'”' ?> </h4>
            </div>
        </div>
    </section>
<?php

elseif(is_singular(array('team'))) :
    $team_metas = get_post_meta(get_the_ID(), 'team_metas', true);
    $designation = isset($team_metas['designation']) ? $team_metas['designation'] : '';
    $title_bar_bg = isset($team_metas['title_bar_bg']) ? $team_metas['title_bar_bg'] : '';
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(get_the_post_thumbnail(get_the_ID())) { ?>
            <div class="parallax-overlay">
                <img src="<?php echo esc_url($title_bar_bg) ?>" alt="<?php the_title() ?>">
            </div>
        <?php } ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600"> <?php the_title() ?> </h1>
                <?php if(!empty($designation)) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($designation) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php

elseif(is_singular('portfolio')) :
    $portfolio_metas = get_post_meta(get_the_ID(), 'portfolio_metas', true);
    $portfolio_subtitle = isset($portfolio_metas['subtitle']) ? $portfolio_metas['subtitle'] : '';
    $portfolio_bg = isset($portfolio_metas['portfolio_bg']) ? $portfolio_metas['portfolio_bg'] : '';
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(get_the_post_thumbnail(get_the_ID())) { ?>
            <div class="parallax-overlay">
                <img src="<?php echo esc_url($portfolio_bg) ?>" alt="<?php the_title() ?>">
            </div>
        <?php } ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600"> <?php the_title() ?> </h1>
                <?php if(!empty($portfolio_subtitle)) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($portfolio_subtitle) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php

elseif(is_single()) :
    $post_metas = get_post_meta(get_the_ID(), 'post_metas', true);
    $post_title = isset($post_metas['post_title']) ? $post_metas['post_title'] : get_the_title();
    $post_subtitle = isset($post_metas['post_subtitle']) ? $post_metas['post_subtitle'] : '';
    ?>
    <section class="title-hero-bg parallax-effect">
        <?php if(!empty($post_metas['post_bg'])) { ?>
            <div class="parallax-overlay">
                <img src="<?php echo esc_url($post_metas['post_bg']) ?>" alt="<?php the_title() ?>">
            </div>
        <?php } ?>
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <?php if(!empty($post_title)) : ?>
                    <h1 class="font-600"> <?php echo esc_html($post_title); ?> </h1>
                <?php endif; ?>
                <?php if(!empty($post_subtitle)) : ?>
                    <h4 class="mt-30"> <?php echo esc_html($post_subtitle) ?> </h4>
                <?php endif; ?>
            </div>
        </div>
    </section> <?php

elseif(is_page()) :
    $page_metas = get_post_meta(get_the_ID(), 'page_metas', true);
    $is_page_titlebar = isset($page_metas['is_page_titlebar']) ? $page_metas['is_page_titlebar'] : '1';
    $page_subtitle = isset($page_metas['page_subtitle']) ? $page_metas['page_subtitle'] : '';
    if($is_page_titlebar == '1') : ?>
        <section class="title-hero-bg parallax-effect">
            <?php if(has_post_thumbnail(get_the_ID())) : ?>
                <div class="parallax-overlay">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title() ?>">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="page-title text-center white-color mt-20">
                    <h1 class="font-600"> <?php the_title(); ?> </h1>
                    <?php if(!empty($page_subtitle)) : ?>
                        <h4 class="mt-30"> <?php echo esc_html($page_subtitle) ?> </h4>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php
    endif;

elseif(is_archive()):
    ?>
    <section class="title-hero-bg parallax-effect">
        <div class="container">
            <div class="page-title text-center white-color mt-20">
                <h1 class="font-600">
                    <?php
                        the_archive_title();
                    ?>
                </h1>
            </div>
        </div>
    </section>
<?php
endif;