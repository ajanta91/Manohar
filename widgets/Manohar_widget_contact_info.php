<?php
// About us
class Manohar_widget_contact_info extends WP_Widget {
    public function __construct()  { // 'About us' Widget Defined
        parent::__construct('contact_info', esc_html__('(Theme) Contact info', 'manohar'), array(
            'description'   => esc_html__('About us widget by Appland', 'manohar'),
            'classname'     => 'widget-text widget_contact'
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
        $title    = isset($instance['title']) ? $instance['title'] : '';
        $address  = isset($instance['address']) ? $instance['address'] : '';
        $email    = isset($instance['email']) ? $instance['email'] : '';
        $phone    = isset($instance['phone']) ? $instance['phone'] : '';

        ?>
        <?php
        echo wp_kses($args['before_widget'], $allowed_tags);
            if($title) {
                echo wp_kses($args['before_title'], $allowed_tags);
                echo esc_html($title);
                echo wp_kses($args['after_title'], $allowed_tags);
            }
            ?>
            <ul class="footer-contact">
                <?php if($address) : ?>
                    <li><i class="mdi mdi-map-marker"></i> <p> <?php echo esc_html($address) ?> </p></li>
                <?php endif; ?>
                <?php if($email) : ?>
                    <li><i class="mdi mdi-email"></i>
                        <p> <a href="mailto:<?php echo esc_attr($email) ?>"> <?php echo esc_html($email) ?> </a> </p>
                    </li>
                <?php endif; ?>
                <?php if($phone) : ?>
                    <li><i class="mdi mdi-phone"></i> <p> <?php echo esc_html($phone) ?> </p></li>
                <?php endif; ?>
            </ul>
        <?php
        echo wp_kses($args['after_widget'], $allowed_tags);
    }

    // Backend
    function form( $instance ) {

        //
        // set defaults
        // -------------------------------------------------
        $instance   = wp_parse_args( $instance, array(
            'title'     => esc_html__('Contact Info', 'manohar'),
            'email'     => '',
            'address'   => '',
            'phone'     => '',
        ));

        /**
         * Title field
         */
        $text_value = esc_attr( $instance['title'] );
        $text_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'title' => esc_html__('Title', 'manohar')
        );
        echo cs_add_element( $text_field, $text_value );

        /**
         * Phone number field
         */
        $address_value = esc_attr( $instance['email'] );
        $address_field = array(
            'id'    => $this->get_field_name('email'),
            'name'  => $this->get_field_name('email'),
            'type'  => 'text',
            'title' => esc_html__('Email address', 'manohar'),
        );
        echo cs_add_element( $address_field, $address_value );

        /**
         * Phone number field
         */
        $address_value = esc_attr( $instance['phone'] );
        $address_field = array(
            'id'    => $this->get_field_name('phone'),
            'name'  => $this->get_field_name('phone'),
            'type'  => 'text',
            'title' => esc_html__('Phone number', 'manohar'),
        );
        echo cs_add_element( $address_field, $address_value );

        /**
         * Address field
         */
        $address_value = esc_attr( $instance['address'] );
        $address_field = array(
            'id'    => $this->get_field_name('address'),
            'name'  => $this->get_field_name('address'),
            'type'  => 'textarea',
            'title' => esc_html__('Address', 'manohar'),
            'info'  => esc_html__('HTML supported', 'manohar'),
            'sanitize' => 'disabled'
        );
        echo cs_add_element( $address_field, $address_value );
    }

    // Update Data
    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['content'] = $new_instance['content'];
        $instance['address'] = $new_instance['address'];
        $instance['email']   = $new_instance['email'];
        $instance['phone']   = $new_instance['phone'];

        return $instance;
    }

}