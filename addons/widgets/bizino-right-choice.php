<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Right Choice Widget .
 *
 */
class Bizino_Right_Choice_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinorightchoice';
    }

    public function get_title()
    {
        return __('Bizino Right Choice', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-select';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'chose_us_content',
            [
                'label' => __('Right Choice', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'content', [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'price', [
                'label' => __('Price', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => '2',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bizino')
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'choice',
            [
                'label' => __('Right Choice', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Safe Cleaning Supplies', 'bizino'),
                    ],
                ],
            ]
        );


        $this->end_controls_section();

        /*-----------------------------------------general styling------------------------------------*/

        $this->start_controls_section(
            'general_styling',
            [
                'label' => __('Genaral', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_effect',
            [
                'label' => __('Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-trends-box .trends-body' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'header_effect',
            [
                'label' => __('Header Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-trends-box .trends-header' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
            'title_styling',
            [
                'label' => __('Title Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .sec-title',
                ]
            ]
        );

        $this->add_responsive_control(
            'features_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------content styling------------------------------------*/

        $this->start_controls_section(
            'content_styling',
            [
                'label' => __('Content Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_content_color',
            [
                'label' => __('Content Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_content_typography',
                'label' => __('Content Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} p',
                ]
            ]
        );

        $this->add_responsive_control(
            'features_content_margin',
            [
                'label' => __('Content Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_content_padding',
            [
                'label' => __('Content Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------price styling------------------------------------*/

        $this->start_controls_section(
            'price_styling',
            [
                'label' => __('Price Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_price_color',
            [
                'label' => __('Price Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-touch' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_price_typography',
                'label' => __('Price Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .price-touch',
                ]
            ]
        );

        $this->add_responsive_control(
            'features_price_margin',
            [
                'label' => __('Price Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .price-touch' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_price_padding',
            [
                'label' => __('Price Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .price-touch' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------button styling------------------------------------*/

        $this->start_controls_section(
            'button_styling',
            [
                'label' => __('Button Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_shadow',
                'label' => __('Button Shadow', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'btn_hvr_color',
            [
                'label' => __('Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn:hover' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn'
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => __('Text Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'btn_text_hvr_color',
            [
                'label' => __('Text Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo '<!-----------------------Start Trends Area----------------------->';
        echo '<section class="right-choose-wrapper">';
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-6 col-xl-5 align-self-center order-2 order-lg-1 text-center text-lg-start mt-40 mt-lg-0">';
        echo '<div class="about-content pe-xl-4 me-xxl-2">';
        if (!empty($settings['title'])) {
            echo '<h2 class="sec-title">' . esc_html($settings['title']) . '</h2>';
        }
        if (!empty($settings['content'])) {
            echo '<p>' . esc_html($settings['content']) . '</p>';
        }
        if (!empty($settings['price'])) {
            echo '<div class="price-touch">' . esc_html__('From Only', 'bizino') . ' <span>' . esc_html($settings['price']) . '</span></div>';
        }
        if (!empty($settings['button_text'])) {
            echo '<a href="' . esc_url($settings['button_link']['url']) . '" class="vs-btn">' . esc_html($settings['button_text']) . '</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="order-1 order-lg-2 col-lg-6 col-xl-7 text-center text-xl-end position-relative">';
        echo '<div class="naved-img" id="naved-slide1">';
        foreach ($settings['choice'] as $data) {
            if (!empty($data['image']['url'])) {
                echo '<div class="transform-banner">';
                echo bizino_img_tag(array(
                    'url' => esc_url($data['image']['url']),
                ));
                echo '</div>';
            }
        }
        echo '</div>';
        echo '<div class="naved-thumb-slide" id="naved-slide2">';
        foreach ($settings['choice'] as $data) {
            if (!empty($data['image']['url'])) {
                echo '<div>';
                echo '<div class="naved-thumb">';
                echo bizino_img_tag(array(
                    'url' => esc_url($data['image']['url']),
                ));
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo '<!-----------------------End Trends Area----------------------->';
    }
}