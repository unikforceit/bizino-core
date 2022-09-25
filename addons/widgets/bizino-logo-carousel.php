<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Logo Carousel Widget .
 *
 */
class Bizino_Logo_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'bizinologocarousel';
    }

    public function get_title()
    {
        return __('Logo Carousel', 'bizino');
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
            'logocarousel_section',
            [
                'label' => __('Logo Carousel', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo_style',
            [
                'label' => __('Logo Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'logocarousel_image',
            [
                'label' => __('Logo Carousel image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'image_url', [
                'label' => __('Title Url?', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('#', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'awards_title', [
                'label' => __('Awards Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
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
                        'logocarousel_image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'logocarousel_image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'logocarousel_image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'title_field' => '{{{ image_url }}}',
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
                    'size' => 5,
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'row vs-carousel text-center');

        $this->add_render_attribute('wrapper', 'data-slide-to-show', $settings['slide_to_show']['size']);
        $this->add_render_attribute('wrapper', 'data-slick-arrows', 'false');
        if ($settings['logo_style'] == '1') {
            ?>
            <?php
            if (!empty($settings['slides'])) {
                echo '<div class="vs-brand-wrapper">';
                echo '<div class="container">';
                echo '<div ' . $this->get_render_attribute_string('wrapper') . '>';
                foreach ($settings['slides'] as $single_data) {
                    echo '<div class="col-auto">';
                    echo '<div class="awards-box">';
                    echo '<div class="awards-img">';
                    echo '<a href="' . esc_url(esc_url($single_data['image_url'])) . '" class="icon-thumb">';
                    echo bizino_img_tag(array(
                        'url' => esc_url($single_data['logocarousel_image']['url']),
                    ));
                    echo '</a>';
                    echo '</div>';
                    if (!empty($single_data['awards_title'])) {
                        echo '<h3 class="awards-title">' . esc_html($single_data['awards_title']) . '</h3>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            ?>
            <div class=" space">
                <div class="container">
                    <div class="row vs-carousel text-center" data-slide-show="5" data-md-slide-show="3"
                         data-sm-slide-show="2">
                        <?php
                        foreach ($settings['slides'] as $single_data) {
                            ?>
                            <div class="col">
                                <?php echo bizino_img_tag(array(
                                    'url' => esc_url($single_data['logocarousel_image']['url']),
                                )); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Logo_Carousel());