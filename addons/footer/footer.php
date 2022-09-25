<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * About Us Widget .
 *
 */
class Bizino_Footer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinofooter';
    }

    public function get_title()
    {
        return __('Bizino Footer', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-editor-code';
    }

    public function get_categories()
    {
        return ['bizino_footer_elements'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'fTop_section',
            [
                'label' => __('Footer Top', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'fBg_image',
            [
                'label' => __('Background Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'fTop_icon',
            [
                'label' => __('Footer Mail Icon', 'bizino'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'footer_title0',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Subscribe Newsletter', 'bizino'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'footer_top_text',
            [
                'label' => __('Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Subscribe and get latest news and updates.', 'bizino'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'footer_top_form',
            [
                'label' => __('Subscribe Form', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter contact form shortcode.', 'bizino'),

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'info_section',
            [
                'label' => __('Contact Info', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footer_title1',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Contact Us', 'bizino'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'address_icon',
            [
                'label' => __('Address Icon', 'bizino'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'address_text',
            [
                'label' => __('Address Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('2659 Dancing Street, New York, NY 25630, USA', 'bizino'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'mail_icon',
            [
                'label' => __('Mail Icon', 'bizino'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'mail_text',
            [
                'label' => __('Mail Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('info@example.com', 'bizino'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'mail_link',
            [
                'label' => __('mail Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('info@example.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'phone_icon',
            [
                'label' => __('Phone Icon', 'bizino'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'phone_text',
            [
                'label' => __('Phone Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('+569 2316 2156', 'bizino'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'phone_link',
            [
                'label' => __('Phone Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('+569 2316 2156', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'fCopyright_text',
            [
                'label' => __('Copyright Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,

            ]
        );

//        Start Social repeter
        $repeater = new Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => __('Social Icon', 'bizino'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'icon_link',
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
            ]
        );

        $this->add_control(

            'social_icon_list',
            [
                'label' => __('Social Icon', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => __('Add Social Icon', 'bizino'),
                    ],
                    [
                        'social_icon' => __('Add Social Icon', 'bizino'),
                    ],
                    [
                        'social_icon' => __('Add Social Icon', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );
//        End Social repeter
        $this->end_controls_section();

        $this->start_controls_section(
            'links_section',
            [
                'label' => __('Useful Links', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footer_title2',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Useful Links', 'bizino'),
                'label_block' => true,

            ]
        );
//        Start Useful Links repeter
        $repeater2 = new Repeater();

        $repeater2->add_control(
            'uLinks_text',
            [
                'label' => __('Link Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Our Company', 'bizino'),
                'label_block' => true,

            ]
        );

        $repeater2->add_control(
            'uLinks_link',
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
            ]
        );

        $this->add_control(

            'uLinks_list',
            [
                'label' => __('Links List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
            ]
        );
//        End Social repeter
        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_section',
            [
                'label' => __('Project Gallery', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footer_title3',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __('Project Gallery', 'bizino'),
                'label_block' => true,

            ]
        );

        $repeater3 = new Repeater();

        $repeater3->add_control(
            'pGallery_image',
            [
                'label' => __('Project Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater3->add_control(
            'pGallery_link',
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
            ]
        );

        $this->add_control(

            'pGallery_list',
            [
                'label' => __('Gallery List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'btn',
            [
                'label' => __('Button', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'bizino'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
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
            \Elementor\Group_Control_Border::get_type(),
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
            \Elementor\Group_Control_Box_Shadow::get_type(),
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
        ?>

        <footer class="footer-wrapper footer-layout2 ">
            <div class="footer-top" data-bg-src="<?php echo esc_attr($settings['fBg_image']['url']); ?>">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="newsletter-style1">
                                <div class="newsletter-icon">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <?php
                                if (!empty($settings['footer_title0'])) {
                                    echo '<h2 class="newsletter-title">' . htmlspecialchars_decode(esc_html($settings['footer_title0'])) . '</h2>';
                                }
                                ?>
                                <?php
                                if (!empty($settings['footer_top_text'])) {
                                    echo '<p class="newsletter-text">' . htmlspecialchars_decode(esc_html($settings['footer_top_text'])) . '</p>';
                                }
                                ?>
                                <?php echo do_shortcode($settings['footer_top_form']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-area">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-lg-auto col-xl-4">
                            <div class="widget footer-widget">
                                <?php
                                if (!empty($settings['footer_title1'])) {
                                    echo '<h3 class="widget_title">' . htmlspecialchars_decode(esc_html($settings['footer_title1'])) . '</h3>';
                                }
                                ?>
                                <div class="footer-about">
                                    <p class="footer-address"><i class="fal fa-laptop-house"></i>2659 Dancing Street,
                                        New York, NY 25630, USA</p>
                                    <a href="mailto:info@example.com" class="footer-mail"><i
                                                class="fal fa-envelope"></i>info@example.com</a>
                                    <a href="tel:+56923162156" class="footer-number2"><i class="fal fa-phone-alt"></i>+569
                                        2316 2156</a>
                                    <div class="footer-social">
                                        <?php
                                        foreach ($settings['social_icon_list'] as $social_icon) {

                                            $social_target = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';

                                            $social_nofollow = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                                            echo '<a ' . wp_kses_post($social_target . $social_nofollow) . ' href="' . esc_url($social_icon['icon_link']['url']) . '">';

                                            \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true']);

                                            echo '</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto col-xl-4">
                            <div class="widget widget_nav_menu  footer-widget">
                                <?php
                                if (!empty($settings['footer_title2'])) {
                                    echo '<h3 class="widget_title">' . htmlspecialchars_decode(esc_html($settings['footer_title2'])) . '</h3>';
                                }
                                ?>
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <?php
                                                foreach ($settings['uLinks_list'] as $list) {
                                                    if (!empty($list['uLinks_text'])) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($list['uLinks_link']['url']); ?>"><?php echo esc_html($list['uLinks_text']); ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="team.html">Team Members</a></li>
                                                <li><a href="contact.html">Career</a></li>
                                                <li><a href="price-plan.html">Our Pricing</a></li>
                                                <li><a href="service.html">Services</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-auto col-xl-4">
                            <div class="widget footer-widget">
                                <?php
                                if (!empty($settings['footer_title3'])) {
                                    echo '<h3 class="widget_title">' . htmlspecialchars_decode(esc_html($settings['footer_title3'])) . '</h3>';
                                }
                                ?>
                                <div class="sidebar-gallery">
                                    <?php
                                    foreach ($settings['pGallery_list'] as $list) {
                                        if (!empty($list['pGallery_image'])) {
                                            ?>
                                            <div class="gallery-thumb">
                                                <a href="<?php echo esc_url($list['pGallery_link']['url']); ?>">
                                                    <img src="<?php echo esc_url($list['pGallery_image']['url']); ?>"
                                                         alt="Gallery Image" class="w-100">
                                                </a>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <?php
                if (!empty($settings['fCopyright_text'])) {
                    echo '<p class="copyright-text">' . htmlspecialchars_decode(esc_html($settings['fCopyright_text'])) . '</p>';
                }
                ?>
            </div>
        </footer>

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Footer_Widget());