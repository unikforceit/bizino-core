<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Widget_Base;

/**
 *
 * Section Title Widget .
 *
 */
class Bizino_Section_Title_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinosectiontitle';
    }

    public function get_title()
    {
        return __('Section Title', 'bizino');
    }

    public function get_icon()
    {
        return 'fa fa-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title_section',
            [
                'label' => __('Section Title', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_style',
            [
                'label' => __('Title Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'line_switch',
            [
                'label' => __('Line Button', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('One Of The Best Business Advice Agency...', 'bizino'),
                'condition' => ['title_style' => ['1', '2']]
            ]
        );
        $this->add_control(
            'section_title_tag',
            [
                'label' => __('Title Tag', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default' => 'h2',
                'condition' => ['title_style' => ['1', '2']]
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Best Company of the year Awarded', 'bizino'),
                'condition' => ['title_style' => ['1', '2']]
            ]
        );

        $this->add_control(
            'section_subtitle_tag',
            [
                'label' => __('Subitle Tag', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'p' => 'P',
                    'span' => 'span',
                ],
                'default' => 'span',
                'condition' => ['section_subtitle!' => '']
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Section Description', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('In today’s world, building a business also means you’ll need a strong
                website and social media presence. These can help you learn your customers better. With them, you can
                even request customers’ email addresses so you can reach them directly...', 'bizino'),
                'condition' => ['title_style' => ['1', '2']]
            ]
        );

        $this->add_responsive_control(
            'section_title_align',
            [
                'label' => __('Alignment', 'bizino'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bizino'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bizino'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bizino'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .title-area, {{WRAPPER}} .section-title-cs' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();
//        Styling section

        $this->start_controls_section(
            'section_title_style_section',
            [
                'label' => __('Section Title Style', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_line_color',
            [
                'label' => __('Section Top Line Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-line' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'line_switch!' => ''
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label' => __('Section Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'label' => __('Section Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-title',
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'section_title_margin',
            [
                'label' => __('Section Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'section_title_padding',
            [
                'label' => __('Section Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-title',
                'condition' => [
                    'section_title!' => ''
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'section_subtitle_color',
            [
                'label' => __('Section Subtitle Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-subtitle' => 'color: {{VALUE}}!important',
                ],
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_subtitle_typography',
                'label' => __('Section Subtitle Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-subtitle',
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_margin',
            [
                'label' => __('Section Subtitle Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_padding',
            [
                'label' => __('Section Subtitle Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!' => ''
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'section_description_color',
            [
                'label' => __('Section Description Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mb-xl-4.pb-xl-3.pe-xxl-4' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_description_typography',
                'label' => __('Section Description Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .mb-xl-4.pb-xl-3.pe-xxl-4',
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_description_margin',
            [
                'label' => __('Section Description Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .mb-xl-4.pb-xl-3.pe-xxl-4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_description_padding',
            [
                'label' => __('Section Description Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_description!' => ''
                ],
                'separator' => 'after'
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'section-title');

        if ($settings['title_style'] == '1') {
            ?>
            <!--    Title Style 1        -->
            <div class="section-title-cs">
                <?php
                if (!empty($settings['line_switch'] == 'yes')) {
                    echo '<div class="sec-line"></div>';
                }
                ?>

                <?php
                if (!empty($settings['section_subtitle'])) {
                    echo '<' . esc_attr($settings['section_subtitle_tag']) . ' class="sec-subtitle">' . wp_kses_post($settings['section_subtitle']) . '</' . esc_attr($settings['section_subtitle_tag']) . '>';
                }
                ?>
                <?php
                if (!empty($settings['section_title'])) {
                    echo '<' . esc_attr($settings['section_title_tag']) . ' class="sec-title">' . wp_kses_post($settings['section_title']) . '</' . esc_attr($settings['section_title_tag']) . '>';
                }
                ?>
                <?php
                if (!empty($settings['section_description'])) {
                    echo bizino_paragraph_tag(array(
                        'text' => wp_kses_post($settings['section_description']),
                        'class' => 'mb-xl-4 pb-xl-3 pe-xxl-4'
                    ));
                }
                ?>
            </div>
            <?php
        } else {
            ?>
            <!--    Title Style 2        -->
            <div class="title-area">
                <?php
                if (!empty($settings['line_switch'] == 'yes')) {
                    echo '<div class="sec-pills">
                    <div class="pill"></div>
                    <div class="pill"></div>
                    <div class="pill"></div>
                </div>';
                }
                ?>
                <?php
                if (!empty($settings['section_subtitle'])) {
                    echo '<' . esc_attr($settings['section_subtitle_tag']) . ' class="sec-subtitle">' . wp_kses_post($settings['section_subtitle']) . '</' . esc_attr($settings['section_subtitle_tag']) . '>';
                }
                ?>
                <?php
                if (!empty($settings['section_title'])) {
                    echo '<' . esc_attr($settings['section_title_tag']) . ' class="sec-title">' . wp_kses_post($settings['section_title']) . '</' . esc_attr($settings['section_title_tag']) . '>';
                }
                ?>
            </div>

            <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Section_Title_Widget());