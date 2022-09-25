<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Features Widget .
 *
 */
class Bizino_Features_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinofeatures';
    }

    public function get_title()
    {
        return __('Bizino Features', 'bizino');
    }

    public function get_icon()
    {
        return 'fa fa-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'chose_us_content',
            [
                'label' => __('Features', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'features_style',
            [
                'label' => __('Features Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );
        $this->end_controls_section();

        /*----------------------------------------- Feature 3 control ------------------------------------*/

        $this->start_controls_section(
            'feature2_content',
            [
                'label' => __('Features', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['features_style' => ['2']]
            ]
        );

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'feature2_image',
            [
                'label' => __('Upload Thumb Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater2->add_control(
            'feature2_image2',
            [
                'label' => __('Upload Icon Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater2->add_control(
            'feature2_title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Complete Innovation', 'bizino')
            ]
        );
        $repeater2->add_control(
            'feature2_link',
            [
                'label' => __('Title Link', 'bizino'),
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
        $repeater2->add_control(
            'feature2_desc',
            [
                'label' => __('Short Descriptions', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Markets evolve compelling supply chains without virtual resources. empowered customer service for reliable.', 'bizino')
            ]
        );
        $repeater2->add_control(
            'feature2_link2',
            [
                'label' => __('Arrow Icon Link', 'bizino'),
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
            'feature2_list',
            [
                'label' => __('Services List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'feature2_title' => __('Complete Innovation', 'bizino'),
                    ],
                    [
                        'feature2_title' => __('Agency Growth Check', 'bizino'),
                    ],
                    [
                        'feature2_title' => __('Business Startup', 'bizino'),
                    ],
                    [
                        'feature2_title' => __('Business Research', 'bizino'),
                    ],
                    [
                        'feature2_title' => __('Expert Consultation', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ feature2_title }}}',
            ]
        );

        $this->end_controls_section();

        /*----------------------------------------- Feature 2 control ------------------------------------*/

        $this->start_controls_section(
            'events_content',
            [
                'label' => __('Events', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['features_style' => ['1']]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'feature_subtitle',
            [
                'label' => __('Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Online Topic, Business', 'bizino')
            ]
        );
        $repeater->add_control(
            'feature_title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Online Business Growth', 'bizino')
            ]
        );
        $repeater->add_control(
            'feature_link',
            [
                'label' => __('Title Link', 'bizino'),
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
        $repeater->add_control(
            'feature_desc',
            [
                'label' => __('Short Descriptions', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Markets evolve compelling supply chains without virtual resources. empowered customer service for reliable.', 'bizino')
            ]
        );
        $repeater->add_control(
            'feature_image',
            [
                'label' => __('Upload Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_control(
            'event_day',
            [
                'label' => __('Day', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('21', 'bizino')
            ]
        );
        $repeater->add_control(
            'event_year',
            [
                'label' => __('Year', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Feb, 2022', 'bizino')
            ]
        );
        $repeater->add_control(
            'author_image',
            [
                'label' => __('Upload Author Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('John Roselina', 'bizino')
            ]
        );
        $repeater->add_control(
            'author_designation',
            [
                'label' => __('Author Designation', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Consultant', 'bizino')
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Events Items', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => __('Online Business Growth', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
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
            'features_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide .banner-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-banner-slide .banner-title'
            ]
        );

        $this->add_responsive_control(
            'features_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide .banner-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide .banner-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

        $this->start_controls_section(
            'desc_styling',
            [
                'label' => __('Content Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_desc_color',
            [
                'label' => __('Content Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_desc_typography',
                'label' => __('Content Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-banner-slide p'
            ]
        );

        $this->add_responsive_control(
            'features_desc_margin',
            [
                'label' => __('Content Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_desc_padding',
            [
                'label' => __('Content Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Animation styling------------------------------------*/

        $this->start_controls_section(
            'animation_styling',
            [
                'label' => __('Animation Control', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'shape_color',
            [
                'label' => __('Shape Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide' => '--morp-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'shape_delay',
            [
                'label' => __('Shape Delay', 'bizino'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 1,
                'default' => 10,
                'selectors' => [
                    '{{WRAPPER}} .vs-banner-slide' => '--morp-delay: {{VALUE}}s',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ($settings['features_style'] == '1') {
            if ($settings['slides']){
            ?>
            <!--==============================
                    Event Area
                    ==============================-->
            <section class=" space-bottom">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-xl-7 text-center">
                            <div class="title-area">
                                <div class="sec-pills">
                                    <div class="pill"></div>
                                    <div class="pill"></div>
                                    <div class="pill"></div>
                                </div>
                                <span class="sec-subtitle">Business Event</span>
                                <h2 class="sec-title">Business Events Strategists For a Experience</h2>
                            </div>
                        </div>
                        <div class="col-xxl-10">
                            <div class="row">
                                <?php
                                foreach ($settings['slides'] as $list) {
                                    ?>
                                    <div class="col-xl-12 event-style1">
                                        <div class="event-wrap">
                                            <div class="event-img">
                                                <?php
                                                if (!empty($list['feature_image']['url'])) {
                                                    echo bizino_img_tag(array(
                                                        'url' => esc_url($list['feature_image']['url']),
                                                    ));
                                                }
                                                ?>
                                            </div>
                                            <div class="event-content">
                                                <?php
                                                if (!empty($list['feature_subtitle'])) {
                                                    echo '<span class="event-label">' . htmlspecialchars_decode(esc_html($list['feature_subtitle'])) . '</span>';
                                                }
                                                ?>
                                                 <?php
                                                if (!empty($list['feature_title'])) {
                                                    echo '<h3 class="event-title h4">
                                                        <a class="text-inherit" href="' . esc_url($list['feature_link']['url']) . '">' . htmlspecialchars_decode(esc_html($list['feature_title'])) . '</a>
                                                    </h3>';
                                                    }
                                                 ?>
                                                <?php
                                                if (!empty($list['feature_desc'])) {
                                                    echo '<p class="event-text">' . htmlspecialchars_decode(esc_html($list['feature_desc'])) . '</p>';
                                                }
                                                ?>
                                                <div class="event-date">
                                                    <?php
                                                    if (!empty($list['event_day'])) {
                                                        echo '<span class="day">' . htmlspecialchars_decode(esc_html($list['event_day'])) . '</span>';
                                                    }
                                                    ?>
                                                    <?php
                                                    if (!empty($list['event_year'])) {
                                                        echo '<span class="year">' . htmlspecialchars_decode(esc_html($list['event_year'])) . '</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="event-author">
                                                    <div class="event-avater">
                                                        <?php
                                                        if (!empty($list['author_image']['url'])) {
                                                            echo bizino_img_tag(array(
                                                                'url' => esc_url($list['author_image']['url']),
                                                            ));
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="media-body">
                                                        <?php
                                                        if (!empty($list['author_name'])) {
                                                            echo '<h4 class="event-organizer h6">' . htmlspecialchars_decode(esc_html($list['author_name'])) . '</h4>';
                                                        }
                                                        ?>
                                                        <?php
                                                        if (!empty($list['author_designation'])) {
                                                            echo '<p class="event-nominee">' . htmlspecialchars_decode(esc_html($list['author_designation'])) . '</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="blog.html" class="vs-btn">View All Events</a>
                    </div>
                </div>
            </section>
            <?php
        } } else {
            if ($settings['feature2_list']){
            ?>
            <!--==============================
            Features Area
            ==============================-->
            <section class=" space-extra-bottom">
                <div class="container">
                    <div class="row gx-4 vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2"
                         data-center-mode="true" data-lg-center-mode="true" data-ml-center-mode="true"
                         data-xl-center-mode="true">
                        <?php
                        foreach ($settings['feature2_list'] as $feature) {
                            ?>
                            <div class="col-xl-4 feature-multi">
                                <div class="feature-style1">
                                    <div class="feature-img">
                                        <?php
                                        if (!empty($feature['feature2_image']['url'])) {
                                            echo bizino_img_tag(array(
                                                'url' => esc_url($feature['feature2_image']['url']),
                                            ));
                                        }
                                        ?>
                                    </div>
                                    <div class="feature-content">
                                        <div class="feature-icon">
                                            <?php
                                            if (!empty($feature['feature2_image2']['url'])) {
                                                echo bizino_img_tag(array(
                                                    'url' => esc_url($feature['feature2_image2']['url']),
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <h3 class="feature-title h5">
                                            <a class="text-inherit"
                                               href="<?php echo esc_url($feature['feature2_link']['url']); ?>">
                                                <?php echo esc_html($feature['feature2_title']); ?>
                                            </a>
                                        </h3>
                                        <?php
                                        if (!empty($feature['feature2_desc'])) {
                                            echo '<p class="feature">' . htmlspecialchars_decode(esc_html($feature['feature2_desc'])) . '</p>';
                                        }
                                        ?>
                                        <a href="<?php echo esc_url($feature['feature2_link2']['url']); ?>"
                                           class="icon-btn style2">
                                            <i class="far fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <?php
        } }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Features_Widget());