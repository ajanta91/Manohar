<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
$opt = get_option('manohar_opt');
$error_title = !empty($opt['error_title']) ? $opt['error_title'] : esc_html__('Looks Like you\'re Lost', 'manohar');
$error_subtitle = !empty($opt['error_subtitle']) ? $opt['error_title'] : esc_html__("We can't seem to find the page you're looking for", "manohar");
$error_home_btn_label  =!empty($opt['error_home_btn_label']) ?  $opt['error_home_btn_label'] : esc_html__('Back to home', 'manohar');
$error_heading  =!empty($opt['error_heading']) ?  $opt['error_heading'] : esc_html__('404', 'manohar');
?>
    <section class="error_area">
        <div class="container flex">
            <div class="error_contain text-center">
                <div class="b_text">
                    <h1> <?php echo esc_html($error_heading) ?> </h1>
                    <img src="<?php echo MANOHAR_DIR_IMG ?>/shadow.png" alt="<?php esc_attr_e('404 page background shadow image', 'manohar') ?>">
                </div>
                <h2 class="mt-80 mb-20"> <?php echo esc_html($error_title) ?> </h2>
                <p class="mb-50"> <?php echo esc_html($error_subtitle) ?> </p>
                <a href="<?php echo esc_url(home_url('/')) ?>" class="back_btn btn btn-md btn-animated-none">
                    <?php echo esc_html($error_home_btn_label) ?> <i class="arrow_right"></i>
                </a>
            </div>
        </div>
    </section>
<?php
get_footer();