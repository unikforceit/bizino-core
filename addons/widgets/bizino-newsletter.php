<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 *
 * Newsletter Widget .
 *
 */
class Bizino_Newsletter extends Widget_Base
{

    public function get_name()
    {
        return 'bizinonewsletterform';
    }

    public function get_title()
    {
        return __('Newsletter', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-mail';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'newsletter_content',
            [
                'label' => __('Newsletter', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'newsletter_style',
            [
                'label' => __('Newsletter Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => __('Style One', 'bizino'),
                    'two' => __('Style Two', 'bizino'),
                    'three' => __('Style Three', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('SUBSCRIBE TO NEWSLETTER', 'bizino'),
            ]
        );
        $this->add_control(
            'section_info',
            [
                'label' => __('Section Info', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Subscribe and get latest news and updates.', 'bizino'),
            ]
        );
        $this->add_control(
            'subscribe_btn',
            [
                'label' => __('Button', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Subscribe', 'bizino'),
            ]
        );

        $this->add_control(
            'newsletter_placeholder',
            [
                'label' => __('Newsletter Placeholder Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Enter Your Email', 'bizino'),
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
            'title_styling',
            [
                'label' => __('Title Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['newsletter_style' => 'one']
            ]
        );

        $this->add_control(
            'newsletter_title_color',
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
                'name' => 'newsletter_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-title',
            ]
        );

        $this->add_responsive_control(
            'newsletter_title_margin',
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
            'newsletter_title_padding',
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

        /*-----------------------------------------Content styling------------------------------------*/

        $this->start_controls_section(
            'content_styling',
            [
                'label' => __('Content Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['newsletter_style' => 'one']
            ]
        );

        $this->add_control(
            'newsletter_content_color',
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
                'name' => 'newsletter_content_typography',
                'label' => __('Content Typography', 'bizino'),
                'selector' => '{{WRAPPER}} p',
            ]
        );

        $this->add_responsive_control(
            'newsletter_content_margin',
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
            'newsletter_content_padding',
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

        /*-----------------------------------------newsletter styling------------------------------------*/

        $this->start_controls_section(
            'newsletter_styling',
            [
                'label' => __('Subscribe Box Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['newsletter_style' => 'one']
            ]
        );

        $this->add_control(
            'box_color',
            [
                'label' => __('Box Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe-box input' => 'background-color: {{VALUE}}!important;',

                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe-box button' => '--theme-color: {{VALUE}};',

                ],
            ]
        );
        $this->end_controls_section();


        /*-----------------------------------------play Button styling------------------------------------*/

        $this->start_controls_section(
            'video_btn_style_section',
            [
                'label' => __('Video Button Style', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['video_btn' => 'yes']
            ]
        );

        $this->add_control(
            'video_btn_color',
            [
                'label' => __('Video Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_hover_color',
            [
                'label' => __('Video Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_background_color',
            [
                'label' => __('Video Button Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_background_hover_color',
            [
                'label' => __('Video Button Background Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_ripple_effect_color',
            [
                'label' => __('Video Button Ripple Effect Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo '<!-----------------------Start Newslatter Area----------------------->';
        if ($settings['newsletter_style'] == 'one') {
            ?>
            <form action="#" class="subscribe-us">
                <div class="newsletter-style1">
                    <div class="form-group text-center">
                        <input type="email" placeholder="<?php echo esc_attr($settings['newsletter_placeholder']); ?>">
                        <button class="vs-btn"><?php echo esc_html($settings['subscribe_btn']); ?></button>
                    </div>
                </div>
            </form>
            <?php
        } elseif ($settings['newsletter_style'] == 'two') {
            ?>
            <form action="#" class="subscribe-us">
                <div class="newsletter-inner1 text-center">
                    <div class="newsletter-style2">
                        <div class="form-group">
                            <input type="email" class="form-control"
                                   placeholder="<?php echo esc_attr($settings['newsletter_placeholder']); ?>">
                            <button class="vs-btn style2"><i
                                        class="fal fa-envelope-open-text"></i><?php echo esc_html($settings['subscribe_btn']); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else {
            ?>
            <form action="#" class="subscribe-us">
                <div class="newsletter-form"><input type="email" placeholder="<?php echo esc_attr($settings['newsletter_placeholder']); ?>">
                    <button type="submit" class="vs-btn"><?php echo esc_html($settings['subscribe_btn']); ?></button>
                </div>
            </form>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Newsletter());