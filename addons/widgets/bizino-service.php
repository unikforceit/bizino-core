<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
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
                'default' => 'one',
                'options' => [
                    'one' => __('Style One', 'bizino'),
                    'two' => __('Style Two', 'bizino'),
                    'three' => __('Style Three', 'bizino'),
                    'four' => __('Style Four', 'bizino'),
                ],
            ]
        );

        /*-----------------------------------------service version 1 control ------------------------------------*/

        $repeater = new Repeater();

        $repeater->add_control(
            'image_icon',
            [
                'label' => __('Image icon', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __('Services Content', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Safe Cleaning Supplies', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => ['features_style' => ['one', 'three']],
            ]
        );

        /*-----------------------------------------service version 2 control ------------------------------------*/


        $repeater = new Repeater();

        $repeater->add_control(
            'image_icon',
            [
                'label' => __('Image icon', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'features_v2',
            [
                'label' => __('Services Content', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Safe Cleaning Supplies', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => ['features_style' => ['two']],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------service version 4 control ------------------------------------*/

        $this->start_controls_section(
            'service_4_content',
            [
                'label' => __('Services 4', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['features_style' => ['four']]
            ]
        );

        $this->add_control(
            'service4_bg_image',
            [
                'label' => __('Upload Background Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
//                'condition' => ['features_style' => ['four']]
            ]
        );
        $this->add_control(
            'service4_center_image',
            [
                'label' => __('Upload Center Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
//                'condition' => ['features_style' => ['four']]
            ]
        );

        $repeater3 = new Repeater();

        $repeater3->add_control(
            'service4_item_image',
            [
                'label' => __('Upload Item Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater3->add_control(
            'service4_title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
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
            ]
        );
        $repeater3->add_control(
            'service4_content', [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipm dolor amet, consectetur magm maiores.Ipsa dolor sit ilmesy magnam maores.', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service4_list',
            [
                'label' => __('Services List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'service4_title' => __('Stunning Design', 'bizino'),
                    ],
                    [
                        'service4_title' => __('Application Design', 'bizino'),
                    ],
                    [
                        'service4_title' => __('Detailed Report', 'bizino'),
                    ],
                    [
                        'service4_title' => __('Save Extra Money', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ service4_title }}}',
                'condition' => ['features_style' => ['four']],
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
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .service p',
                    '{{WRAPPER}} .h4'
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
                    '{{WRAPPER}} .service p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo '<!-----------------------Start Services Area----------------------->';
        if ($settings['features_style'] == 'one') {
            echo '<div class="row service">';
            foreach ($settings['features'] as $data) {
                echo '<div class="col-6 col-sm-4 thumb-about">';
                if (!empty($data['image_icon']['url'])) {
                    echo bizino_img_tag(array(
                        'url' => esc_url($data['image_icon']['url']),
                    ));
                }
                if (!empty($data['title'])) {
                    echo '<p class="text-title fw-semibold">' . esc_html($data['title']) . '</p>';
                }
                echo '</div>';
            }
            echo '</div>';
        } elseif ($settings['features_style'] == 'two') {
            echo '<div class="about-media-wrap">';
            foreach ($settings['features_v2'] as $data) {
                echo '<div class="d-md-flex gap-4 about-media text-center text-md-start">';
                if (!empty($data['image_icon']['url'])) {
                    echo '<div class="media-img mb-30 mb-md-0">';
                    echo bizino_img_tag(array(
                        'url' => esc_url($data['image_icon']['url']),
                    ));
                    echo '</div>';
                }
                echo '<div class="media-body">';
                if (!empty($data['title'])) {
                    echo '<h4 class="fw-semibold mb-1 mt-n1">' . esc_html($data['title']) . '</h4>';
                }
                if (!empty($data['content'])) {
                    echo '<p>' . esc_html($data['content']) . '</p>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } elseif ($settings['features_style'] == 'three') {
            echo '<div class="row gx-4 text-center vs-carousel">';
            foreach ($settings['features'] as $data) {
                echo '<div class="col-6 col-sm-4 col-lg">';
                echo '<div class="thumb-about-style2">';
                if (!empty($data['image_icon']['url'])) {
                    echo bizino_img_tag(array(
                        'url' => esc_url($data['image_icon']['url']),
                    ));
                }
                if (!empty($data['title'])) {
                    echo '<p class="text-title fw-semibold">' . esc_html($data['title']) . '</p>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            ?>
            <!--==============================
                Service Area
                ==============================-->
            <section class=" space" data-bg-src="<?php echo esc_attr($settings['service4_bg_image']['url']); ?>">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center text-lg-start">
                            <div class="title-area">
                                <div class="sec-line mx-auto mx-lg-0"></div>
                                <span class="sec-subtitle">Business Strategy or services</span>
                                <h2 class="sec-title">Plan Your Business Solution strategy with us.</h2>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <div class="sec-btn"><a href="service.html" class="vs-btn style4"><i
                                            class="far fa-angle-right"></i>View All Services</a></div>
                        </div>
                    </div>
                    <div class="service-wrap1">
                        <div class="service-shape1">
                            <div class="shape-img">
                                <?php
                                if (!empty($settings['service4_center_image']['url'])) {
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($settings['service4_center_image']['url']),
                                    ));
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <?php
                            $loop = 0;
                            foreach ($settings['service4_list'] as $list) {
                                $loop++;
                                if ($loop == 2){
                                    $div = '<div class="clearfix"></div>';
                                }else{
                                    $div = '';
                                }
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="service-style1">
                                        <div class="service-icon">
                                            <div class="vs-shape1"></div>
                                            <?php
                                            if (!empty($list['service4_item_image']['url'])) {
                                                echo bizino_img_tag(array(
                                                    'url' => esc_url($list['service4_item_image']['url']),
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <h3 class="service-title h5">
                                            <a class="text-inherit"
                                               href="<?php echo esc_url($list['service4_link']['url']); ?>">
                                                <?php echo esc_html($list['service4_title']); ?>
                                            </a>
                                        </h3>
                                        <?php
                                        if (!empty($list['service4_content'])) {
                                            echo '<p class="service-text">' . htmlspecialchars_decode(esc_html($list['service4_content'])) . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php echo wp_kses_post($div);?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Service_Widget());