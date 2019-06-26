<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package manohar
 */

get_header();
$opt = get_option('manohar_opt');
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
global $post;
?>

    <section class="white-bg sec_pad">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-single', get_post_format() );
                    endwhile;
                    ?>

                    <?php if(get_the_author_meta('description')) : ?>
                        <div class="media post_author">
                            <div class="media-left">
                                <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size'=>70)) ?>" alt="<?php echo get_the_author_meta('display_name'); ?>">
                            </div>
                            <div class="media-body">
                                <div class="author">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) ?>">
                                        <?php echo get_the_author_meta('display_name'); ?>
                                    </a>
                                </div>
                                <h6> <?php echo get_the_author_meta('user_lavel') ?> </h6>
                                <p> <?php echo get_the_author_meta('description') ?> </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                    <?php
                    $is_related_post = isset($opt['is_related_posts']) ? $opt['is_related_posts'] : '';
                    if($is_related_post=='1') :
                        $related_posts_title = isset($opt['related_posts_title']) ? $opt['related_posts_title'] : '';
                        $tags = wp_get_post_tags($post->ID);
                        $first_tag = isset($tags[0]) ? $tags[0]->term_id : '';
                        $related_posts_count = !empty($opt['related_posts_count']) ? $opt['related_posts_count'] : 3;
                        $related_posts = new WP_Query(array(
                            'tag__in' => array($first_tag),
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => $related_posts_count,
                            'ignore_sticky_posts' => 1
                        ));
                        if($related_posts->have_posts()) :
                            ?>
                            <div class="row mt-60 mb-30">
                                <?php if(!empty($related_posts_title)) : ?>
                                <div class="col-md-12 mb-30">
                                    <h1 class="comment-form-title font-600 text-center post-title"> <?php echo esc_html($related_posts_title) ?> </h1>
                                </div>
                                <?php endif; ?>
                                <?php
                                while($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <div class="col-md-4 blog_item">
                                        <div class="post mb-20">
                                            <div class="post-img">
                                                <?php the_post_thumbnail('manohar_260x250', array('class'=>'img-responsive')) ?>
                                            </div>
                                            <div class="post-info">
                                                <ul class="post-meta nav">
                                                    <li><span> <?php esc_html_e('By:', 'manohar'); ?></span>
                                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) ?>">
                                                            <?php echo get_the_author_meta('display_name'); ?>
                                                        </a>
                                                    </li>
                                                    <li> <?php the_time(get_option('date_format')) ?> </li>
                                                </ul>
                                                <h3><a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h3>
                                                <div class="categories">
                                                    <?php the_category(', ') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                            <?php
                        endif;
                    endif; ?>
                </div>
                <?php get_sidebar() ?>
            </div>
        </div>
    </section>

<?php
get_footer();