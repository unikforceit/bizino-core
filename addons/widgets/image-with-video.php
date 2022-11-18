<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Image with Video Widget .
 *
 */
class Bizino_Image_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoimage';
    }

    public function get_title()
    {
        return __('Bizino Image with Video', 'bizino');
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
                'label' => __('Image', 'bizino'),
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
            ]
        );
        $this->add_control(
            'image2',
            [
                'label' => __('Choose Image 2', 'bizino'),
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
            'video_btn',
            [
                'label' => __('Video Button', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'no',
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
            <?php } else {?>
            <div class="img-box3">
                <div class="img-1">
                    <?php
                    if (!empty($settings['image2']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['image2']['url']),
                            'class' => ''
                        ));
                    }
                    ?>
                </div>
                <div class="img-2">
                    <?php
                    if (!empty($settings['image']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['image']['url']),
                            'class' => ''
                        ));
                        if (!empty($settings['video_btn'] == 'yes' && !empty($settings['video_link']['url']))) {
                            echo '<a href="' . esc_url($settings['video_link']['url']) . '" class="play-btn style2 popup-video position-center"><i class="fal fa-play"></i></a>';
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Image_Widget());