<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package manohar
 */

get_header();


while ( have_posts() ) : the_post();
    ?>
    <section class="white-bg <?php echo !is_front_page() ? 'sec_pad' : ''; ?>">
        <div class="container page-content">
            <div class="row">
	            <?php get_sidebar(); ?>
                <div class="col-lg-9">
                    <div class="post_content">
                        <?php
                        the_content();
                        wp_link_pages(array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'manohar' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'manohar' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ));
                        ?>
                    </div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                </div>

            </div>
        </div> <!-- /.container -->
    </section>
<?php
endwhile; // End of the loop.


get_footer();
