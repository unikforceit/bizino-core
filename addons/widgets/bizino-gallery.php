<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;

/**
 *
 * Gallery Widget .
 *
 */
class Bizino_Gallery extends Widget_Base
{

    public function get_name()
    {
        return 'bizinogallery';
    }

    public function get_title()
    {
        return __('Bizino Gallery', 'bizino');
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
            'gallery_section',
            [
                'label' => __('Gallery', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'gallery_image',
            [
                'label' => __('Gallery image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'gallery_image_url', [
                'label' => __('Gallery Image Url', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_title', [
                'label' => __('Main Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Branding Marketing', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_url', [
                'label' => __('Main Title Url 1', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_title2', [
                'label' => __('Title 2', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Support', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_url2', [
                'label' => __('Title Url 2', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_title3', [
                'label' => __('Title 3', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Research', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image_url3', [
                'label' => __('Title Url 3', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
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
                        'image_title' => __('Branding Marketing', 'bizino'),
                    ],
                    [
                        'image_title' => __('Creative Marketing', 'bizino'),
                    ],
                    [
                        'image_title' => __('Web Development', 'bizino'),
                    ],
                    [
                        'image_title' => __('Expert Consultations', 'bizino'),
                    ],
                    [
                        'image_title' => __('SEO Optimization', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ image_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_general',
            [
                'label' => __('General', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_bg_color',
            [
                'label' => __('Overlay bg Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-gallery-box .gallery-img:after,{{WRAPPER}} .vs-gallery-box .gallery-img:before,{{WRAPPER}} .gallery-thumb:after,{{WRAPPER}} .gallery-thumb:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_title_style_section',
            [
                'label' => __('Title', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['gallery_style' => '1']
            ]
        );

        $this->add_control(
            'gallery_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-gallery-box .gallery-title' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-gallery-box .gallery-title',
            ]
        );

        $this->add_responsive_control(
            'gallery_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-gallery-box .gallery-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gallery_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-gallery-box .gallery-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if (!empty($settings['slides'])) {
                ?>
                <!--==============================
                Gallery Area
                ==============================-->
                <section class=" space-top space-extra-bottom">
                    <div class="container">
                        <div class="row justify-content-between text-center text-lg-start">
                            <div class="col-lg-auto">
                                <div class="title-area">
                                    <h2 class="sec-title mb-2 pb-1">Effective Case Studies</h2>
                                    <p class="fs-md">power of choice is untrammelled and when nothing prevents</p>
                                </div>
                            </div>
                            <div class="col-lg-auto mb-20 mb-lg-0">
                                <div class="sec-btn">
                                    <button data-slick-prev="#galslide1" class="icon-btn style6"><i
                                                class="far fa-long-arrow-left"></i></button>
                                    <button data-slick-next="#galslide1" class="icon-btn style6"><i
                                                class="far fa-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container container-style1">
                        <div class="row gx-70 vs-carousel gallery-zigzag" id="galslide1" data-slide-show="3"
                             data-xs-slide-show="2" data-dots="true" data-variable-width="true">
                            <?php
                            foreach ($settings['slides'] as $item) {
                                ?>
                                <div class="col-auto">
                                    <div class="gallery-style1">
                                        <div class="gallery-img">
                                            <a href="<?php echo esc_url($item['gallery_image_url']['url']); ?>">
                                                <?php
                                                if (!empty($item['gallery_image']['url'])) {
                                                    echo bizino_img_tag(array(
                                                        'url' => esc_url($item['gallery_image']['url']),
                                                    ));
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <?php
                                        if (!empty($item['image_title'])) {
                                            echo '<h3 class="gallery-title h5">
                                                <a href="' . esc_url($item['image_url']['url']) . '" class="text-inherit">' . htmlspecialchars_decode(esc_html($item['image_title'])) . '</a>
                                                </h3>';
                                        }
                                        ?>
                                        <div class="gallery-category">
                                            <?php
                                            if (!empty($item['image_url2']['url'])) {
                                                echo '<a href="' . esc_url($item['image_url2']['url']) . '">' . htmlspecialchars_decode(esc_html($item['image_title2'])) . '</a>';
                                            }
                                            ?>
                                            <?php
                                            if (!empty($item['image_url3']['url'])) {
                                                echo '<a href="' . esc_url($item['image_url3']['url']) . '">' . htmlspecialchars_decode(esc_html($item['image_title3'])) . '</a>';
                                            }
                                            ?>
                                        </div>
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

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Gallery());