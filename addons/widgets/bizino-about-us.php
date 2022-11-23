<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * About Us Widget .
 *
 */
class Bizino_AboutUs_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'aboutus';
    }

    public function get_title()
    {
        return __('Bizino About Us', 'bizino');
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
            'image_section',
            [
                'label' => __('About Us', 'bizino'),
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

        /*----------------------------------------- Layout 1 ------------------------------------*/

        $this->add_control(
            'about_image',
            [
                'label' => __('About Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1']]
            ]
        );

        $this->add_control(
            'about_image2',
            [
                'label' => __('About Image Two', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1']]
            ]
        );

        $this->add_control(
            'about_subtitle',
            [
                'label' => __('About Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('About Us Subtitle', 'bizino'),
                'label_block' => true,
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label' => __('About Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('About Us Title', 'bizino'),
                'label_block' => true,
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'about_description',
            [
                'label' => __('About Description', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('About Description', 'bizino'),
                'label_block' => true,
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Alines Jakson', 'bizino'),
                'label_block' => true,
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'author_designation',
            [
                'label' => __('Author Designation', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Director, Company CEO', 'bizino'),
                'label_block' => true,
                'condition' => ['layout_styles' => ['1']]
            ]
        );
        $this->add_control(
            'about_sign',
            [
                'label' => __('Sign Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['layout_styles' => ['1']]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'about_list', [
                'label' => __('About List', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Research your niche and competitors', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tab_list',
            [
                'label' => __('Tab list', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'about_list' => __('Research your niche and competitors', 'bizino'),
                    ],
                    [
                        'about_list' => __('Create content that gets your business', 'bizino'),
                    ],
                    [
                        'about_list' => __('Drive organic traffic and lead generation.', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ about_list }}}',
                'condition' => ['layout_styles' => ['1']]
            ]
        );

        /*----------------------------------------- Layout 2 ------------------------------------*/
        $repeater2 = new Repeater();

        $repeater2->add_control(
            'tab_title', [
                'label' => esc_html__('Tab Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Our Mission", 'bizino'),
                'description' => esc_html__('enter tab title', 'bizino'),
            ]
        );
        $repeater2->add_control(
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
        $repeater2->add_control(
            'tab_details_subtitle', [
                'label' => esc_html__('Tab Details Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("GET AND AMAZING", 'bizino'),
            ]
        );
        $repeater2->add_control(
            'tab_details_title', [
                'label' => esc_html__('Tab Details Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Get Right Solution for Your Business", 'bizino'),
            ]
        );
        $repeater2->add_control(
            'tab_details_info', [
                'label' => esc_html__('Tab Details Info', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("You can’t build a strong business without investing time and money into it. You’ll also need to promote your business and establish...", 'bizino'),
            ]
        );
        $repeater2->add_control(
            'tab_details_list', [
                'label' => esc_html__('Tab Details Info', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $repeater2->add_control(
            'tab_btn_status', [
                'label' => esc_html__('Button Show/Hide', 'softim-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'softim-core'),
            ]
        );
        $repeater2->add_control(
            'tab_btn_text', [
                'label' => esc_html__('Button Text', 'softim-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'softim-core'),
                'description' => esc_html__('enter button text', 'softim-core'),
            ]
        );
        $repeater2->add_control(
            'tab_btn_link', [
                'label' => esc_html__('Button URL', 'softim-core'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'softim-core'),
            ]
        );

        $this->add_control(
            'tab_list2',
            [
                'label' => __('Tab list', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
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
                'condition' => ['layout_styles' => ['2']]
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------subtitle styling------------------------------------*/

        $this->start_controls_section(
            'subtitle_styling',
            [
                'label' => __('Subtitle Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'about_subtitle_color',
            [
                'label' => __('Subtitle Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'about_subtitle_typography',
                'label' => __('Subtitle Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sub-title'
            ]
        );

        $this->add_responsive_control(
            'about_subtitle_margin',
            [
                'label' => __('Subtitle Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'about_subtitle_padding',
            [
                'label' => __('Subtitle Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'about_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'about_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .sec-title'
            ]
        );

        $this->add_responsive_control(
            'about_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'about_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------offer styling------------------------------------*/

        $this->start_controls_section(
            'offer_styling',
            [
                'label' => __('Offer Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offer_color',
            [
                'label' => __('Offer Rounded Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer-pill' => '--theme-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'bizino'),
                'selector' => '{{WRAPPER}} .offer-pill::before',
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------button styling------------------------------------*/

        $this->start_controls_section(
            'button_styling',
            [
                'label' => __('Button Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_shadow',
                'label' => __('Button Shadow', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'btn_hvr_color',
            [
                'label' => __('Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn::after' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn'
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => __('Text Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'btn_text_hvr_color',
            [
                'label' => __('Text Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ($settings['layout_styles'] == '1') {
            ?>
            <!--==============================
            About Us
            ==============================-->
            <div class="img-box1">
                <div class="img-1">
                    <?php
                    if (!empty($settings['about_image']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['about_image']['url']),
                        ));
                    }
                    ?>
                </div>
                <div class="img-2">
                    <?php
                    if (!empty($settings['about_image2']['url'])) {
                        echo bizino_img_tag(array(
                            'url' => esc_url($settings['about_image2']['url']),
                        ));
                    }
                    ?>
                </div>
                <div class="list-box1">
                    <ul>
                        <?php
                        foreach ($settings['tab_list'] as $list) {
                            ?>
                            <?php
                            if (!empty($list['about_list'])) {
                                echo '<li>' . htmlspecialchars_decode(esc_html($list['about_list'])) . '</li>';
                            }
                            ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php
        } else {
            ?>
            <!--==============================
            About Us
            ==============================-->
            <section class=" space">
                <div class="container">
                    <div class="nav about-tab" id="nav-tab" role="tablist">
                        <?php if ($settings['tab_list2']) {
                            $tab_btn = 0;
                            foreach ($settings['tab_list2'] as $tab2) {
                                $tab_btn++;
                                if ($tab_btn == 2) {
                                    $btn_act = 'active';
                                    $btn_true = 'true';
                                } else {
                                    $btn_act = '';
                                    $btn_true = 'false';
                                }
                                ?>
                                <button class="nav-link <?php echo esc_attr($btn_act); ?>"
                                        id="<?php echo esc_attr($tab2['_id']); ?>-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#about<?php echo esc_attr($tab2['_id']); ?>"
                                        type="button" role="tab"
                                        aria-controls="about<?php echo esc_attr($tab2['_id']); ?>"
                                        aria-selected="<?php echo esc_attr($btn_true); ?>">
                                    <?php echo esc_html($tab2['tab_title']); ?>
                                </button>
                            <?php }
                        } ?>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <?php if ($settings['tab_list2']) {
                            $tabs = 0;
                            foreach ($settings['tab_list2'] as $tab2) {
                                $tabs++;
                                if ($tabs == 2) {
                                    $tab_act = 'show active';
                                } else {
                                    $tab_act = '';
                                }
                                ?>
                                <div class="tab-pane fade <?php echo esc_attr($tab_act); ?>"
                                     id="about<?php echo esc_attr($tab2['_id']); ?>" role="tabpanel"
                                     aria-labelledby="<?php echo esc_attr($tab2['_id']); ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--                                            <img src="assets/img/about/ab-2-1.png" alt="about image" class="w-100">-->
                                            <?php
                                            if (!empty($tab2['tab_thumb_image']['url'])) {
                                                echo bizino_img_tag(array(
                                                    'url' => esc_url($tab2['tab_thumb_image']['url']),
                                                    'class' => 'w-100',
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <div class="col-lg-6 align-self-center">
                                            <div class="about-box2">
                                                <?php
                                                if (!empty($tab2['tab_details_subtitle'])) {
                                                    echo '<span class="sec-subtitle">' . htmlspecialchars_decode(esc_html($tab2['tab_details_subtitle'])) . '</span>';
                                                }
                                                ?>
                                                <?php
                                                if (!empty($tab2['tab_details_title'])) {
                                                    echo '<h2 class="sec-title">' . htmlspecialchars_decode(esc_html($tab2['tab_details_title'])) . '</h2>';
                                                }
                                                ?>
                                                <?php
                                                if (!empty($tab2['tab_details_info'])) {
                                                    echo '<p class="fs-md mb-4 pb-2">' . htmlspecialchars_decode(esc_html($tab2['tab_details_info'])) . '</p>';
                                                }
                                                ?>
                                                <div class="list-style1 ">
                                                    <?php
                                                    if (!empty($tab2['tab_details_list'])) {
                                                        echo '<ul>' . htmlspecialchars_decode(esc_html($tab2['tab_details_list'])) . '</ul>';
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($tab2['tab_btn_status'] == 'yes'): ?>
                                                    <a href="<?php echo esc_url($tab2['tab_btn_link']['url']); ?>"
                                                       class="vs-btn">
                                                        <?php echo esc_html($tab2['tab_btn_text']); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_AboutUs_Widget());