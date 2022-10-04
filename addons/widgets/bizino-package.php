<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;

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
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('GET THE BEST SOLUTION FROM US', 'bizino')
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Package For Your New Services', 'bizino')
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Analyzing competing products or services can give you an idea of what already exists in your industry. This can help you find ways to improve your idea.', 'bizino'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXT,

                'default' => __('Button Text', 'bizino'),
                'condition' => ['package_style' => 'one'],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => ['package_style' => 'one'],
            ]
        );
        /*-----------------------------------------package styling 1------------------------------------*/
        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Thumbnail Image', 'bizino'),
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
                'label' => __('Pricing Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price', [
                'label' => __('Price Plan', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'packages',
            [
                'label' => __('Packages', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Safe Cleaning Supplies', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => ['package_style' => 'one'],
            ]
        );

        /*-----------------------------------------package styling 2------------------------------------*/
        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Thumbnail Image', 'bizino'),
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
                'label' => __('Content List', 'bizino'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price', [
                'label' => __('Price Plan', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'packages_v2',
            [
                'label' => __('Packages', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Safe Cleaning Supplies', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => ['package_style!' => 'one'],
            ]
        );

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
                'name' => 'title_typography',
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
            \Elementor\Group_Control_Border::get_type(),
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
                                            aria-controls="monthlyplan" aria-selected="true">Monthly Plan
                                    </button>
                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab"
                                            data-bs-target="#business" type="button" role="tab" aria-controls="business"
                                            aria-selected="false">Yearly Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-6 offset-xl-1">
                            <div class="tab-content" id="priceTabContent">
                                <div class="tab-pane fade show active" id="monthlyplan" role="tabpanel"
                                     aria-labelledby="monthlyplan-tab">
                                    <div class="package-style1">
                                        <div class="package-discount">Save 20%</div>
                                        <div class="package-head">
                                            <div class="package-label">Standard</div>
                                            <div class="package-amount">
                                                <span class="currency">$</span>
                                                <span class="price">54</span>
                                                <span class="duration">/ Month</span>
                                            </div>
                                            <a href="contact.html" class="vs-btn style3">Purchase Plan</a>
                                        </div>
                                        <div class="package-body">
                                            <div class="package-list">
                                                <ul>
                                                    <li><i class="far fa-check-circle"></i>Full Business Services</li>
                                                    <li><i class="far fa-check-circle"></i>Monthly assesment report</li>
                                                    <li><i class="far fa-times-circle"></i>Tax planning consultation
                                                    </li>
                                                    <li><i class="far fa-times-circle"></i>Problem Solution</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-style1">
                                        <div class="package-discount">Save 35%</div>
                                        <div class="package-head">
                                            <div class="package-label">Popular</div>
                                            <div class="package-amount">
                                                <span class="currency">$</span>
                                                <span class="price">82</span>
                                                <span class="duration">/ Month</span>
                                            </div>
                                            <a href="contact.html" class="vs-btn style3">Purchase Plan</a>
                                        </div>
                                        <div class="package-body">
                                            <div class="package-list">
                                                <ul>
                                                    <li><i class="far fa-check-circle"></i>Full Business Services</li>
                                                    <li><i class="far fa-check-circle"></i>Monthly assesment report</li>
                                                    <li><i class="far fa-check-circle"></i>Tax planning consultation
                                                    </li>
                                                    <li><i class="far fa-times-circle"></i>Problem Solution</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                                    <div class="package-style1">
                                        <div class="package-discount">Save 18%</div>
                                        <div class="package-head">
                                            <div class="package-label">Bronze</div>
                                            <div class="package-amount">
                                                <span class="currency">$</span>
                                                <span class="price">122</span>
                                                <span class="duration">/ Year</span>
                                            </div>
                                            <a href="contact.html" class="vs-btn style3">Purchase Plan</a>
                                        </div>
                                        <div class="package-body">
                                            <div class="package-list">
                                                <ul>
                                                    <li><i class="far fa-check-circle"></i>Full Business Services</li>
                                                    <li><i class="far fa-check-circle"></i>Yearly assesment report</li>
                                                    <li><i class="far fa-times-circle"></i>Tax planning consultation
                                                    </li>
                                                    <li><i class="far fa-check-circle"></i>Problem Solution</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-style1">
                                        <div class="package-discount">Save 45%</div>
                                        <div class="package-head">
                                            <div class="package-label">VIP Golder</div>
                                            <div class="package-amount">
                                                <span class="currency">$</span>
                                                <span class="price">199</span>
                                                <span class="duration">/ Year</span>
                                            </div>
                                            <a href="contact.html" class="vs-btn style3">Purchase Plan</a>
                                        </div>
                                        <div class="package-body">
                                            <div class="package-list">
                                                <ul>
                                                    <li><i class="far fa-check-circle"></i>Full Business Services</li>
                                                    <li><i class="far fa-check-circle"></i>Yearly assesment report</li>
                                                    <li><i class="far fa-check-circle"></i>Tax planning consultation
                                                    </li>
                                                    <li><i class="far fa-check-circle"></i>Problem Solution</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Packages_Widget());