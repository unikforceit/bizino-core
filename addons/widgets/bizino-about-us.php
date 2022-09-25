<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;
use \Elementor\Repeater;
/**
 *
 * About Us Widget .
 *
 */
class Bizino_AboutUs_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'aboutus';
    }

    public function get_title()
    {
        return __('Bizino About Us', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-editor-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('About Us', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_image',
            [
                'label' => __('About Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'about_image2',
            [
                'label' => __('About Image Two', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'about_subtitle',
            [
                'label' => __('About Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('About Us Subtitle', 'bizino'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'about_title',
            [
                'label' => __('About Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('About Us Title', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_description',
            [
                'label' => __('About Description', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('About Description', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Alines Jakson', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'author_designation',
            [
                'label' => __('Author Designation', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Director, Company CEO', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_sign',
            [
                'label' => __('Sign Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'about_list', [
                'label' => __('About List', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Research your niche and competitors', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => __('Lists', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'about_list' => __('Research your niche and competitors', 'bizino'),
                    ],
                    [
                        'about_list' => __('Create content that gets your business', 'bizino'),
                    ],
                    [
                        'about_list' => __('Drive organic traffic and lead generation.', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ about_list }}}',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------subtitle styling------------------------------------*/

        $this->start_controls_section(
            'subtitle_styling',
            [
                'label' => __('Subtitle Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'about_subtitle_color',
            [
                'label' => __('Subtitle Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'about_subtitle_typography',
                'label' => __('Subtitle Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sub-title'
            ]
        );

        $this->add_responsive_control(
            'about_subtitle_margin',
            [
                'label' => __('Subtitle Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'about_subtitle_padding',
            [
                'label' => __('Subtitle Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'about_title_color',
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
                'name' => 'about_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-title'
            ]
        );

        $this->add_responsive_control(
            'about_title_margin',
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
            'about_title_padding',
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

        /*-----------------------------------------offer styling------------------------------------*/

        $this->start_controls_section(
            'offer_styling',
            [
                'label' => __('Offer Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offer_color',
            [
                'label' => __('Offer Rounded Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer-pill' => '--theme-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'bizino'),
                'selector' => '{{WRAPPER}} .offer-pill::before',
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
            \Elementor\Group_Control_Box_Shadow::get_type(),
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
                    '{{WRAPPER}} .vs-btn::after' => 'background-color: {{VALUE}}!important;',
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
        ?>
        <!--==============================
        About Us
        ==============================-->
        <section class=" space">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-6 mb-40 mb-lg-0">
                        <div class="img-box1">
                            <div class="img-1">
                                <?php
                                if (!empty($settings['about_image']['url'])) {
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($settings['about_image']['url']),
                                    ));
                                }
                                ?>
                            </div>
                            <div class="img-2">
                                <?php
                                if (!empty($settings['about_image2']['url'])) {
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($settings['about_image2']['url']),
                                    ));
                                }
                                ?>
                            </div>
                            <div class="list-box1">
                                <ul>
                                    <?php
                                    foreach ($settings['lists'] as $list) {
                                        ?>
                                        <?php
                                        if (!empty($list['about_list'])) {
                                            echo '<li>' . htmlspecialchars_decode(esc_html($list['about_list'])) . '</li>';
                                        }
                                        ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6  col-xl-5 offset-xl-1 align-self-center">
                        <div class="sec-line"></div>
                        <?php
                        if (!empty($settings['about_subtitle'])) {
                            echo '<span class="sec-subtitle">' . htmlspecialchars_decode(esc_html($settings['about_subtitle'])) . '</span>';
                        }
                        ?>
                        <?php
                        if (!empty($settings['about_title'])) {
                            echo '<h2 class="sec-title">' . htmlspecialchars_decode(esc_html($settings['about_title'])) . '</h2>';
                        }
                        ?>
                        <?php
                        if (!empty($settings['about_description'])) {
                            echo '<p class="mb-xl-4 pb-xl-3 pe-xxl-4">' . htmlspecialchars_decode(esc_html($settings['about_description'])) . '</p>';
                        }
                        ?>
                        <?php
                        if (!empty($settings['author_name'])) {
                            echo '<h3 class="h5 mb-0">' . htmlspecialchars_decode(esc_html($settings['author_name'])) . '</h3>';
                        }
                        ?>
                        <?php
                        if (!empty($settings['author_designation'])) {
                            echo '<span class="d-block mb-3">' . htmlspecialchars_decode(esc_html($settings['author_designation'])) . '</span>';
                        }
                        ?>
                        <div>
                            <?php
                            if (!empty($settings['about_sign']['url'])) {
                                echo bizino_img_tag(array(
                                    'url' => esc_url($settings['about_sign']['url']),
                                ));
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php

    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_AboutUs_Widget());