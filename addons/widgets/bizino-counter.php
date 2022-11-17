<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Counter Widget .
 *
 */
class Bizino_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinocounter';
    }

    public function get_title()
    {
        return __('Counter', 'bizino');
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
                'label' => __('Counter', 'bizino'),
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
            'bg_image',
            [
                'label' => __('Background image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['title_style' => ['1']]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'counter_number', [
                'label' => __('Counter Number', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('259', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'counter_sub', [
                'label' => __('Counter Number Subscript', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('K', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'counter_title', [
                'label' => __('Counter Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __("Happy client's", 'bizino'),
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
                        'counter_number' => __('259', 'bizino'),
                        'counter_sub' => __('K', 'bizino'),
                        'counter_title' => __("Happy client's", 'bizino'),
                    ],
                    [
                        'counter_number' => __('958', 'bizino'),
                        'counter_sub' => __('M', 'bizino'),
                        'counter_title' => __("Project Complete", 'bizino'),
                    ],
                    [
                        'counter_number' => __('23', 'bizino'),
                        'counter_sub' => __('+', 'bizino'),
                        'counter_title' => __("Years Of Designing", 'bizino'),
                    ],
                    [
                        'counter_number' => __('32', 'bizino'),
                        'counter_sub' => __('+', 'bizino'),
                        'counter_title' => __("Loyal Employees", 'bizino'),
                    ],
                ],
                'title_field' => '{{{ counter_title }}}',
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
            'counter_title_color',
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
                'name' => 'counter_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-counter .counter-text'
            ]
        );

        $this->add_responsive_control(
            'counter_title_margin',
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
            'counter_title_padding',
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
        if ($settings['title_style'] == '1') {

            if (!empty($settings['slides'])) {
                ?>
                <div data-bg-src="<?php echo esc_url($settings['bg_image']['url']); ?>">
                    <div class="row gx-0">
                        <?php
                        foreach ($settings['slides'] as $item) {
                            ?>
                            <div class="col-md-6 col-lg vs-counter">
                                <div class="vs-counter__number">
                                    <span class="amount"><?php echo esc_html($item['counter_number']); ?></span>
                                    <span class="quora"><?php echo esc_html($item['counter_sub']); ?></span>
                                </div>
                                <p class="vs-counter__text"><?php echo esc_html($item['counter_title']); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php
            }
        } else {
            ?>
            <div class="row gx-3 gy-30">
                <?php
                foreach ($settings['slides'] as $item2) {
                    ?>
                    <div class="col-md-4">
                        <div class="team-counter">
                            <div class="team-counter__number">
                                <span class="amount"><?php echo esc_html($item2['counter_number']); ?></span>
                                <span class="quora"><?php echo esc_html($item2['counter_sub']); ?></span>
                            </div>
                            <p class="team-counter__text"><?php echo esc_html($item2['counter_title']); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Counter_Widget());