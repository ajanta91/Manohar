<?php
// About us
class Manohar_widget_subscribe extends WP_Widget {
    public function __construct()  { // 'About us' Widget Defined
        parent::__construct('mc_subscribe_form', esc_html__('(Theme) MailChimp Subscribe Form', 'manohar'), array(
            'description'   => esc_html__('MailChimp subscribe form widget by Manohar', 'manohar'),
            'classname'     => 's_subscribe_form'
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
        $subtitle = isset($instance['subtitle']) ? $instance['subtitle'] : '';
        $placeholder_txt = isset($instance['placeholder_txt']) ? $instance['placeholder_txt'] : '';
        $action_url = isset($instance['action_url']) ? $instance['action_url'] : '';

        wp_enqueue_style('simple-line-icons');

        echo wp_kses($args['before_widget'], $allowed_tags); ?>
            <i class="icon-envelope-letter icons"></i>
            <?php
            if($title) {
                echo wp_kses($args['before_title'], $allowed_tags);
                echo esc_html($title);
                echo wp_kses($args['after_title'], $allowed_tags);
            }
            echo  ($subtitle) ? '<p>'.esc_html($subtitle).'</p>' : '';
            ?>
            <form action="<?php echo esc_url($action_url) ?>" class="mailchimp" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                <div class="input-group subcribes">
                    <input type="email" name="EMAIL" class="form-control memail" placeholder="<?php echo esc_attr($placeholder_txt) ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-submit btn-animated-none" type="submit"><i class="arrow_right"></i></button>
                    </span>
                </div>
            </form>
        <?php echo wp_kses($args['after_widget'], $allowed_tags); ?>
        <?php
    }

    // Backend
    function form( $instance ) {

        //
        // set defaults
        // -------------------------------------------------
        $instance   = wp_parse_args( $instance, array(
            'title'             => 'Sign Up For Newsletter',
            'subtitle'          => 'To Receive Updates',
            'placeholder_txt'   => 'Your Email. . .',
            'action_url'        => '',
        ));

        //
        // Widget title
        // -------------------------------------------------
        $title_value = esc_attr( $instance['title'] );
        $title_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'title' => esc_html__('Widget title', 'manohar'),
        );
        echo cs_add_element( $title_field, $title_value );

        //
        // Subtitle
        // -------------------------------------------------
        $subtitle_value = esc_attr( $instance['subtitle'] );
        $subtitle_field = array(
            'id'    => $this->get_field_name('subtitle'),
            'name'  => $this->get_field_name('subtitle'),
            'type'  => 'text',
            'title' => esc_html__('Subtitle', 'manohar'),
        );
        echo cs_add_element( $subtitle_field, $subtitle_value );

        //
        // Placeholder Text
        // -------------------------------------------------
        $placeholder_txt_value = esc_attr( $instance['placeholder_txt'] );
        $placeholder_txt_field = array(
            'id'    => $this->get_field_name('placeholder_txt'),
            'name'  => $this->get_field_name('placeholder_txt'),
            'type'  => 'text',
            'title' => esc_html__('Subtitle', 'manohar'),
        );
        echo cs_add_element( $placeholder_txt_field, $placeholder_txt_value );

        //
        // Content
        // -------------------------------------------------
        $action_url_value = esc_attr( $instance['action_url'] );
        $action_url_field = array(
            'id'    => $this->get_field_name('action_url'),
            'name'  => $this->get_field_name('action_url'),
            'type'  => 'text',
            'title' => esc_html__('Action URL', 'manohar'),
            'info'  => wp_kses_post(__('Enter here your MailChimp list form action URL. See <a href="https://goo.gl/K7RVRG">here</a> how to get it.', 'manohar'))
        );
        echo cs_add_element( $action_url_field, $action_url_value );
    }

    // Update Data
    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['subtitle'] = $new_instance['subtitle'];
        $instance['action_url'] = $new_instance['action_url'];
        $instance['placeholder_txt'] = $new_instance['placeholder_txt'];
        return $instance;
    }
}