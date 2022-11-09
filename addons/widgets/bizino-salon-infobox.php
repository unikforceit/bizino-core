<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 *
 * Salon Info Box Widget .
 *
 */
class Bizino_Salon_Info_Box_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinosaloninfobox';
    }

    public function get_title()
    {
        return __('Bizino Salon Info Box', 'bizino');
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
            'salon_info_box',
            [
                'label' => __('Salon Info Box', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'salon_label',
            [
                'label' => __('Salon Label', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('HaarMax Salon', 'bizino')
            ]
        );
        $this->add_control(
            'salon_name',
            [
                'label' => __('Salon name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Davins Hair Salon', 'bizino')
            ]
        );
        $this->add_control(
            'salon_address',
            [
                'label' => __('Salon Address', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('766 Walker Road, Suite D, Great Virginia 22066', 'bizino')
            ]
        );
        $this->add_control(
            'salon_phone_number',
            [
                'label' => __('Salon Phone Number', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Tel: 703-261-6660', 'bizino')
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Get Directions', 'bizino')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('#', 'bizino')
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
            'label_styling',
            [
                'label' => __('Label Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'saloninfobox_label_color',
            [
                'label' => __('Label Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .box-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'saloninfobox_label_typography',
                'label' => __('Label Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .find-salon-box .box-label'
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_label_margin',
            [
                'label' => __('Label Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .box-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_label_padding',
            [
                'label' => __('Label Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .box-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            'saloninfobox_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'saloninfobox_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .find-salon-box .find-salon-title'
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

        $this->start_controls_section(
            'address_styling',
            [
                'label' => __('Address Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'saloninfobox_address_color',
            [
                'label' => __('Address Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'saloninfobox_address_typography',
                'label' => __('Address Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .find-salon-box .find-salon-text'
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_address_margin',
            [
                'label' => __('Address Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'saloninfobox_address_padding',
            [
                'label' => __('Address Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .find-salon-box .find-salon-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Animation styling------------------------------------*/

        $this->start_controls_section(
            'button_styling',
            [
                'label' => __('Button', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style-black' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Button Bg Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style-black' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __('Button Bg Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style-black:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn.style-black'
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        echo '<div class="find-salon-box">';
        if (!empty($settings['salon_label'])) {
            echo '<span class="box-label">' . esc_html($settings['salon_label']) . '</span>';
        }
        if (!empty($settings['salon_name'])) {
            echo '<h3 class="find-salon-title">' . esc_html($settings['salon_name']) . '</h3>';
        }
        if (!empty($settings['salon_address'])) {
            echo '<p class="find-salon-text"><i class="fas fa-map-marker-alt"></i> ' . esc_html($settings['salon_address']) . '</p>';
        }
        if (!empty($settings['salon_phone_number'])) {
            echo '<p class="find-salon-text"><i class="fas fa-phone-alt"></i> ' . esc_html($settings['salon_phone_number']) . '</p>';
        }
        if (!empty($settings['button_text'])) {
            echo '<a href="' . esc_url($settings['button_url']) . '" class="vs-btn style-black">' . esc_html($settings['button_text']) . '</a>';
        }
        echo '</div>';
    }
}