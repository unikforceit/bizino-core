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
class Bizino_Work_Approach_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoworkapproach';
    }

    public function get_title()
    {
        return __('Work Approach', 'bizino');
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
                'label' => __('Work Approach', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Background image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'work_number', [
                'label' => __('Work Step', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('01', 'bizino'),
                'label_block' => true,
            ]
        );
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
            'work_title', [
                'label' => __('Counter Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __("Select For Your Service", 'bizino'),
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
                        'work_number' => __('01', 'bizino'),
                        'work_title' => __("Select For Your Service", 'bizino'),
                    ],
                    [
                        'work_number' => __('02', 'bizino'),
                        'work_title' => __("Started Your Service", 'bizino'),
                    ],
                    [
                        'work_number' => __('03', 'bizino'),
                        'work_title' => __("Analysis Your Project", 'bizino'),
                    ],
                    [
                        'work_number' => __('04', 'bizino'),
                        'work_title' => __("Get Final Results", 'bizino'),
                    ],
                ],
                'title_field' => '{{{ work_title }}}',
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
            'work_title_color',
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
                'name' => 'work_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-counter .counter-text'
            ]
        );

        $this->add_responsive_control(
            'work_title_margin',
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
            'work_title_padding',
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
            'work_number_color',
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
                'name' => 'work_number_typography',
                'label' => __('Counter Number Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-counter .counter-number'
            ]
        );

        $this->add_responsive_control(
            'work_number_margin',
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
            'work_number_padding',
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
            <div class="process-shape1 d-none d-lg-block"><img src="<?php echo esc_url($settings['bg_image']['url']); ?>" alt="shape"></div>
            <div class="row justify-content-between">
                <?php
                foreach ($settings['slides'] as $item) {
                    ?>
                <div class="col-md-6 col-lg-auto process-style1">
                    <div class="process-body">
                        <div class="process-shape"></div>
                        <div class="process-number"><?php echo esc_html($item['work_number']); ?></div>
                        <div class="process-icon"><img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="icon"></div>
                        <p class="process-text"><?php echo esc_html($item['work_title']); ?></p>
                    </div>
                </div>
        <?php } ?>
            </div>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Work_Approach_Widget());