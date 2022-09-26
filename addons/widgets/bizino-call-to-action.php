<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;

/**
 *
 * Image with Video Widget .
 *
 */
class Bizino_Call_To_Action_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinocalltoaction';
    }

    public function get_title()
    {
        return __('Bizino Call To Action', 'bizino');
    }


    public function get_icon()
    {
        return 'eicon-image-hotspot';
    }


    public function get_categories()
    {
        return ['bizino'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'general_section',
            [
                'label' => __('General', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_styles',
            [
                'label' => __('Layout Styles', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                    '3' => __('Style Three', 'bizino'),
                    '4' => __('Style Four', 'bizino'),
                    '5' => __('Style Five', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'image_bg',
            [
                'label' => __('Choose Background Image', 'bizino'),
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
            'image_bg2',
            [
                'label' => __('Choose Background Image 2', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1', '2']]
            ]
        );
        $this->add_control(
            'image_bg3',
            [
                'label' => __('Choose Shape Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1', '2']]
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('COMPANY CORE FEATURES?', 'bizino'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Elaborate your Company Style Grow Up Your Business', 'bizino'),
            ]
        );
        $this->add_control(
            'text',
            [
                'label' => __('Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Once you know who your target customers are, conduct surveys and talk to people directly to gain more feedback.', 'bizino'),
                'condition' => ['layout_styles' => ['2']]
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => __('Button', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Start A Project', 'bizino'),
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => __('Button Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('www.example.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'video_img',
            [
                'label' => __('Choose Video Background Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'video_btn',
            [
                'label' => __('Video Button', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'video_link',
            [
                'label' => __('Video Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => ['video_btn' => 'yes']
            ]
        );

        $this->end_controls_section();


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
        if ($settings['layout_styles'] == '1') {
            ?>
            <!--==============================
            Call To Action
            ==============================-->
            <section class="position-relative space">
                <div class="cta-bg2" data-bg-src="<?php echo esc_url($settings['image_bg']['url']); ?>"></div>
                <div class="cta-bg1" data-bg-src="<?php echo esc_url($settings['image_bg2']['url']); ?>"></div>
                <div class="cta-shape1 d-none d-xxl-block">
                    <?php
                    if (!empty($settings['image_bg3']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['image_bg3']['url']),
                        ));
                    }
                    ?>
                </div>
                <div class="container ">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-10 col-lg-8 z-index-common">
                            <?php
                            if (!empty($list['subtitle'])) {
                                echo '<span class="sec-subtitle text-white">' . htmlspecialchars_decode(esc_html($list['subtitle'])) . '</span>';
                            }
                            ?>
                            <?php
                            if (!empty($list['title'])) {
                                echo '<h2 class="sec-title text-white">' . htmlspecialchars_decode(esc_html($list['title'])) . '</h2>';
                            }
                            ?>
                            <?php
                            if (!empty($settings['btn'])) {
                                echo '<a href="' . esc_url($settings['btn_link']['url']) . '" class="vs-btn">' . htmlspecialchars_decode(esc_html($settings['btn'])) . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="cta-video">
                        <?php
                        if (!empty($settings['video_img']['url'])) {
                            echo bizino_img_tag(array(
                                'url' => esc_url($settings['video_img']['url']),
                            ));
                            if (!empty($settings['video_btn'] == 'yes' && !empty($settings['video_link']['url']))) {
                                echo '<a href="' . esc_url($settings['video_link']['url']) . '" class="play-btn style2 popup-video"><i class="fas fa-play"></i></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        } elseif ($settings['layout_styles'] == '2') {
            ?>
            <!--==============================
            Newsleter Area
            ==============================-->
            <section class="position-relative  " data-sec-pos="bottom" data-pos-amount="218px" data-pos-for="#blog2">
                <div class="newsletter-bg1" data-bg-src="<?php echo esc_url($settings['image_bg']['url']); ?>">"></div>
                <div class="container">
                    <div class="row flex-row-reverse text-center text-lg-start">
                        <div class="col-lg-6 col-xl-auto">
                            <div class="img-box2">
                                <?php
                                if (!empty($settings['image_bg2']['url'])) {
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($settings['image_bg2']['url']),
                                    ));
                                }
                                ?>
                                <div class="img-2">
                                    <?php
                                    if (!empty($settings['image_bg3']['url'])) {
                                        echo bizino_img_tag(array(
                                            'url' => esc_url($settings['image_bg3']['url']),
                                        ));
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl z-index-common align-self-center">
                            <div class="newsletter-inner1">
                                <?php
                                if (!empty($list['title'])) {
                                    echo '<h2 class="sec-title text-white mb-2 pb-1">' . htmlspecialchars_decode(esc_html($list['title'])) . '</h2>';
                                }
                                ?>
                                <?php
                                if (!empty($list['text'])) {

                                    echo '<p class="fs-md text-white mb-4 pb-3">' . htmlspecialchars_decode(esc_html($list['text'])) . '</p>';
                                }
                                ?>
                                <form action="#" class="newsletter-style2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                        <button class="vs-btn style2"><i class="fal fa-envelope-open-text"></i>Subscribe
                                            Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        } elseif ($settings['layout_styles'] == '3') {
            echo '<div class="image-scale-hover">';
            if (!empty($settings['image']['url'])) {
                echo bizino_img_tag(array(
                    'url' => esc_url($settings['image']['url']),
                    'class' => 'w-100'
                ));
                if (!empty($settings['video_btn'] == 'yes' && !empty($settings['video_link']['url']))) {
                    echo '<a href="' . esc_url($settings['video_link']['url']) . '" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
                }
            }
            echo '</div>';
        } else {
            echo '<div class="team-details-shape mask-cover" data-mask-src="' . esc_url(plugins_url('images/team-mask-2.png', __FILE__)) . '"></div>';
            echo '<div class="team-img mask-cover" data-mask-src="' . esc_url(plugins_url('images/team-mask-2.png', __FILE__)) . '">';
            if (!empty($settings['image']['url'])) {
                echo bizino_img_tag(array(
                    'url' => esc_url($settings['image']['url']),
                    'class' => 'w-100'
                ));
                if (!empty($settings['video_btn'] == 'yes' && !empty($settings['video_link']['url']))) {
                    echo '<a href="' . esc_url($settings['video_link']['url']) . '" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
                }
            }
            echo '</div>';
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Call_To_Action_Widget());