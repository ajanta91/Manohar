<?php
/**
 * Template Name: Blog masonry with sidebar
 */
get_header();

global $wp_query;
global $paged;
$opt = get_option('manohar_opt');
$blog_excerpt = !empty($opt['blog_excerpt']) ? $opt['blog_excerpt'] : 25 ;
$blog_read_more = !empty($opt['blog_read_more']) ? $opt['blog_read_more'] : esc_html__('Read More', 'manohar') ;
$is_post_meta = isset($opt['is_post_meta']) ? $opt['is_post_meta'] : '1';
$is_post_author = isset($opt['is_post_author']) ? $opt['is_post_author'] : '1';
$is_post_date = isset($opt['is_post_date']) ? $opt['is_post_date'] : '1';
$is_post_cat = isset($opt['is_post_cat']) ? $opt['is_post_cat'] : '1';

if(is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$temp = $wp_query;
$wp_query = null;

$wp_query = new WP_Query(array(
    'post_type'     => 'post',
    'posts_per_page'=> get_option('posts_per_page'),
    'paged'         => $paged,
));
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '9' : '12';
?>

<section class="white-bg sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo esc_attr($blog_column) ?> pr-40">
                <div class="row blog_masonry" id="blog_masonry">
                    <div class="col-md-4 col-xs-6 grid-sizer"></div>
                    <?php
                    while($wp_query->have_posts()):$wp_query->the_post(); ?>
                        <div class="col-md-4 col-xs-6 blog_item">
                            <div class="post mb-20">
                                <div class="post-img">
                                    <?php the_post_thumbnail('manohar_260x999', array('class'=>'img-responsive')) ?>
                                </div>
                                <div class="post-info">
                                    <?php if($is_post_meta=='1') : ?>
                                        <ul class="post-meta nav">
                                            <?php if($is_post_author=='1') : ?>
                                                <li><span> <?php esc_html_e('By:', 'manohar') ?> </span>
                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) ?>">
                                                        <?php echo get_the_author_meta('display_name'); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li><a class="date" href="<?php manohar_day_link() ?>"> <?php the_time(get_option('date_format')) ?> </a></li>
                                        </ul>
                                    <?php endif; ?>
                                    <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>
                                    <div class="categories">
                                        <?php the_category(', ') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php manohar_pagination(); wp_reset_postdata(); ?>
            </div>

            <?php get_sidebar() ?>

        </div>
    </div>
</section>

<?php
get_footer();