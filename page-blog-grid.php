<?php
/**
 * Template Name: Full-width blog grid
 */
get_header();

global $wp_query;
global $paged;
global $post;

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
?>

<section class="white-bg blog_area sec_pad">
    <div class="container">
        <div class="row display-flex">
            <?php
            while($wp_query->have_posts()):$wp_query->the_post(); ?>
                <div class="col-md-4">
                    <div class="post mb-20">
                        <div class="post-img">
                            <?php the_post_thumbnail('manohar_370x247', array('class'=>'img-responsive')) ?>
                        </div>
                        <div class="post-info">
                            <h3 title="<?php the_title() ?>">
                                <a href="<?php the_permalink() ?>">
                                    <?php manohar_limit_latter(get_the_title(), 34); ?>
                                </a>
                            </h3>
                            <p><?php echo wp_trim_words(get_the_content(), 17, '') ?></p>
                            <a class="readmore mt-15" href="<?php the_permalink() ?>">
                                <span> <?php echo esc_html($blog_read_more) ?> <i class="eicon mdi mdi-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php manohar_pagination() ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();