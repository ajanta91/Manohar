<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

$opt = get_option('manohar_opt');

$copyright_text = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : esc_html__('© 2018 DroitThemes. All rights reserved', 'manohar');
$footer_logo_url = !empty($opt['footer_logo_url']) ? $opt['footer_logo_url'] : '';

?>
<footer class="footer bg_color_two l_footer_area">

    <?php if(is_active_sidebar('footer_sidebar')) : ?>
        <div class="footer-main">
            <div class="container">
                <div class="row row-flex">
                    <?php dynamic_sidebar('footer_sidebar') ?>
                </div>
                <div class="hr"></div>
            </div>
        </div>
    <?php endif; ?>

    <div class="footer-copyright">
        <div class="container">
            <?php
            if(!empty($opt['footer_logo']['url'])) : ?>
                <div class="row">
                    <div class="col-md-2 col-md-offset-5">
                        <div class="logo-footer text-center">
                            <a href="<?php echo esc_url($footer_logo_url) ?>">
                                <img src="<?php echo esc_url($opt['footer_logo']['url']) ?>" alt="<?php bloginfo('name') ?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($copyright_text) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copy-right">
                            <?php echo wp_kses_post($copyright_text); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>