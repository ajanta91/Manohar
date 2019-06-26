<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package manohar
 */

$allowed_html = array(
	'a' => array(
		'href' => array(),
		'title' => array()
	),
	'br' => array(),
	'em' => array(),
	'strong' => array(),
	'iframe' => array(
		'src' => array(),
	)
);
$opt = get_option('manohar_opt');
$blog_read_more = !empty($opt['blog_read_more']) ? $opt['blog_read_more'] : esc_html__('Read More', 'manohar') ;
$is_post_meta = isset($opt['is_post_meta']) ? $opt['is_post_meta'] : '1';
$is_post_author = isset($opt['is_post_author']) ? $opt['is_post_author'] : '1';
$is_post_date = isset($opt['is_post_date']) ? $opt['is_post_date'] : '1';
$is_post_cat = isset($opt['is_post_cat']) ? $opt['is_post_cat'] : '1';
?>

<div <?php post_class('media blog_list') ?>>
<?php if(has_post_thumbnail()) : ?>
	<div class="media-left">
		<?php the_post_thumbnail('manohar_370x280') ?>
	</div>
<?php endif; ?>

<?php
if(is_sticky()) {
	echo '<div class="featured_post">'.esc_html__('Featured', 'manohar').'</div>';
}
?>

	<div class="media-body">
		<div class="post-info post_info_three">

			<?php if($is_post_meta=='1') : ?>
				<ul class="post-meta nav">
					<?php if($is_post_author=='1') : ?>
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
					<?php endif; ?>
				</ul>
			<?php endif; ?>

			<h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>
			<div class="categories">
				<?php the_category(', ') ?>
			</div>

			<p> <?php echo wp_trim_words(get_the_content(), 15); ?> </p>
			<a class="readmore" href="<?php the_permalink() ?>">
				<span> <?php echo esc_html($blog_read_more) ?> </span>
			</a>

		</div>
	</div>
	</div><?php
