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
class Bizino_Cta_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinocta';
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
            'image_section',
            [
                'label' => __('Call to action', 'bizino'),
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
                ],
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Company Core Features?', 'bizino'),
            ]
        );
        $this->add_control(
            'section_sub_title',
            [
                'label' => __('Section Sub Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Elaborate your Company Style Grow Up Your Business', 'bizino'),
            ]
        );
        $this->add_control(
            'section_btn',
            [
                'label' => __('Button', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Start A Project', 'bizino'),
            ]
        );
        $this->add_control(
            'section_btn_url',
            [
                'label' => __('Button Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '/contact',
                ],
            ]
        );
        $this->add_control(
            'video_bg_1',
            [
                'label' => __('Video BG 1', 'bizino'),
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
            'video_bg_2',
            [
                'label' => __('Video BG 2', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => '1']
            ]
        );
        $this->add_control(
            'video_shape',
            [
                'label' => __('Video Shape', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => '1']
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => '1']
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
                'condition' => ['layout_styles' => '1']
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => __('Video Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
                ],
                'condition' => [
                        'video_btn' => 'yes',
                        'layout_styles' => '1'
                ]
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
        <section class="position-relative space">
                <div class="cta-bg2" data-bg-src="<?php echo esc_url($settings['video_bg_1']['url']); ?>"></div>
                <div class="cta-bg1" data-bg-src="<?php echo esc_url($settings['video_bg_2']['url']); ?>"></div>
                <div class="cta-shape1 d-none d-xxl-block">
                    <?php
                    if (!empty($settings['video_shape']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['video_shape']['url'])
                        ));
                    }
                    ?>
                </div>
                <div class="container ">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-10 col-lg-8 z-index-common">
                            <span class="sec-subtitle text-white"><?php echo esc_html($settings['section_title']); ?></span>
                            <h2 class="sec-title text-white"><?php echo esc_html($settings['section_sub_title']); ?></h2>
                            <?php if (!empty($settings['section_btn_url']['url'])) { ?>
                                <a href="<?php echo esc_url($settings['section_btn_url']['url']); ?>"
                                   class="vs-btn"><?php echo esc_html($settings['section_btn']); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cta-video">
                        <?php
                        if (!empty($settings['image']['url'])) {
                            echo bizino_img_tag(array(
                                'url' => esc_url($settings['image']['url']),
                                'class' => ''
                            ));
                            if (!empty($settings['video_btn'] == 'yes' && !empty($settings['video_link']['url']))) {
                                echo '<a href="' . esc_url($settings['video_link']['url']) . '" class="play-btn style2 popup-video"><i class="fal fa-play"></i></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php } else {?>
        <section class="position-relative space-top space-bottom">
            <div class="cta-shape2" data-bg-src="<?php echo esc_url($settings['video_bg_1']['url']); ?>"></div>
            <div class="container z-index-common">
                <div class="row align-items-center justify-content-between text-center text-lg-start">
                    <div class="col-lg-8 col-xl-7 mb-30 mb-lg-0">
                        <div class="ps-xxl-5">
                            <span class="sec-subtitle2 text-white"><?php echo esc_html($settings['section_title']); ?></span>
                            <h2 class="sec-title mb-n4 text-white"><?php echo esc_html($settings['section_sub_title']); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-auto col-xl-4">
                        <?php if (!empty($settings['section_btn_url']['url'])) { ?>
                            <a href="<?php echo esc_url($settings['section_btn_url']['url']); ?>"
                               class="vs-btn style2 ms-xl-4"><?php echo esc_html($settings['section_btn']); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Cta_Widget());