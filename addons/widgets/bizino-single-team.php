<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Team Widget .
 *
 */
class Bizino_Single_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinosingleteam';
    }

    public function get_title()
    {
        return __('Bizino Single Team', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-user-circle-o';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'team_content',
            [
                'label' => __('Team', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => esc_html__('Team Member Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_link',
            [
                'label' => esc_html__('Image Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
        $this->add_control(
            'designation', [
                'label' => __('Designation', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('CEO & Founder', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'name', [
                'label' => __('Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Romina Roman', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title_link',
            [
                'label' => esc_html__('Title Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
        $this->add_control(
            'icon_image',
            [
                'label' => esc_html__('Phone Icon Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'phone_text', [
                'label' => __('Phone Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('call me:', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'phone_no',
            [
                'label' => esc_html__('Phone Number', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+89 (0) 1256 2156', 'bizino'),
            ]
        );
        $this->add_control(
            'phone_link',
            [
                'label' => esc_html__('Phone Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
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
                    '{{WRAPPER}} .team-grid::before' => 'background-color: {{VALUE}}!important;',
                    '{{WRAPPER}} .team-grid::after' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(

            'contact_phone_img',

            [
                'label' => __('Phone Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
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
            'title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_hvr_color',
            [
                'label' => __('Title Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-inherit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .text-inherit'
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .text-inherit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .text-inherit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------designation styling------------------------------------*/

        $this->start_controls_section(
            'degi_styling',
            [
                'label' => __('Designation Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'degi_color',
            [
                'label' => __('Designation Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-degi' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'degi_hvr_color',
            [
                'label' => __('Designation Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-degi:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'degi_typography',
                'label' => __('Designation Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .team-degi'
            ]
        );

        $this->add_responsive_control(
            'degi_margin',
            [
                'label' => __('Designation Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'degi_padding',
            [
                'label' => __('Designation Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------contact styling------------------------------------*/

        $this->start_controls_section(
            'contact_styling',
            [
                'label' => __('Contact Number Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_color',
            [
                'label' => __('Contact Number Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'contact_hvr_color',
            [
                'label' => __('Contact Number Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-number:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .text-inherit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contact_typography',
                'label' => __('Contact Number Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .team-number'
            ]
        );

        $this->add_responsive_control(
            'contact_margin',
            [
                'label' => __('Contact Number Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_padding',
            [
                'label' => __('Contact Number Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
        <div class="team-style2 layout2">
            <div class="team-img">
                <a href="<?php echo esc_url($settings['image_link']['url']); ?>">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="Team image">
                </a>
            </div>
            <div class="team-content">
                <p class="team-degi"><?php echo esc_html($settings['designation']); ?></p>
                <h3 class="team-name">
                    <a href="<?php echo esc_url($settings['title_link']['url']); ?>"
                       class="text-inherit"><?php echo esc_html($settings['name']); ?></a>
                </h3>
                <div class="team-number">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="image">
                    <?php echo esc_html($settings['phone_text']); ?>
                    <a href="<?php echo esc_url($settings['phone_link']['url']); ?>"><?php echo esc_html($settings['phone_no']); ?></a>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Single_Team_Widget());