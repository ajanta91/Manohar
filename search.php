<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package manohar
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '9' : '12';
global $wp_query;
?>


    <section class="search_box_area pt-100 pb-100">
        <div class="container">
            <div class="search_box">
                <h3 class="font-600 mt-0">
                    <?php echo have_posts() ? esc_html__('New Search', 'manohar') : esc_html__('Not found', 'manohar'); ?>
                </h3>
                <p> <?php esc_html_e('If you are not happy with the results below please do another search', 'manohar') ?> </p>
                <?php manohar_search_page_search_form() ?>
            </div>
        </div>
    </section>

<?php
if ( have_posts() ) { ?>
    <div class="container sec_pad">
        <div class="row display-flex">
            <div class="col-md-<?php echo esc_attr($blog_column); ?> col-sm-12 display-flex">
                <div class="search_left pr-80">
                    <h3 class="font-500 mt-0 mb-30">
                        <?php echo esc_html($wp_query->found_posts); ?><?php esc_html_e(' Search Results For: ', 'manohar') ?>
                        <?php echo get_search_query() ?>
                    </h3>
                    <?php
                    $i = 1;
                    while (have_posts()) : the_post(); ?>
                        <div <?php post_class('media search_item') ?>>
                            <div class="media-left">
                                <div class="number">
                                    <?php echo esc_html($i); ?>
                                </div>
                            </div>
                            <div class="media-body">
                                <ul class="search_meta">
                                    <li> <?php the_time(get_option('date_format')); ?> </li>
                                    <li> <?php manohar_comment_count_text(get_the_ID()) ?> </li>
                                    <?php if (has_category()) : ?>
                                        <li> <?php esc_html_e('in ', 'manohar') ?><?php the_category(', ') ?> </li>
                                    <?php endif; ?>
                                </ul>
                                <a href="<?php the_permalink() ?>"><h3> <?php the_title() ?> </h3></a>
                                <p> <?php echo wp_trim_words(get_the_content(), 30, '') ?> </p>
                            </div>
                        </div>
                        <?php
                        ++$i;
                    endwhile;
                    manohar_pagination();
                    ?>
                </div>
            </div>
            <?php
            get_sidebar();
            ?>
        </div>
    </div>
    <?php
}
?>

<?php
get_footer();