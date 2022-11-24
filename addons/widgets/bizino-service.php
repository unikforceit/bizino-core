<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Services Widget .
 *
 */
class Bizino_Service_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoservices';
    }

    public function get_title()
    {
        return __('Bizino Services', 'bizino');
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
            'chose_us_content',
            [
                'label' => __('Services', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'features_style',
            [
                'label' => __('Services Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                    '3' => __('Style Three', 'bizino'),
                    '4' => __('Style Four', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'service4_item_image',
            [
                'label' => __('Upload Item Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['features_style' => ['1', '3']]
            ]
        );

        $this->add_control(
            'service4_title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
                'condition' => ['features_style' => ['1', '3']]
            ]
        );
        $this->add_control(
            'service4_link',
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
                'condition' => ['features_style' => ['1']]
            ]
        );
        $this->add_control(
            'service4_content', [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipm dolor amet, consectetur magm maiores.Ipsa dolor sit ilmesy magnam maores.', 'bizino'),
                'label_block' => true,
                'condition' => ['features_style' => ['1', '3']]
            ]
        );
        $this->add_control(
            'active_service',
            [
                'label' => __('Services Active', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'deactivate',
                'options' => [
                    'deactivate' => __('Deactivate', 'bizino'),
                    'active' => __('Active', 'bizino'),
                ],
                'condition' => ['features_style' => ['3']]
            ]
        );

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'service2_image',
            [
                'label' => __('Upload Icon Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater2->add_control(
            'service2_title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Start From Scratch To Business Care', 'bizino')
            ]
        );
        $repeater2->add_control(
            'service2_title_link',
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
            'service2_info',
            [
                'label' => __('Short Descriptions', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Markets evolve compelling supply chains without virtual resources. empowered customer service for reliable.', 'bizino')
            ]
        );
        $repeater2->add_control(
            'service2_link',
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
            'service2_list',
            [
                'label' => __('Services List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'service2_title' => __('Start From Scratch To Business Care', 'bizino'),
                    ],
                    [
                        'service2_title' => __('Financial Strategy Consultant', 'bizino'),
                    ],
                    [
                        'service2_title' => __('Growth Marketing Consultant', 'bizino'),
                    ],
                    [
                        'service2_title' => __('Digital Business Development', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ service2_title }}}',
                'condition' => ['features_style' => ['2', '4']]
            ]
        );
        $this->add_control(
            'service2_shape',
            [
                'label' => __('Upload Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => __('Slider Control', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['features_style' => ['2']]
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
            'slide_md_to_show',
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
                    'size' => 2,
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
            'features_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service p' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .h5' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .h5',
                ]
            ]
        );

        $this->add_responsive_control(
            'features_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'features_desc_color',
            [
                'label' => __('Desc Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style3 .service-text' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'label' => __('Desc Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .service-style3 .service-text',
                ]
            ]
        );

        $this->add_responsive_control(
            'features_title_padding',
            [
                'label' => __('Desc Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service-style3 .service-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ($settings['features_style'] == '2') {
            $this->add_render_attribute('wrapper', 'class', 'row vs-carousel');
            $this->add_render_attribute('wrapper', 'data-slide-show', $settings['slide_to_show']['size']);
            $this->add_render_attribute('wrapper', 'data-md-slide-show', $settings['slide_md_to_show']['size']);
        }
        if ($settings['features_style'] == '4'){
            ?>
            <!--==============================
            Service Area
            ==============================-->
            <div class="service-wrap1">
                <div class="service-shape1">
                    <div class="shape-img">
                        <?php
                        if (!empty($settings['service2_shape']['url'])) {
                            echo bizino_img_tag(array(
                                'url' => esc_url($settings['service2_shape']['url']),
                            ));
                        }
                        ?>
                    </div>
                </div>
                <div class="service-row1">
                    <?php
                    foreach ($settings['service2_list'] as $item) {
                        ?>
                        <div class="service-column col-md-6 col-lg-4">
                            <div class="service-style1">
                                <div class="service-icon">
                                    <div class="vs-shape1"></div>
                                    <?php
                                    if (!empty($item['service2_image']['url'])) {
                                        echo bizino_img_tag(array(
                                            'url' => esc_url($item['service2_image']['url']),
                                        ));
                                    }
                                    ?>
                                </div>
                                <h3 class="service-title h5"><a class="text-inherit" href="<?php echo esc_url($item['service2_title_link']['url']); ?>"><?php echo esc_html($item['service2_title']); ?></a></h3>
                                <p class="service-text"><?php echo esc_html($item['service2_info']); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                </div>
            </div>
            <?php
        } elseif ($settings['features_style'] == '1') {
            ?>

            <div class="service-style1">
                <div class="service-icon">
                    <div class="vs-shape1"></div>
                    <?php
                    if (!empty($settings['service4_item_image']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['service4_item_image']['url']),
                        ));
                    }
                    ?>
                </div>
                <h3 class="service-title h5">
                    <a class="text-inherit"
                       href="<?php echo esc_url($settings['service4_link']['url']); ?>">
                        <?php echo esc_html($settings['service4_title']); ?>
                    </a>
                </h3>
                <?php
                if (!empty($settings['service4_content'])) {
                    echo '<p class="service-text">' . htmlspecialchars_decode(esc_html($settings['service4_content'])) . '</p>';
                }
                ?>
            </div>

            <?php
        } elseif ($settings['features_style'] == '2') {
            ?>

            <?php echo '<div ' . $this->get_render_attribute_string('wrapper') . '>'; ?>
            <?php
            foreach ($settings['service2_list'] as $item) {
                ?>
                <div class="col-xl-4">
                    <div class="service-style3">
                        <div class="service-icon">
                            <div class="icon-shape"></div>
                            <div class="icon-bg"></div>
                            <?php
                            if (!empty($item['service2_image']['url'])) {
                                echo bizino_img_tag(array(
                                    'url' => esc_url($item['service2_image']['url']),
                                ));
                            }
                            ?>
                        </div>
                        <h3 class="service-title h5">
                            <a class="text-inherit"
                               href="<?php echo esc_url($item['service2_title_link']['url']); ?>"><?php echo esc_html($item['service2_title']); ?></a>
                        </h3>
                        <p class="service-text"><?php echo esc_html($item['service2_info']); ?></p>
                        <a href="<?php echo esc_url($item['service2_link']['url']); ?>" class="icon-btn style2"><i
                                    class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            <?php } ?>
            </div>

            <?php
        } else {
            ?>
            <div class="service-counter <?php echo esc_attr($settings['active_service']); ?>">
                <div class="service-counter__icon">
                    <?php
                    if (!empty($settings['service4_item_image']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['service4_item_image']['url']),
                        ));
                    }
                    ?>
                </div>
                <span class="service-counter__number"><?php echo esc_html($settings['service4_title']); ?></span>
                <?php
                if (!empty($settings['service4_content'])) {
                    echo '<p class="service-counter__text">' . htmlspecialchars_decode(esc_html($settings['service4_content'])) . '</p>';
                }
                ?>
            </div>
            <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Service_Widget());