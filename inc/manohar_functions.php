<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package manohar
 */


// Image sizes
add_image_size('manohar_270x300', 270, 300, true); // Featured Products section thumbnail
add_image_size('manohar_365x385', 365, 385, true); // Product light box slider
add_image_size('manohar_100x100', 100, 100, true); // Recent posts widget post thumbnail size
add_image_size('manohar_70x70', 70, 70, true); // Recent posts widget post thumbnail size
add_image_size('manohar_480x400', 480, 400, true); // Product full width grid layout thumbnail size
add_image_size('manohar_370x247', 270, 247, true); // Blog posts section post thumbnails size
add_image_size('manohar_110x110', 110, 110, true); // Testimonial carousel author image size
add_image_size('manohar_270x330', 270, 300, true); // Team section's member profile photo size
add_image_size('manohar_260x999', 260, 999, true); // Blog masonry archive page's posts thumbnail size
add_image_size('manohar_370x247', 370, 247, true); // Blog grid archive page's posts thumbnail size
add_image_size('manohar_370x280', 370, 280, true); // Blog list archive page's posts thumbnail size
add_image_size('manohar_260x250', 260, 250, true); // Blog single related posts thumbnail size
add_image_size('manohar_840x450', 850, 450, true); // Blog single featured image size


// Pagination
function manohar_pagination() {
    the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_text'          => '<i class="arrow_carrot-left"></i>',
        'next_text'          => '<i class="arrow_carrot-right"></i>'
    ));
}


// Comment list
function manohar_comments($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <li class="post-comment <?php echo !get_avatar($comment) ? 'no-avatar' : ''; ?>" id="comment-<?php comment_ID() ?>">
        <div class="comment-content">
            <?php if(get_avatar($comment)) : ?>
            <a href="<?php comment_author_url($comment) ?>" class="avatar">
                <?php echo get_avatar($comment, 110); ?>
            </a>
            <?php endif; ?>
            <div class="post-body">
                <div class="comment-header">
                    <div class="author-left">
                        <div class="author">
                            <a href="<?php comment_author_url($comment) ?>"> <?php comment_author(); ?> </a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="time-ago">
                            <?php  printf( esc_html__('%1$s at %2$s', 'manohar'), get_comment_date(), get_comment_time() ); ?>
                        </div>

                        <?php
                        if ( $comment->comment_approved == '0' ) : ?>
                            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'manohar' ); ?></em>
                        <?php endif; ?>

                    </div>
                    <span class="reply">
                        <?php
                        comment_reply_link(array_merge( $args,
                            array(
                                'reply_text' => esc_html__('Reply', 'manohar'),
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']
                            )
                        ));
                        ?>
                    </span>
                </div>
            </div>
            <div class="post-message">
                <?php comment_text(); ?>
            </div>
        </div>
    </li>
<?php
}


// Move the comment field to bottom
add_filter( 'comment_form_fields', function ( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
});


// Search form
function manohar_search_form($is_button=true) {
    ?>
    <div class="manohar-search">
        <form class="form-wrapper" action="<?php echo esc_url(home_url('/')); ?>" _lpchecked="1">
            <input type="text" id="search" placeholder="<?php esc_attr_e('Search ...', 'manohar'); ?>" name="s">
            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
        </form>
        <?php if($is_button==true) { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="home_btn"> <?php esc_html_e('Back to home Page', 'manohar'); ?> </a>
        <?php } ?>
    </div>
    <?php
}


// add category nicenames in body and post class
function manohar_post_class( $classes ) {
    global $post;
    if(!has_post_thumbnail()) {
        $classes[] = 'no-post-thumbnail';
    }
    return $classes;
}
add_filter( 'post_class', 'manohar_post_class' );


// Body classes
add_filter( 'body_class', function($classes) {

    if(is_front_page()) {
        $classes[] = 'front-page';
    }else{
        $classes[] = 'not-front-page';
    }
    return $classes;
});


// Day link to archive page
function manohar_day_link() {
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}

// Get comment count text
function manohar_comment_count_text($post_id) {
    $comments_number = get_comments_number($post_id);
    if($comments_number==0) {
        $comment_text = esc_html__('No comment', 'manohar');
    }elseif($comments_number == 1) {
        $comment_text = esc_html__('One comment', 'manohar');
    }elseif($comments_number > 1) {
        $comment_text = $comments_number.esc_html__(' Comments', 'manohar');
    }
    echo esc_html($comment_text);
}


// Search page search form
function manohar_search_page_search_form() {
    ?>
    <form action="<?php echo esc_url(home_url('/')) ?>" class="search-form" method="get" _lpchecked="1">
        <input type="text" name="s" class="form-control search-field" id="search" placeholder="<?php esc_attr_e('Enter here your search query', 'manohar') ?>" value="<?php echo get_search_query() ?>">
        <button type="submit" class="search-submit search_btn"> <?php esc_html_e('Search', 'manohar') ?> </button>
    </form>
    <?php
}

// Remove admin bar margin css
add_action('get_header', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
});


// Limit latter
function manohar_limit_latter($string, $limit_length) {
    if (strlen($string) > $limit_length) {
        echo substr($string, 0, $limit_length) . '...';
    }
    else {
        echo esc_html($string);
    }
}


// Remove auto p from Contact Form 7 shortcode output
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}


add_action( 'init', 'CJG_retina' );

function CJG_retina(){

    global $is_retina;
    $is_retina = isset( $_COOKIE["device_pixel_ratio"] ) AND $_COOKIE["device_pixel_ratio"] >= 2;
}




add_action('init', function() {
	// Project / Product
	register_post_type('product', array(
		'public'    => true,
		'show_in_rest' => true,


		'supports'  => array('title', 'editor', 'thumbnail', 'taxonomy'),
		'labels'    => array(
			'name'          => esc_html__('Product', 'manohar'),
			'add_new_item'  => esc_html__('Add Product Item', 'manohar'),
			'add_new'       => esc_html__('Add Item', 'manohar')
		),
		'taxonomies'            => array( 'categories' ),
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'publicly_queryable'    => true,
		'menu_icon'             => 'dashicons-format-gallery'
	));
	register_taxonomy('product_cat', 'product', array(
		'public'                => true,
		'hierarchical'          => true,
		'show_admin_column'     => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_in_nav_menus'     => true,
		'labels'                => array(
			'name'  => esc_html__('Product categories', 'manohar'),
		)
	));
});

