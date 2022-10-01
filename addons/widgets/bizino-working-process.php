<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;

/**
 *
 * Working Process Widget .
 *
 */
class Bizino_Working_Process extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoworkingprocess';
    }

    public function get_title()
    {
        return __('Working Process', 'bizino');
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
            'working_process_section',
            [
                'label' => __('Working Process', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title', [
                'label' => esc_html__('Tab Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Our Mission", 'bizino'),
                'description' => esc_html__('enter tab title', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_thumb_image', [
                'label' => esc_html__('Tab Thumb Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload tab thumb image', 'bizino'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater->add_control(
            'tab_details_subtitle', [
                'label' => esc_html__('Tab Details Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("GET AND AMAZING", 'bizino'),
                'description' => esc_html__('enter tab details title', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_details_title', [
                'label' => esc_html__('Tab Details Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Get Right Solution for Your Business", 'bizino'),
                'description' => esc_html__('enter tab details title', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_details_info', [
                'label' => esc_html__('Tab Details Info', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("You can’t build a strong business without investing time and money into it. You’ll also need to promote your business and establish...", 'bizino'),
                'description' => esc_html__('enter tab details info', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_details_list1', [
                'label' => esc_html__('Tab Details List 1', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Easy To Connect With Customer", 'bizino'),
                'description' => esc_html__('enter tab details List', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_details_list2', [
                'label' => esc_html__('Tab Details List 2', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Interactive Growing Company From Startup", 'bizino'),
                'description' => esc_html__('enter tab details List', 'bizino')
            ]
        );
        $repeater->add_control(
            'tab_details_list3', [
                'label' => esc_html__('Tab Details List 3', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Manage Your Business & Guide To Build", 'bizino'),
                'description' => esc_html__('enter tab details List', 'bizino')
            ]
        );
        $repeater->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'bizino'),
                'description' => esc_html__('enter button text', 'bizino'),
            ]
        );
        $repeater->add_control(
            'btn_link', [
                'label' => esc_html__('Button URL', 'bizino'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'bizino'),
            ]
        );

        $this->add_control(
            'tab_list',
            [
                'label' => __('Slides', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => __('Our Mission', 'bizino'),
                    ],
                    [
                        'tab_title' => __('Our Vision', 'bizino'),
                    ],
                    [
                        'tab_title' => __('Our Goals', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
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
                    'size' => 3,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'general_style',
            [
                'label' => __('General', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_bg_color',
            [
                'label' => __('Overlay Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-box:hover .process-img:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_title_style_section',
            [
                'label' => __('Title', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-box .process-title a' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_control(
            'post_title_color_hover',
            [
                'label' => __('Title Color Hover', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-box .process-title a:hover' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .process-box .process-title',
            ]
        );

        $this->add_responsive_control(
            'post_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .process-box .process-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'post_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .process-box .process-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
        <!--==============================
        About Us
        ==============================-->
        <div class="nav about-tab" id="nav-tab" role="tablist">
            <?php if ($settings['tab_list']) {
                $tab_btn = 0;
                foreach ($settings['tab_list'] as $tab) {
                    $tab_btn++;
                    if ($tab_btn == 1) {
                        $btn_act = 'active';
                        $btn_true = 'true';
                    } else {
                        $btn_act = '';
                        $btn_true = 'false';
                    }
                    ?>
                    <button class="nav-link <?php echo esc_attr($btn_act); ?>"
                            id="<?php echo esc_attr($tab['_id']); ?>-tab" data-bs-toggle="tab"
                            data-bs-target="#work<?php echo esc_attr($tab['_id']); ?>"
                            type="button" role="tab" aria-controls="<?php echo esc_attr($tab['_id']); ?>"
                            aria-selected="<?php echo esc_attr($btn_true); ?>">
                        <?php echo esc_html($tab['tab_title']); ?>
                    </button>
                <?php }
            } ?>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <?php if ($settings['tab_list']) {
                $tabs = 0;
                foreach ($settings['tab_list'] as $tab) {
                    $tabs++;
                    if ($tabs == 1) {
                        $tab_act = 'show active';
                    } else {
                        $tab_act = '';
                    }
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($tab_act); ?>"
                         id="work<?php echo esc_attr($tab['_id']); ?>" role="tabpanel"
                         aria-labelledby="<?php echo esc_attr($tab['_id']); ?>-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?php echo esc_attr($tab['tab_thumb_image']['url']); ?>"
                                     alt="about image" class="w-100">
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="about-box2">
                                    <span class="sec-subtitle"><?php echo esc_html($tab['tab_details_subtitle']); ?></span>
                                    <h2 class="sec-title"><?php echo esc_html($tab['tab_details_title']); ?></h2>
                                    <p class="fs-md mb-4 pb-2"><?php echo esc_html($tab['tab_details_info']); ?></p>
                                    <div class="list-style1 ">
                                        <ul>
                                            <li>
                                                <i class="fal fa-check"></i><?php echo esc_html($tab['tab_details_list1']); ?>
                                            </li>
                                            <li>
                                                <i class="fal fa-check"></i><?php echo esc_html($tab['tab_details_list2']); ?>
                                            </li>
                                            <li>
                                                <i class="fal fa-check"></i><?php echo esc_html($tab['tab_details_list3']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo esc_url($tab['btn_link']['url']); ?>"
                                       class="vs-btn"><?php echo esc_html($tab['btn_text']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Working_Process());