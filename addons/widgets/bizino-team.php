<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;

/**
 *
 * Team Widget .
 *
 */
class Bizino_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoteammember';
    }

    public function get_title()
    {
        return __('Bizino Team', 'bizino');
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
            'team_style',
            [
                'label' => __('Team Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );

        /*-----------------------------------------style 1 Control ------------------------------------*/

        $repeater = new Repeater();

        $repeater->add_control(
            'name', [
                'label' => __('Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'designation', [
                'label' => __('Designation', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Customer', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'phone', [
                'label' => __('Contact Number', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Customer', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'profile_link',
            [
                'label' => esc_html__('Link', 'bizino'),
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
        $repeater->add_control(
            'team_image',
            [
                'label' => esc_html__('Team Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'fb_link',
            [
                'label' => esc_html__('Facebook Link', 'bizino'),
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
        $repeater->add_control(
            'twitter_link',
            [
                'label' => esc_html__('Twitter Link', 'bizino'),
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
        $repeater->add_control(
            'google_link',
            [
                'label' => esc_html__('Google Link', 'bizino'),
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
            'team_members',
            [
                'label' => __('Team Member', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Your Name', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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
            'slide_to_show',
            [
                'label' => __('Slide To Show', 'bizino'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 4,
                ],
            ]
        );
        $this->add_control(
            'slide_lg_to_show',
            [
                'label' => __('Slide Md To Show', 'bizino'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
            ]
        );
        $this->add_control(
            'slide_md_to_show',
            [
                'label' => __('Slide Sm To Show', 'bizino'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
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
        if ($settings['team_style'] == '1') {
            $this->add_render_attribute('wrapper', 'class', 'row team-wrap1 vs-carousel');
        } else {
            $this->add_render_attribute('wrapper', 'class', 'row vs-carousel');
        }

        $this->add_render_attribute('wrapper', 'data-slide-show', $settings['slide_to_show']['size']);
        if ($settings['team_style'] == '1') {
            $this->add_render_attribute('wrapper', 'data-lg-slide-show', $settings['slide_lg_to_show']['size']);
        }
        $this->add_render_attribute('wrapper', 'data-md-slide-show', $settings['slide_md_to_show']['size']);
        if ($settings['team_style'] == '1') {
            ?>
            <!--==============================
            Team Area
            ==============================-->
            <section class="team-cs">
                <?php echo '<div '.$this->get_render_attribute_string('wrapper').'>';?>
                    <?php
                    foreach ($settings['team_members'] as $data) {
                        $link = $data['profile_link']['url'] ? $data['profile_link']['url'] : '#';
                        $mobile = $data['phone'];

                        $replace = array(' ', '-', ' - ');
                        $with = array('', '', '');
                        $mobileurl = str_replace($replace, $with, $mobile);
                        ?>
                        <div class="col-xl-3 team-zigzag">
                            <div class="team-style1">
                                <?php
                                if (!empty($data['team_image']['url'])) {
                                    echo '<div class="team-img">
                                                <a class="text-inherit" href="' . esc_url($link) . '">';
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($data['team_image']['url']),
                                        'class' => '',
                                    ));
                                    echo '</a>
                                            </div>';
                                }
                                ?>
                                <div class="team-content">
                                    <?php
                                    if (!empty($data['name'])) {
                                        echo '<h3 class="team-name h5"><a class="text-inherit" href="' . esc_url($link) . '">' . esc_html($data['name']) . '</a></h3>';
                                    }
                                    if (!empty($data['designation'])) {
                                        echo '<p class="team-degi">' . esc_html($data['designation']) . '</p>';
                                    }
                                    if (!empty($mobile)) {
                                        echo '<a href="' . esc_attr('tel:' . $mobileurl) . '" class="team-number">' . bizino_img_tag(array(
                                                'url' => esc_url($settings['contact_phone_img']['url']),
                                                'class' => '',
                                            )) . '' . esc_html($mobile) . '</a>';
                                    }
                                    ?>
                                </div>
                                <div class="team-social">
                                    <?php
                                    if (!empty($data['twitter_link']['url'])) {
                                        echo '<a href="' . esc_url($data['twitter_link']['url']) . '"><i class="fab fa-twitter"></i></a>';
                                    }
                                    if (!empty($data['google_link']['url'])) {
                                        echo '<a href="' . esc_url($data['google_link']['url']) . '"><i class="fab fa-google"></i></a>';
                                    }
                                    if (!empty($data['fb_link']['url'])) {
                                        echo '<a href="' . esc_url($data['fb_link']['url']) . '"><i class="fab fa-facebook-f"></i></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php
        } else {
            ?>
            <!--==============================
           Team Area
           ==============================-->
            <section class="team2-cs">
                <?php echo '<div '.$this->get_render_attribute_string('wrapper').'>';?>
                    <?php
                    foreach ($settings['team_members'] as $data) {
                        $link = $data['profile_link']['url'] ? $data['profile_link']['url'] : '#';
                        $mobile = $data['phone'];

                        $replace = array(' ', '-', ' - ');
                        $with = array('', '', '');
                        $mobileurl = str_replace($replace, $with, $mobile);
                        ?>
                        <div class="col-xl-4">
                            <div class="team-style2">
                                <?php
                                if (!empty($data['team_image']['url'])) {
                                    echo '<div class="team-img">
                                                <a href="' . esc_url($link) . '">';
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($data['team_image']['url']),
                                        'class' => '',
                                    ));
                                    echo '</a>
                                            </div>';
                                }
                                ?>
                                <div class="team-content">
                                    <?php
                                    if (!empty($data['designation'])) {
                                        echo '<p class="team-degi">' . esc_html($data['designation']) . '</p>';
                                    }
                                    if (!empty($data['name'])) {
                                        echo '<h3 class="team-name"><a class="text-inherit" href="' . esc_url($link) . '">' . esc_html($data['name']) . '</a></h3>';
                                    }
                                    if (!empty($mobile)) {
                                        echo '<div class="team-number"><a href="' . esc_attr('tel:' . $mobileurl) . '">' . bizino_img_tag(array(
                                                'url' => esc_url($settings['contact_phone_img']['url']),
                                                'class' => '',
                                            )) . '' . esc_html($mobile) . '</a></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Team_Widget());