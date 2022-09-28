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
                    '3' => __('Style Three', 'bizino'),
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
        $repeater->add_control(
            'instagram_link',
            [
                'label' => __('Instagram Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('www.example.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
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
            if (!empty($settings['slides'])) {
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
        } elseif ($settings['logo_style'] == '2') {
            if (!empty($settings['slides'])) {
                ?>
                <div class=" space-bottom">
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
        } else {
            if (!empty($settings['slides'])) {
                ?>
                <footer class="footer-wrapper footer-layout3">
                    <!--==============================
                Gallery Area
                ==============================-->
                    <div class="container  " data-sec-pos="bottom-half" data-pos-for=".copyright-wrap">
                        <div class="row vs-carousel" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4">
                            <?php
                            foreach ($settings['slides'] as $single_data) {
                                ?>
                                <div class="col-xl-2">
                                    <div class="gallery-style2">
                                        <div class="gallery-img">
                                            <?php
                                            echo bizino_img_tag(array(
                                                'url' => esc_url($single_data['logocarousel_image']['url']),
                                            ));
                                            ?>
                                            <div class="gallery-overlay"></div>
                                            <a href="<?php echo esc_url($single_data['instagram_link']['url']); ?>"
                                               class="gallery-icon popup-image">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </footer> <!-- Scroll To Top -->
                <?php
            }
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Logo_Carousel());