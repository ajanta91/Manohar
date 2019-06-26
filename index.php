<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package manohar
 */

get_header();
$opt = get_option('manohar_opt');
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '9' : '12';
$layout = $opt['opt-layout'];
if( $layout == 2 ){
	$content_pad = 'pl-40';
}elseif ( $layout == 3 ){
	$content_pad = 'pr-40';
}
?>
    <section class="white-bg sec_pad">
        <div class="container">
            <div class="row">
                <?php
                if( $layout == 2 ){
	                get_sidebar();
                }
                ?>
                <div class="col-md-<?php echo esc_attr($blog_column) .' '. esc_attr( $content_pad ) ?>">
                    <div class="blog_list_group">
                        <?php
                        while(have_posts()) : the_post();
                            get_template_part( 'template-parts/content-default', get_post_format() );
                        endwhile;
                        ?>
                    </div>
                    <?php manohar_pagination(); ?>
                </div>

                <?php
                if( $layout == 3 ){
	                get_sidebar();
                }
                ?>

            </div>
        </div>
    </section>

<?php
get_footer();