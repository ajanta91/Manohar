<?php
/**
 * Template name: Product page
 *
 * The main template file
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
$product_layout = $opt['shop_layout'];
$product_sidebar= $opt['shop_sidebar'];

if ( $product_layout == 'shop_grid' ){
    $sec_class = 'blog_area';
    $row_class = 'display-flex';
}
elseif ( $product_layout == 'shop_list' ){
	$sec_class = '';
}

$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '9' : '12';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


?>
    <section class="white-bg sec_pad <?php echo esc_attr( $sec_class ) ?>">
        <div class="container">
            <div class="row">
                <?php
                if( $product_sidebar == 'left' ){
	                get_sidebar();
                }

                $products = new WP_Query( array(
	                'post_type' => 'product',
	                'posts_pre_page' => 10,
	                'paged'         => $paged,
                ) );

                if( $product_layout == 'shop_grid' ){ ?>
                <div class="col-md-<?php echo esc_attr( $blog_column ) ?>">
                    <div class="row <?php echo esc_attr( $row_class )?>">
                    <?php
	                if ( $products->have_posts() ) :
		                while ( $products->have_posts() ) : $products->the_post();
                            ?>

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
                                        <ul class="post-meta nav">
                                            <li><span class="fa fa-tags"></span>
                                                <?php
                                                $terms = wp_get_post_terms(get_the_ID(), 'product_cat');
                                                if ($terms) {
                                                    $output = array();
                                                    foreach ($terms as $term) {
                                                        $output[] = '<a href="' .get_term_link( $term->slug, 'product_cat') .'">' .$term->name .'</a>';
                                                    }
                                                    echo join( ', ', $output );
                                                }
                                                ?>

                                            </li>
                                        </ul>
                                        <p><?php echo wp_trim_words(get_the_content(), 10, '') ?></p>
                                        <a class="readmore mt-15" href="<?php the_permalink() ?>">
                                            <span> <?php echo 'View Details' ?> <i class="eicon mdi mdi-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
		                endwhile;
	                endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
			                <?php manohar_pagination() ?>
                        </div>
                    </div>
                </div>
                    <?php
                }
                elseif ( $product_layout == 'shop_list' ) {
	                ?>
                    <div class="col-md-<?php echo esc_attr( $blog_column ) ?>">
                        <div class="blog_list_group">
			                <?php
			                if ( $products->have_posts() ) :
				                while ( $products->have_posts() ) : $products->the_post();
					                get_template_part( 'template-parts/product-default' );
				                endwhile;
			                endif;
			                ?>
                        </div>
		                <?php manohar_pagination(); ?>
                    </div>
	                <?php
                }

                if( $product_sidebar == 'right' ){
	                get_sidebar();
                }
                ?>

            </div>
        </div>
    </section>

<?php
get_footer();