<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

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
        $this->add_control(
            'gallery_style',
            [
                'label' => __('Gallery Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => __('Style One', 'bizino'),
                    'two' => __('Style Two', 'bizino'),
                ],
            ]
        );
        $this->add_control(
            'gallery_title', [
                'label' => __('Main Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Effective Case Studies', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gallery_des', [
                'label' => __('Main Description', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('power of choice is untrammelled and when nothing prevents', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_1',
            [
                'label' => __('Gallery Item', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['gallery_style' => ['one']]
            ]
        );

        $this->add_control(
            'switcher3',
            [
                'label' => __('Top On/Off', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
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
                        'image_title2' => __('Support', 'bizino'),
                        'image_title3' => __('Research', 'bizino'),
                    ],
                    [
                        'image_title' => __('Creative Marketing', 'bizino'),
                        'image_title2' => __('Branding', 'bizino'),
                        'image_title3' => __('Creative', 'bizino'),
                    ],
                    [
                        'image_title' => __('Web Development', 'bizino'),
                        'image_title2' => __('Latest Coding', 'bizino'),
                        'image_title3' => __('PHP', 'bizino'),
                    ],
                    [
                        'image_title' => __('Expert Consultations', 'bizino'),
                        'image_title2' => __('UI Research', 'bizino'),
                        'image_title3' => __('Easy Coding', 'bizino'),
                    ],
                    [
                        'image_title' => __('SEO Optimization', 'bizino'),
                        'image_title2' => __('Bing SEO', 'bizino'),
                        'image_title3' => __('Google', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ image_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_2',
            [
                'label' => __('Gallery Item', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['gallery_style' => ['two']]
            ]
        );
        $repeater2 = new Repeater();

        $repeater2->add_control(
            'nav_title', [
                'label' => __('Nav Title', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Marketing', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'navs',
            [
                'label' => __('Nav', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'nav_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'nav_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'nav_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'nav_title' => __('Marketing', 'bizino'),
                    ],

                ],
                'title_field' => '{{{ nav_title }}}',
            ]
        );

        $repeater3 = new Repeater();

        $repeater3->add_control(
            'item_title', [
                'label' => __('Item Title', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Marketing', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'item_category', [
                'label' => __('Item Category', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Marketing', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'item_image',
            [
                'label' => __('Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater3->add_control(
            'item_url', [
                'label' => __('Image Url', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'tab_id', [
                'label' => __('ID', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Branding Marketing', 'bizino'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => __('Items', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'item_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'item_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'item_title' => __('Marketing', 'bizino'),
                    ],
                    [
                        'item_title' => __('Marketing', 'bizino'),
                    ],

                ],
                'title_field' => '{{{ item_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => __('Slider Control', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['gallery_style' => ['one']]
            ]
        );
        $this->add_control(
            'dot_off',
            [
                'label' => __('Dot On', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'true',
                'default' => 'true',
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
                    'size' => 3,
                ],
            ]
        );
        $this->add_control(
            'slide_xs_to_show',
            [
                'label' => __('Slide XS To Show', 'bizino'),
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
                    '{{WRAPPER}} .gallery-style3 .gallery-overlay' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_title_style_section',
            [
                'label' => __('Title', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gallery_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-style3 .gallery-title' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .gallery-style3 .gallery-title',
            ]
        );

        $this->add_responsive_control(
            'gallery_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .gallery-style3 .gallery-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gallery_category_color',
            [
                'label' => __('Category Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-style3 .gallery-category' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_category_typography',
                'label' => __('Category Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .gallery-style3 .gallery-category',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if ($settings['gallery_style'] == 'one') {
            $this->add_render_attribute('wrapper', 'class', 'row gx-70 vs-carousel gallery-zigzag');
            $this->add_render_attribute('wrapper', 'id', 'galslide1');

            $this->add_render_attribute('wrapper', 'data-slide-show', $settings['slide_to_show']['size']);
            $this->add_render_attribute('wrapper', 'data-xs-slide-show', $settings['slide_xs_to_show']['size']);
            $this->add_render_attribute('wrapper', 'data-dots', $settings['dot_off']);
            $this->add_render_attribute('wrapper', 'data-variable-width', 'true');
        }

        if ($settings['gallery_style'] == 'one') {
            if (!empty($settings['slides'])) {
                ?>
                <!--==============================
                Gallery Area
                ==============================-->
                <section class=" space-top space-extra-bottom">
                    <?php
                    if (!empty($settings['switcher3'] == 'yes')) {
                        ?>
                        <div class="container">
                            <div class="row justify-content-between text-center text-lg-start">
                                <div class="col-lg-auto">
                                    <div class="title-area">
                                        <h2 class="sec-title mb-2 pb-1"><?php echo esc_html($settings['gallery_title']); ?></h2>
                                        <p class="fs-md"><?php echo esc_html($settings['gallery_des']); ?></p>
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
                    <?php } ?>
                    <div class="container container-style1">
                        <?php echo '<div ' . $this->get_render_attribute_string('wrapper') . '>'; ?>
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
            <?php }
        } else {
            ?>
            <!--==============================
            Gallery Area
            ==============================-->
            <section class="gallery-cs">
                <?php if (!empty($settings['navs'])) { ?>
                    <div class="filter-menu1 filter-menu-active">
                        <button data-filter="*" class="active">All</button>
                        <?php
                        foreach ($settings['navs'] as $navs) {
                            ?>
                            <button data-filter=".<?php echo esc_html($navs['nav_title']); ?>"><?php echo esc_html($navs['nav_title']); ?></button>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="row filter-active gx-">
                    <?php
                    foreach ($settings['items'] as $ite) {
                        ?>
                        <div class="col-md-6 col-lg-4 filter-item <?php echo esc_html($ite['tab_id']) ?>">
                            <div class="gallery-style3">
                                <div class="gallery-img">
                                    <div class="gallery-overlay "></div>
                                    <?php
                                    if (!empty($ite['item_image']['url'])) {
                                        echo bizino_img_tag(array(
                                            'url' => esc_url($ite['item_image']['url']),
                                        ));
                                    }
                                    ?>
                                </div>
                                <div class="gallery-bottom">
                                    <div class="media-body">
                                        <?php
                                        if (!empty($ite['item_title'])) {
                                            echo '<h3 class="gallery-title h5">
                                                <a href="' . esc_url($ite['item_url']['url']) . '" class="text-inherit">' . htmlspecialchars_decode(esc_html($ite['item_title'])) . '</a>
                                                </h3>';
                                        }
                                        ?>
                                        <?php
                                        if (!empty($ite['item_category'])) {
                                            echo '<div class="gallery-category">' . htmlspecialchars_decode(esc_html($ite['item_category'])) . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if (!empty($ite['item_url']['url'])) {
                                        echo '<a href="' . esc_url($ite['item_url']['url']) . '" class="icon-btn"><i class="fal fa-long-arrow-right"></i></a>';
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

Plugin::instance()->widgets_manager->register(new Bizino_Gallery());