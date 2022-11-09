<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Package Widget .
 *
 */
class Bizino_Packages_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinopackage';
    }

    public function get_title()
    {
        return __('Bizino Package', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
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
                'label' => __('Package', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'package_style',
            [
                'label' => __('Package Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => __('Style One', 'bizino'),
                    'two' => __('Style Two', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Background Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('GET THE BEST SOLUTION FROM US', 'bizino'),
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Package For Your New Services', 'bizino'),
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Analyzing competing products or services can give you an idea of what already exists in your industry. This can help you find ways to improve your idea.', 'bizino'),
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->end_controls_section();

        //      Styling Second Tab
        $this->start_controls_section(
            'package_section',
            [
                'label' => esc_html__('Package Section', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['package_style' => ['two']]
            ]
        );

        $repeater3 = new Repeater();
        $repeater3->add_control(
            'price_save', [
                'label' => esc_html__('Price Save', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Save 20%", 'bizino'),
                'description' => esc_html__('enter price save', 'bizino')
            ]
        );
        $repeater3->add_control(
            'price_title', [
                'label' => esc_html__('Price Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Intro", 'bizino'),
                'description' => esc_html__('enter price title', 'bizino')
            ]
        );
        $repeater3->add_control(
            'package_price', [
                'label' => esc_html__('Package Price', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("$56", 'bizino'),
                'description' => esc_html__('enter package price', 'bizino')
            ]
        );
        $repeater3->add_control(
            'package_price_duration', [
                'label' => esc_html__('Package Price Duration', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("/Month", 'bizino'),
                'description' => esc_html__('enter package price duration', 'bizino')
            ]
        );
        $repeater3->add_control(
            'package_offer', [
                'label' => esc_html__('Package Offer', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Full Business Services", 'bizino'),
                'description' => esc_html__('enter package price Offer', 'bizino')
            ]
        );
        $repeater3->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Book Plan", 'bizino'),
                'description' => esc_html__('enter button text', 'bizino')
            ]
        );
        $repeater3->add_control(
            'btn_link', [
                'label' => esc_html__('Button URL', 'bizino'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'bizino'),
                'condition' => ['mbtn_status' => 'yes']
            ]
        );

        $this->add_control('price_list', [
            'label' => esc_html__('Take 4 Price Item', 'bizino'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater3->get_controls(),
            'default' => [
                [
                    'price_save' => esc_html__('Save 20%', 'plugin-name'),
                    'price_title' => esc_html__('Intro', 'plugin-name'),
                    'package_price' => esc_html__('$56', 'plugin-name'),
                    'package_price_duration' => esc_html__('/Month', 'plugin-name'),
                ],
                [
                    'price_save' => esc_html__('Save 11%', 'plugin-name'),
                    'price_title' => esc_html__('Base', 'plugin-name'),
                    'package_price' => esc_html__('$99', 'plugin-name'),
                    'package_price_duration' => esc_html__('/Month', 'plugin-name'),
                ],
                [
                    'price_save' => esc_html__('Save 15%', 'plugin-name'),
                    'price_title' => esc_html__('Popular', 'plugin-name'),
                    'package_price' => esc_html__('$158', 'plugin-name'),
                    'package_price_duration' => esc_html__('/Year', 'plugin-name'),
                ],
                [
                    'price_save' => esc_html__('Save 75%', 'plugin-name'),
                    'price_title' => esc_html__('Enterprise', 'plugin-name'),
                    'package_price' => esc_html__('$199', 'plugin-name'),
                    'package_price_duration' => esc_html__('/Year', 'plugin-name'),
                ],
            ],
            'title_field' => '{{{ price_title }}}',
        ]);
        $this->end_controls_section();

//      Monthly Tab Loop
        $this->start_controls_section(
            'monthly_section',
            [
                'label' => esc_html__('Monthly Section', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->add_control(
            'mTabTitle',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Monthly Plan', 'bizino')
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'mPrice_save', [
                'label' => esc_html__('Monthly Price Save', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Save 20%", 'bizino'),
                'description' => esc_html__('enter price save', 'bizino')
            ]
        );
        $repeater->add_control(
            'mPrice_title', [
                'label' => esc_html__('Monthly Price Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Standard", 'bizino'),
                'description' => esc_html__('enter price title', 'bizino')
            ]
        );
        $repeater->add_control(
            'mPackage_price_currency', [
                'label' => esc_html__('Package Price Currency', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("$", 'bizino'),
                'description' => esc_html__('enter package price currency', 'bizino')
            ]
        );
        $repeater->add_control(
            'mPackage_price', [
                'label' => esc_html__('Package Price', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("54", 'bizino'),
                'description' => esc_html__('enter package price', 'bizino')
            ]
        );
        $repeater->add_control(
            'mPackage_price_duration', [
                'label' => esc_html__('Package Price Duration', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("/ Month", 'bizino'),
                'description' => esc_html__('enter package price duration', 'bizino')
            ]
        );
        $repeater->add_control(
            'mPackage_offer', [
                'label' => esc_html__('Package Offer', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Full Business Services", 'bizino'),
                'description' => esc_html__('enter package price Offer', 'bizino')
            ]
        );
        $repeater->add_control(
            'mbtn_status', [
                'label' => esc_html__('Button Show/Hide', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'bizino')
            ]
        );
        $repeater->add_control(
            'mbtn_text', [
                'label' => esc_html__('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Purchase Plan", 'bizino'),
                'description' => esc_html__('enter button text', 'bizino')
            ]
        );
        $repeater->add_control(
            'mbtn_link', [
                'label' => esc_html__('Button URL', 'bizino'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'bizino'),
                'condition' => ['mbtn_status' => 'yes']
            ]
        );

        $this->add_control('mPrice_list', [
            'label' => esc_html__('Take 2 Price Item', 'bizino'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'mPrice_title' => esc_html__('Standard', 'plugin-name'),
                ],
                [
                    'mPrice_title' => esc_html__('Popular', 'plugin-name'),
                ],
            ],
            'title_field' => '{{{ mPrice_title }}}',
        ]);
        $this->end_controls_section();

        //      Yearly Tab Loop
        $this->start_controls_section(
            'yearly_section',
            [
                'label' => esc_html__('Yearly Section', 'softim-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => ['package_style' => ['one']]
            ]
        );

        $this->add_control(
            'yTabTitle',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Yearly Plan', 'bizino')
            ]
        );

        $repeater2 = new Repeater();
        $repeater2->add_control(
            'yPrice_save', [
                'label' => esc_html__('Yearly Price Save', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Save 18%", 'bizino'),
                'description' => esc_html__('enter price save', 'bizino')
            ]
        );
        $repeater2->add_control(
            'yPrice_title', [
                'label' => esc_html__('Yearly Price Title', 'softim-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Bronze", 'softim-core'),
                'description' => esc_html__('enter price title', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'yPackage_price_currency', [
                'label' => esc_html__('Package Price Currency', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("$", 'bizino'),
                'description' => esc_html__('enter package price currency', 'bizino')
            ]
        );
        $repeater2->add_control(
            'yPackage_price', [
                'label' => esc_html__('Package Price', 'softim-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("199", 'softim-core'),
                'description' => esc_html__('enter package price', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'yPackage_price_duration', [
                'label' => esc_html__('Package Price Duration', 'softim-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("/ Year", 'softim-core'),
                'description' => esc_html__('enter package price duration', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'yPackage_offer', [
                'label' => esc_html__('Package Offer', 'softim-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Full Business Services", 'softim-core'),
                'description' => esc_html__('enter package price duration', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'ybtn_status', [
                'label' => esc_html__('Button Show/Hide', 'softim-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'ybtn_text', [
                'label' => esc_html__('Button Text', 'softim-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Purchase Plan", 'softim-core'),
                'description' => esc_html__('enter button text', 'softim-core')
            ]
        );
        $repeater2->add_control(
            'ybtn_link', [
            'label' => esc_html__('Button URL', 'softim-core'),
            'type' => Controls_Manager::URL,
            'default' => [
                'url' => '#'
            ],
            'description' => esc_html__('enter button url', 'softim-core'),
            'condition' => ['ybtn_status' => 'yes']
        ]);

        $this->add_control('yPrice_list', [
            'label' => esc_html__('Take 2 Price Item', 'softim-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater2->get_controls(),
            'default' => [
                [
                    'yPrice_title' => esc_html__('Bronze', 'plugin-name'),
                ],
                [
                    'yPrice_title' => esc_html__('VIP Golder', 'plugin-name'),
                ],
            ],
            'title_field' => '{{{ yPrice_title }}}',
        ]);
        $this->end_controls_section();

        /*-----------------------------------------subtitle styling------------------------------------*/

        $this->start_controls_section(
            'subtitle_styling',
            [
                'label' => __('Subtitle Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['package_style' => 'one'],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Subtitle Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Subtitle Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-packages-wrapper .sub-title'
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __('Subtitle Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label' => __('Subtitle Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Title styling------------------------------------*/

        $this->start_controls_section(
            'title_styling',
            [
                'label' => __('Title Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sec-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography2',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-packages-wrapper .sec-title'
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Button styling------------------------------------*/

        $this->start_controls_section(
            'button_styling',
            [
                'label' => __('Button Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['package_style' => 'one'],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .text-inherit' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_hvr_color',
            [
                'label' => __('Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .text-inherit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-packages-wrapper .text-inherit'
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Button Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .text-inherit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Button Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .vs-packages-wrapper .text-inherit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .offer-pill-2' => '--theme-color: {{VALUE}}',
                ],
                'condition' => ['package_style' => 'one'],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'bizino'),
                'selector' => '{{WRAPPER}} .offer-pill-2::before',
                'condition' => ['package_style' => 'one'],
            ]
        );

        $this->add_control(
            'offer_txt_color',
            [
                'label' => __('Offer Text Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-label' => 'color: {{VALUE}}',
                ],
                'condition' => ['package_style' => 'one'],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'offer_txt_typography',
                'label' => __('Offer Text Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .price-label',
                'condition' => ['package_style' => 'one'],
            ]
        );
        $this->add_control(
            'price_txt_color',
            [
                'label' => __('Price Text Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .offers-price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_txt_typography',
                'label' => __('Price Text Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .price',
                    '{{WRAPPER}} .offers-price',
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
                'condition' => ['package_style' => 'two'],
            ]
        );

        $this->add_control(
            'shape_color',
            [
                'label' => __('Shape Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offers-box::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo '<!-----------------------Start Package Area----------------------->';
        if ($settings['package_style'] == 'one') {
            ?>
            <section class="position-relative z-index-common space-top space-extra-bottom">
                <div class="package-shape1" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-5 col-xl-5 align-self-center text-center text-lg-start">
                            <div class="ps-xxl-5">
                                <?php
                                if (!empty($settings['subtitle'])) {
                                    echo '<span class="sec-subtitle2">' . htmlspecialchars_decode(esc_html($settings['subtitle'])) . '</span>';
                                }
                                ?>
                                <?php
                                if (!empty($settings['title'])) {
                                    echo '<h2 class="sec-title text-white">' . htmlspecialchars_decode(esc_html($settings['title'])) . '</h2>';
                                }
                                ?>
                                <?php
                                if (!empty($settings['content'])) {
                                    echo '<p class="fs-md text-light mb-5 pb-1">' . htmlspecialchars_decode(esc_html($settings['content'])) . '</p>';
                                }
                                ?>
                                <div class="nav package-tab" id="priceTab" role="tablist">
                                    <button class="nav-link active" id="monthlyplan-tab" data-bs-toggle="tab"
                                            data-bs-target="#monthlyplan" type="button" role="tab"
                                            aria-controls="monthlyplan"
                                            aria-selected="true"><?php echo esc_html($settings['mTabTitle']); ?>
                                    </button>
                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab"
                                            data-bs-target="#business" type="button" role="tab" aria-controls="business"
                                            aria-selected="false"><?php echo esc_html($settings['yTabTitle']); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-6 offset-xl-1">
                            <div class="tab-content" id="priceTabContent">
                                <div class="tab-pane fade show active" id="monthlyplan" role="tabpanel"
                                     aria-labelledby="monthlyplan-tab">
                                    <?php
                                    if ($settings['mPrice_list']) {
                                        foreach ($settings['mPrice_list'] as $mList) {
                                            ?>
                                            <div class="package-style1">
                                                <div class="package-discount"><?php echo esc_html($mList['mPrice_save']); ?></div>
                                                <div class="package-head">
                                                    <div class="package-label"><?php echo esc_html($mList['mPrice_title']); ?></div>
                                                    <div class="package-amount">
                                                        <span class="currency"><?php echo esc_html($mList['mPackage_price_currency']); ?></span>
                                                        <span class="price"><?php echo esc_html($mList['mPackage_price']); ?></span>
                                                        <span class="duration"><?php echo esc_html($mList['mPackage_price_duration']); ?></span>
                                                    </div>
                                                    <?php if ($mList['mbtn_status'] == 'yes'): ?>
                                                        <a href="<?php echo esc_url($mList['mbtn_link']['url']); ?>"
                                                           class="vs-btn style3"><?php echo esc_html($mList['mbtn_text']); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="package-body">
                                                    <div class="package-list">
                                                        <ul>
                                                            <?php echo wp_kses_post($mList['mPackage_offer']); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                                    <?php
                                    if ($settings['yPrice_list']) {
                                        foreach ($settings['yPrice_list'] as $yList) {
                                            ?>
                                            <div class="package-style1">
                                                <div class="package-discount"><?php echo esc_html($yList['yPrice_save']); ?></div>
                                                <div class="package-head">
                                                    <div class="package-label"><?php echo esc_html($yList['yPrice_title']); ?></div>
                                                    <div class="package-amount">
                                                        <span class="currency"><?php echo esc_html($yList['yPackage_price_currency']); ?></span>
                                                        <span class="price"><?php echo esc_html($yList['yPackage_price']); ?></span>
                                                        <span class="duration"><?php echo esc_html($yList['yPackage_price_duration']); ?></span>
                                                    </div>
                                                    <?php if ($yList['ybtn_status'] == 'yes'): ?>
                                                        <a href="<?php echo esc_url($yList['ybtn_link']['url']); ?>"
                                                           class="vs-btn style3"><?php echo esc_html($yList['ybtn_text']); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="package-body">
                                                    <div class="package-list">
                                                        <ul>
                                                            <?php echo wp_kses_post($yList['yPackage_offer']); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        } else {
            ?>
            <div class="row gx-40 flex-row-reverse">
                <div class="col-lg-6">
                    <div class="nav package-nav" id="nav-tab" role="tablist">
                        <?php if ($settings['price_list']) {
                            $tab_btn = 0;
                            foreach ($settings['price_list'] as $tab2) {
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
                                        id="<?php echo esc_attr($tab2['_id']); ?>-tab" data-bs-toggle="tab"
                                        data-bs-target="#price<?php echo esc_attr($tab2['_id']); ?>" type="button"
                                        role="tab" aria-controls="price<?php echo esc_attr($tab2['_id']); ?>"
                                        aria-selected="<?php echo esc_attr($btn_true); ?>">
                                    <span class="btn-text"><?php echo esc_html($tab2['price_title']); ?></span>
                                    <span class="price">
                                        <span class="amount"><?php echo esc_html($tab2['package_price']); ?></span>
                                        <span class="duration"><?php echo esc_html($tab2['package_price_duration']); ?></span>
                                    </span>
                                    <span class="discount"><?php echo esc_html($tab2['price_save']); ?></span>
                                </button>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tab-content" id="nav-tabContent">
                        <?php if ($settings['price_list']) {
                            $tabs = 0;
                            foreach ($settings['price_list'] as $tab2) {
                                $tabs++;
                                if ($tabs == 1) {
                                    $tab_act = 'show active';
                                } else {
                                    $tab_act = '';
                                }
                                ?>
                                <div class="tab-pane fade <?php echo esc_attr($tab_act); ?>"
                                     id="price<?php echo esc_attr($tab2['_id']); ?>" role="tabpanel"
                                     aria-labelledby="price<?php echo esc_attr($tab2['_id']); ?>">
                                    <div class="package-box">
                                        <div class="box-inner">
                                            <h3 class="package-box-title"><?php echo esc_html($tab2['price_title']); ?></h3>
                                            <ul>
                                                <?php echo wp_kses_post($tab2['package_offer']); ?>
                                            </ul>
                                            <a href="/contact-us/" class="vs-btn book-plan-btn">Book Plan</a></div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

Plugin::instance()->widgets_manager->register(new Bizino_Packages_Widget());