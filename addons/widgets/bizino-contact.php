<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;

/**
 *
 * Counter Widget .
 *
 */
class Bizino_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinocontact';
    }

    public function get_title()
    {
        return __('Bizino Contact', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'counter_section',
            [
                'label' => __('Contact', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon_image',
            [
                'label' => __('Icon image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'contact_title', [
                'label' => __('Contact Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Office Address:', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'contact_info', [
                'label' => __('Contact Info', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('3556 Hartford Way Vlg, Mount Pleasant, SC, 29466, Australia.', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_title' => __('Office Address:', 'bizino'),
                        'contact_info' => __('3556 Hartford Way Vlg, Mount Pleasant, SC, 29466, Australia.', 'bizino'),
                    ],
                    [
                        'contact_title' => __('Call Us For Help:', 'bizino'),
                        'contact_info' => __('3556 Hartford Way Vlg, Mount Pleasant, SC, 29466, Australia.', 'bizino'),
                    ],
                    [
                        'contact_title' => __('Mail info:', 'bizino'),
                        'contact_info' => __('3556 Hartford Way Vlg, Mount Pleasant, SC, 29466, Australia.', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ contact_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'title_styling',
            [
                'label' => __('Title Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contact_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-counter .counter-text'
            ]
        );

        $this->add_responsive_control(
            'contact_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'number_styling',
            [
                'label' => __('Counter Number Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'counter_number_color',
            [
                'label' => __('Counter Number Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter_number_typography',
                'label' => __('Counter Number Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-counter .counter-number'
            ]
        );

        $this->add_responsive_control(
            'counter_number_margin',
            [
                'label' => __('Counter Number Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_number_padding',
            [
                'label' => __('Counter Number Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-counter .counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'row gx-0');

        if (!empty($settings['slides'])) {
            ?>
            <div class="row gx-0">
                <?php
                foreach ($settings['slides'] as $item) {
                    ?>
                    <div class="col-md-4 contact-box">
                        <div class="contact-box__icon">
                            <img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="icon">
                        </div>
                        <h3 class="contact-box__title h5"><?php echo esc_html($item['contact_title']); ?></h3>
                        <p class="contact-box__text"><?php echo esc_html($item['contact_info']); ?></p>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Contact_Widget());