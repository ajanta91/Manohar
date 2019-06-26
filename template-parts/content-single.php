<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package manohar
 */

$opt = get_option('manohar_opt');
$is_social_share = isset($opt['is_social_share']) ? $opt['is_social_share'] : '1';
$is_post_tag = isset($opt['is_post_tag']) ? $opt['is_post_tag'] : '1';
$post_metas = get_post_meta(get_the_ID(), 'post_metas', true);
$post_video_url = isset($post_metas['post_video_url']) ? $post_metas['post_video_url'] : '';
?>

<div <?php post_class('blog-grid-video pr-30') ?>>
    <div class="post video-blog mb-20">
        <div class="<?php echo has_post_format('video') ? 'post-img' : 'post'; ?>">
            <?php the_post_thumbnail('manohar_840x560', array('class'=>'img-responsive')) ?>
            <?php if(has_post_format('video')) : ?>
                <a class="video-play popup-youtube" href="<?php echo esc_url($post_video_url) ?>">
                    <i class="eicon mdi mdi-play"></i>
                </a>
            <?php endif; ?>
        </div>
        <div class="post-info post-info-two post_content">
            <?php if(function_exists('cs_get_option')) : ?>
                <ul class="post-meta nav">
                    <li>
                        <span><?php esc_html_e('By: ', 'manohar') ?> </span>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) ?>">
                            <?php echo get_the_author_meta('display_name'); ?>
                        </a>
                    </li>
                    <li><a href="<?php manohar_day_link() ?>"><?php the_time(get_option('date_format')); ?></a></li>
                </ul>
                <h1 class="single-post-title"> <?php the_title() ?> </h1>
                <div class="categories">
                    <?php the_category(', ') ?>
                </div>
            <?php endif; ?>
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'manohar' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'manohar' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ));
            ?>

            <div class="posts_social">
                <?php if($is_post_tag=='1') : ?>
                    <div class="pull-left">
                        <?php the_tags('<div class="post-nam">'.esc_html__('Tags: &nbsp;', 'manohar').' </div>', ', ') ?>
                    </div>
                <?php endif; ?>
                <?php if(function_exists('manohar_social_share')) :
                    if($is_social_share=='1') : ?>
                        <div class="pull-right">
                            <div class="post-nam"> <?php esc_html_e('Share:', 'manohar') ?> </div>
                            <?php manohar_social_share() ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>