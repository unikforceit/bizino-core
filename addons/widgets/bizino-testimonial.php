<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Testimonial Slider Widget .
 *
 */
class Bizino_Testimonial_Slider extends Widget_Base
{

    public function get_name()
    {
        return 'bizinotestimonialslider';
    }

    public function get_title()
    {
        return __('Testimonial Slider', 'bizino');
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
            'testimonial_slider_section',
            [
                'label' => __('Testimonial Slider', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'client_image',
            [
                'label' => __('Client Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'testimonial_image_icon',
            [
                'label' => __('Testimonial Image Icon', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'client_name', [
                'label' => __('Client Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Rubaida Kanom', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'client_designation', [
                'label' => __('Client Designation', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Chef Leader', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'client_feedback', [
                'label' => __('Client Feedback', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'rating', [
                'label' => esc_html__('Rating', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__('One Star', 'bizino'),
                    'two' => esc_html__('Two Star', 'bizino'),
                    'three' => esc_html__('Three Star', 'bizino'),
                    'four' => esc_html__('Four Star', 'bizino'),
                    'five' => esc_html__('Five Star', 'bizino'),
                ],
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
                        'client_name' => __('Marko Polo', 'bizino'),
                        'client_feedback' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino'),
                        'client_image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'client_name' => __('Vivi Marian', 'bizino'),
                        'client_feedback' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino'),
                        'client_image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'client_name' => __('Customer', 'bizino'),
                        'client_feedback' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino'),
                        'client_image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => __('Slider Control', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slider_arrows',
            [
                'label' => __('Arrows', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label' => __('Autoplay', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slider_dots',
            [
                'label' => __('Dots', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_general',
            [
                'label' => __('General', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_bg_color',
            [
                'label' => __('Testimonial Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-shape' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'bizino'),
                'selector' => '{{WRAPPER}} .testi-style1 .testi-shape:before',
            ]
        );

        $this->add_control(
            'testimonial_rating_color',
            [
                'label' => __('Testimonial Star Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-rating span:before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_slider_client_name_style_section',
            [
                'label' => __('Client Name', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_slider_client_name_color',
            [
                'label' => __('Client Name Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-author' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_slider_client_name_typography',
                'label' => __('Client Name Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .testi-style1 .testi-author',
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_client_name_margin',
            [
                'label' => __('Client Name Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_client_name_padding',
            [
                'label' => __('Client Name Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_slider_client_feedback_style_section',
            [
                'label' => __('Client Feedback', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_slider_client_feedback_color',
            [
                'label' => __('Client Feedback Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-rating' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_slider_client_feedback_typography',
                'label' => __('Client Feedback Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .testi-style1 .testi-rating',
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_client_feedback_margin',
            [
                'label' => __('Client Feedback Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_client_feedback_padding',
            [
                'label' => __('Client Feedback Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_slider_designation_style_section',
            [
                'label' => __('Designation', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_slider_designation_color',
            [
                'label' => __('Client Designation Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-degi' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_slider_designation_typography',
                'label' => __('Client Designation Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .testi-style1 .testi-degi',
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_designation_margin',
            [
                'label' => __('Client Designation Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_slider_designation_padding',
            [
                'label' => __('Client Designation Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testi-style1 .testi-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Arrow styling------------------------------------*/

        $this->start_controls_section(
            'arrow_styling',
            [
                'label' => __('Arrow Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Arrow Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-arrow' => '--title-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hvr_color',
            [
                'label' => __('Arrow Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-arrow:hover' => '--theme-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();


        $this->add_render_attribute('wrapper', 'id', 'testimonialslide1');
        $this->add_render_attribute('wrapper', 'class', 'testimonial-one vs-carousel');


        $this->add_render_attribute('wrapper', 'class', 'row slider-two vs-carousel');
        if ($settings['slider_dots'] == 'yes') {
            $this->add_render_attribute('wrapper', 'data-slick-dots', 'true');
        } else {
            $this->add_render_attribute('wrapper', 'data-slick-dots', 'false');
        }
        if ($settings['slider_arrows'] == 'yes') {
            $this->add_render_attribute('wrapper', 'data-slick-arrows', 'true');
        } else {
            $this->add_render_attribute('wrapper', 'data-slick-arrows', 'false');
        }
        if ($settings['slider_autoplay'] == 'yes') {
            $this->add_render_attribute('wrapper', 'data-slick-autoplay', 'true');
        } else {
            $this->add_render_attribute('wrapper', 'data-slick-autoplay', 'false');
        }
        if (!empty($settings['slides'])) {
            ?>
            <!--==============================
            Testimonial Area
            ==============================-->
            <section class="testimonial-cs">
                <?php if ($settings['slider_arrows'] == 'yes') { ?>
                    <div class="d-flex gap-2 d-none d-xl-block testimonial-nav-cs">
                        <button class="icon-btn style3" data-slick-prev="#testId"><i
                                    class="fal fa-long-arrow-left"></i></button>
                        <button class="icon-btn style3" data-slick-next="#testId"><i
                                    class="fal fa-long-arrow-right"></i></button>
                    </div>
                <?php } ?>
                <div class="testi-style1">
                    <div class="testi-avater vs-slider-tab" data-asnavfor="#testId">
                        <?php
                        $loop = 0;
                        foreach ($settings['slides'] as $singleslide) {
                            $loop++;
                            if ($loop == 1) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                            ?>
                            <button class="tab-btn <?php echo esc_attr($active); ?>">
                                <?php
                                if (!empty($singleslide['client_image']['url'])) {
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($singleslide['client_image']['url']),
                                    ));
                                }
                                ?>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="testi-shape" data-bg-src="assets/img/bg/testi-bg-1-1.jpg"></div>
                    <div class="vs-carousel" id="testId" data-slide-show="1" data-fade="true">
                        <?php foreach ($settings['slides'] as $singleslide) { ?>
                            <div>
                                <div class="testi-quote">
                                    <?php
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($singleslide['testimonial_image_icon']['url'])
                                    ));
                                    ?>
                                </div>
                                <?php
                                if (!empty($singleslide['client_feedback'])) {
                                    echo '<p class="testi-text">' . wp_kses_post($singleslide['client_feedback']) . '</p>';
                                }
                                if (!empty($singleslide['client_name'])) {
                                    echo '<h3 class="testi-author h4">' . esc_html($singleslide['client_name']) . '</h3>';
                                }
                                if (!empty($singleslide['client_designation'])) {
                                    echo '<span class="testi-degi">' . esc_html($singleslide['client_designation']) . '</span>';
                                }
                                ?>
                                <div class="testi-rating">
                                    <?php
                                    if ($singleslide['rating'] == 'one') {
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                    } elseif ($singleslide['rating'] == 'two') {
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                    } elseif ($singleslide['rating'] == 'three') {
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                    } elseif ($singleslide['rating'] == 'four') {
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="far fa-star"></i>';
                                    } else {
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Testimonial_Slider());