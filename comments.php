<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package manohar
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>

<div class="comment-section">
    <?php if ( have_comments() ) : ?>
        <h1 class="comment-form-title mt-50"> <?php comments_number( ' ', '1 Comment', '% Comments' ); ?> </h1>
        <ul class="comment-box">
            <?php
            the_comments_navigation();
            wp_list_comments(
                array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 110,
                    'type' => 'all',
                    'callback'	 => 'manohar_comments',
                ),
                get_comments(array(
                    'post_id' => get_the_ID(),
                ))
            );
            the_comments_navigation();
            ?>
        </ul>
    <?php endif; ?>

    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'manohar' ); ?></p>
        <?php
	endif;
    ?>

    <?php
    $commenter      = wp_get_current_commenter();
    $req            = get_option( 'require_name_email' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<div class="row-form row"> <div class="col-form col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="author" id="name" value="'.esc_attr($commenter['comment_author']).'" placeholder="'.esc_attr__('Name *', 'manohar').'" '.$aria_req.'>
                        </div>
                    </div>',
        'email'	 => '<div class="col-form col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.esc_attr__('Email *', 'manohar').'" '.$aria_req.'>
                        </div>
                    </div> </div>',
    );
    $comments_args = array(
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'class_form'            => 'comment-form',
        'id_form'               => 'form-comments',
        'class_submit'          => 'btn btn-candy btn-md btn-circle remove-margin btn-animated-none',
        'id_submit'             => 'submit-btn',
        'title_reply'           => '<div class="clearfix"></div><h1 class="comment-form-title mt-50 mb-30">'.esc_html__("Leave a comment", "manohar").'</h1>',
        'comment_notes_before'  => '',
        'comment_field'         => '<textarea name="comment" class="form-control" id="comment-field" placeholder="'.esc_attr__('Comment', 'manohar').'"></textarea>',
        'comment_notes_after'   => '',
    );
    comment_form($comments_args);
    ?>
</div>