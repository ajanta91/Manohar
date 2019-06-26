<?php
// About us
class Manohar_widget_about_us extends WP_Widget {
    public function __construct()  { // 'About us' Widget Defined
        parent::__construct('about_us', esc_html__('(Theme) About us', 'manohar'), array(
            'description'   => esc_html__('About us widget by Manohar', 'manohar'),
            'classname'     => 'widget-links about_us_widget'
        ));
    }

    // Front End
    public function widget($args, $instance) {
        extract( $args );
        $allowed_tags = array(
            'div' => array(
                'class' =>array(),
                'id' => array()
            ),
            'h5' => array(
                'class' =>array(),
                'id' => array()
            ),
            'h2' => array(
                'class' =>array(),
                'id' => array()
            ),
        );
        $title = isset($instance['title']) ? $instance['title'] : '';
        $logo = isset($instance['logo']) ? $instance['logo'] : '';
        $content = isset($instance['content']) ? $instance['content'] : '';
        $is_social_links = isset($instance['is_social_links']) ? $instance['is_social_links'] : '';

        ?>

        <?php
        echo wp_kses($args['before_widget'], $allowed_tags);
            if($title) {
                echo wp_kses($args['before_title'], $allowed_tags);
                echo esc_html($title);
                echo wp_kses($args['after_title'], $allowed_tags);
            }
            ?>
            <!--<div class="logo-footer">
                <a href="">Cha<span class="gradiant">o</span>s</a>
            </div>-->
            <div class="footer-about">
                <p> <?php echo esc_html($content) ?> </p>
                <?php if($is_social_links=='1') : ?>
                    <ul class="social-media">
                        <?php if(!empty($instance['fb'])) : ?>
                            <li><a href="<?php echo esc_url($instance['fb']) ?>" class="mdi mdi-facebook"></a></li>
                        <?php endif; ?>
                        <?php if(!empty($instance['twitter'])) : ?>
                            <li><a href="<?php echo esc_url($instance['twitter']) ?>" class="mdi mdi-twitter"></a></li>
                        <?php endif; ?>
                        <?php if(!empty($instance['pinterest'])) : ?>
                            <li><a href="<?php echo esc_url($instance['pinterest']) ?>" class="mdi mdi-pinterest"></a></li>
                        <?php endif; ?>
                        <?php if(!empty($instance['dribbble'])) : ?>
                            <li><a href="<?php echo esc_url($instance['dribbble']) ?>" class="mdi mdi-dribbble"></a></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php echo wp_kses($args['after_widget'], $allowed_tags); ?>

        <?php
    }

    // Backend
    function form( $instance ) {

        //
        // set defaults
        // -------------------------------------------------
        $instance   = wp_parse_args( $instance, array(
            'title'             => 'About Us',
            'logo'              => '',
            'is_social_links'   => '',
            'content'           => '',
            'widget_width'      => '',
            'fb'        => '#',
            'twitter'   => '#',
            'pinterest' => '#',
            'dribbble'  => '#',
        ));

        //
        // Widget title
        // -------------------------------------------------
        $title_value = esc_attr( $instance['title'] );
        $title_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'default' => 'About Us',
            'title' => esc_html__('Widget title', 'manohar'),
        );
        echo cs_add_element( $title_field, $title_value );

        //
        // Logo
        // -------------------------------------------------
        /*$upload_value = esc_attr( $instance['logo'] );
        $upload_field = array(
            'id'    => $this->get_field_name('logo'),
            'name'  => $this->get_field_name('logo'),
            'type'  => 'upload',
            'title' => esc_html__('Logo', 'manohar'),
            'desc'  => esc_html__('Upload here a image the About us widget logo.', 'manohar'),
        );
        echo cs_add_element( $upload_field, $upload_value );*/

        //
        // Content
        // -------------------------------------------------
        $textarea_value = esc_attr( $instance['content'] );
        $textarea_field = array(
            'id'    => $this->get_field_name('content'),
            'name'  => $this->get_field_name('content'),
            'type'  => 'textarea',
            'title' => esc_html__('Content', 'manohar'),
            'info'  => esc_html__('Write here some description text.', 'manohar')
        );
        echo cs_add_element( $textarea_field, $textarea_value );

        //
        // Show/hide social links
        // -------------------------------------------------
        $switcher_value = esc_attr( $instance['is_social_links'] );
        $switcher_field = array(
            'id'    => $this->get_field_name('is_social_links'),
            'name'  => $this->get_field_name('is_social_links'),
            'type'  => 'switcher',
            'title' => esc_html__('Show/hide social icons', 'manohar'),
            'info'  => esc_html__('Are you want to show the Social links?', 'manohar')
        );
        echo cs_add_element( $switcher_field, $switcher_value );

        // Facebook URL
        $fb_value = esc_attr( $instance['fb'] );
        $fb_field = array(
            'id'    => $this->get_field_name('fb'),
            'name'  => $this->get_field_name('fb'),
            'type'  => 'text',
            'title' => esc_html__('Facebook URL', 'manohar'),
        );
        echo cs_add_element( $fb_field, $fb_value );

        // Twiiter URL
        $twitter_value = esc_attr( $instance['twitter'] );
        $twitter_field = array(
            'id'    => $this->get_field_name('twitter'),
            'name'  => $this->get_field_name('twitter'),
            'type'  => 'text',
            'default' => '#',
            'title' => esc_html__('Twitter URL', 'manohar'),
        );
        echo cs_add_element( $twitter_field, $twitter_value );

        // Pinterest URL
        $pinterest_value = esc_attr( $instance['pinterest'] );
        $pinterest_field = array(
            'id'    => $this->get_field_name('pinterest'),
            'name'  => $this->get_field_name('pinterest'),
            'type'  => 'text',
            'default' => '#',
            'title' => esc_html__('Pinterest URL', 'manohar'),
        );
        echo cs_add_element( $pinterest_field, $pinterest_value );

        // Dribbble URL
        $dribbble_value = esc_attr( $instance['dribbble'] );
        $dribbble_field = array(
            'id'    => $this->get_field_name('dribbble'),
            'name'  => $this->get_field_name('dribbble'),
            'type'  => 'text',
            'default' => '#',
            'title' => esc_html__('Dirbbble URL', 'manohar'),
        );
        echo cs_add_element( $dribbble_field, $dribbble_value );

    }

    // Update Data
    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['content'] = $new_instance['content'];
        $instance['logo'] = $new_instance['logo'];
        $instance['is_social_links'] = $new_instance['is_social_links'];
        $instance['widget_width'] = $new_instance['widget_width'];
        $instance['fb'] = $new_instance['fb'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['dribbble'] = $new_instance['dribbble'];

        return $instance;
    }

}