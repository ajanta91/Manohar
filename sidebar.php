<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package manohar
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
	return;
}
?>

<div class="col-md-3 col-xs-12 blog_sidebar">
	<?php dynamic_sidebar( 'sidebar_widgets' ); ?>
</div>