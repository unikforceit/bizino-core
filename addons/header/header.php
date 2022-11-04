<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Header Widget .
 *
 */
class Bizino_Header extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoheader';
    }

    public function get_title()
    {
        return __('Bizino Header', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-header';
    }

    public function get_categories()
    {
        return ['bizino_header_elements'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'header_section',
            [
                'label' => __('Header', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'header_style',
            [
                'label' => __('Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                    '3' => __('Style Three', 'bizino'),
                ],
                'default' => '1',
            ]
        );
        $this->add_control(
            'topbar_options',
            [
                'label' => __('Topbar Informations', 'bizino'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'location_text',

            [
                'label' => __('Location Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('250 Main Street, 2nd Floor. USA', 'bizino'),
            ]
        );

        $this->add_control(
            'contact_email',
            [
                'label' => __('Contact Email', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('info@domain.com', 'bizino'),
                'condition' => ['header_style' => ['1', '2']],
                'rows' => 2,
            ]
        );
        $this->add_control(

            'contact_phone_img',

            [
                'label' => __('Phone Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'contact_phone',
            [
                'label' => __('Contact Phone', 'haarmax'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('020 7388 5619', 'haarmax'),
                'rows' => 2,
            ]
        );

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
                ],
            ]
        );

        //---------------------------Main Menu Controls---------------------------//

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(

            'logo_image',

            [
                'label' => __('Upload Logo', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hr1',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bizino'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'button_url',
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

        $this->end_controls_section();
        //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
            'topbar_styling',
            [
                'label' => __('Topbar Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['show_top_bar' => ['yes']],
            ]
        );

        $this->add_control(

            'topbar_background_color',
            [

                'label' => __('Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-wrapper .bg-title' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_control(

            'topbar_content_color',
            [

                'label' => __('Topbar Content Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-top-info li' => 'color: {{VALUE}}!important;',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),

            [
                'name' => 'topbar_content_typography',
                'label' => __('Content Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .header-top-info li',
            ]
        );

        $this->add_control(
            'topbar_icon_color',
            [
                'label' => __('Social Icon Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-social a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'topbar_icon_hover_color',
            [
                'label' => __('Social Icon Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-social a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
            'menubar_styling',
            [
                'label' => __('Menubar Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'phone_color',
            [
                'label' => __('Phone Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .media-body a' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_control(
            'phone_hvr_color',
            [
                'label' => __('Phone Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .media-body a:hover' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),

            [
                'name' => 'phone_typography',
                'label' => __('Phone Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .media-body a',
            ]
        );

        $this->add_control(
            'phone_icon_color',
            [
                'label' => __('Phone Icon Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .phone-box .box-icon' => 'color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __('Icon Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .phone-box .box-icon' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_control(
            'icon_shake_color',
            [
                'label' => __('Icon Shake Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .phone-box .box-icon::after,
					 {{WRAPPER}} .phone-box .box-icon::before' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );

        $this->add_control(
            'top_level_menu_color',
            [
                'label' => __('Menu Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
            ]
        );
        $this->add_control(
            'top_level_menu_hover_color',
            [
                'label' => __('Menu Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'top_level_menu_typography',
                'label' => __('Menu Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .main-menu ul > li > a',
            ]
        );

        $this->add_responsive_control(
            'top_level_menu_margin',
            [
                'label' => __('Menu Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
            ]
        );

        $this->add_responsive_control(
            'top_level_menu_padding',
            [
                'label' => __('Menu Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
            ]
        );

        $this->add_control(
            'top_level_menu_height',
            [
                'label' => __('Height', 'bizino'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                        'max' => 500
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
                ]
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
                'selector' => '{{WRAPPER}} .vs-btn.style2',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style2' => 'background-color: {{VALUE}}!important;',
                    '{{WRAPPER}} .vs-btn.style2 i' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'btn_hvr_color',
            [
                'label' => __('Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style2:hover' => 'background-color: {{VALUE}}!important;',
                    '{{WRAPPER}} .vs-btn.style2:hover i' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .vs-btn.style2'
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => __('Text Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style2' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .vs-btn.style2 i' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'btn_text_hvr_color',
            [
                'label' => __('Text Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vs-btn.style2:hover' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .vs-btn.style2:hover i' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $location = $settings['location_text'];
        $email = $settings['contact_email'];
        $mobile = $settings['contact_phone'];

        $email = is_email($email);

        $replace = array(' ', '-', ' - ');
        $with = array('', '', '');

        $emailurl = str_replace($replace, $with, $email);
        $mobileurl = str_replace($replace, $with, $mobile);
        ?>
        <!--==============================
           Mobile Menu
           ============================== -->
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <?php echo bizino_theme_mobile_logo(); ?>
                </div>
                <div class="vs-mobile-menu">
                    <?php
                    if (has_nav_menu('mobile-menu')) {
                        wp_nav_menu(array(
                            "theme_location" => 'mobile-menu',
                            "container" => '',
                            "menu_class" => ''
                        ));
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ($settings['header_style'] == '1') {
            ?>
            <!--==============================
                Header Area
            ==============================-->
            <section class="vs-header header-layout2">
                <div class="header-top">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col d-none d-lg-block">
                                <div class="header-links">
                                    <ul>
                                        <?php
                                        if (!empty($email)) {
                                            echo '<li><i class="fal fa-envelope-open-text"></i><a class="text-reset" href="' . esc_attr('mailto:' . $emailurl) . '">' . esc_html($email) . '</a></li>';
                                        }
                                        if (!empty($location)) {

                                            echo '<li><i class="far fa-map-marker-alt"></i>' . esc_html($location) . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe"></i>English</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">German</a>
                                            <a href="#">French</a>
                                            <a href="#">Italian</a>
                                            <a href="#">Latvian</a>
                                            <a href="#">Spanish</a>
                                            <a href="#">Greek</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-social">
                                    <span class="social-label">Get In Touch:</span>
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
                </div>
                <div class="sticky-wrapper">
                    <div class="sticky-active">
                        <!-- Main Menu Area -->
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <?php
                                if (!empty($settings['logo_image']['url'])) {
                                    echo '<div class="col-auto">
                                            <div class="header-logo">';
                                    echo '<a href="' . esc_url(home_url('/')) . '">';
                                    echo bizino_img_tag(array(
                                        'url' => esc_url($settings['logo_image']['url']),
                                        'class' => 'logo-img',
                                    ));
                                    echo '</a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                                <div class="col-auto col-xl text-xl-center">
                                    <nav class="main-menu menu-style1 d-none d-lg-block">
                                        <?php
                                        if (has_nav_menu('primary-menu')) {
                                            wp_nav_menu(array(
                                                "theme_location" => 'primary-menu',
                                                "container" => '',
                                                "menu_class" => ''
                                            ));
                                        }
                                        ?>
                                    </nav>
                                    <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i>
                                    </button>
                                </div>
                                <?php
                                if (!empty($mobile)) {
                                    echo '<div class="col-auto d-none d-xxl-block">
                                           <a class="header-number" href="' . esc_attr('tel:' . $mobileurl) . '">'.bizino_img_tag(array(
                                            'url' => esc_url($settings['contact_phone_img']['url']),
                                            'class' => '',
                                        )).' ' . esc_html($mobile) . '</a>
                                        </div>';
                                }
                                ?>
                                <?php
                                if (!empty($settings['button_text'])) {
                                    echo '<div class="col-auto d-none d-xl-block">
                                            <a href="' . esc_url($settings['button_url']['url']) . '" class="vs-btn">' . esc_html($settings['button_text']) . '</a>
                                          </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        } elseif ($settings['header_style'] == '2') {
            ?>
            <!--==============================
            Header Area
            ==============================-->
            <section class="vs-header header-layout3">
                <div class="header-top">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col d-none d-lg-block">
                                <div class="header-links">
                                    <ul>
                                        <?php
                                        if (!empty($email)) {
                                            echo '<li><i class="fal fa-envelope-open-text"></i><a class="text-reset" href="' . esc_attr('mailto:' . $emailurl) . '">' . esc_html($email) . '</a></li>';
                                        }
                                        if (!empty($location)) {

                                            echo '<li><i class="far fa-map-marker-alt"></i>' . esc_html($location) . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe"></i>English</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">German</a>
                                            <a href="#">French</a>
                                            <a href="#">Italian</a>
                                            <a href="#">Latvian</a>
                                            <a href="#">Spanish</a>
                                            <a href="#">Greek</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-social">
                                    <span class="social-label">Get In Touch:</span>
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
                </div>
                <div class="sticky-wrapper">
                    <div class="sticky-active">
                        <div class="menu-area">
                            <!-- Main Menu Area -->
                            <div class="container">
                                <div class="row align-items-center justify-content-between">
                                    <?php
                                    if (!empty($settings['logo_image']['url'])) {
                                        echo '<div class="col-auto">
                                            <div class="header-logo">';
                                        echo '<a href="' . esc_url(home_url('/')) . '">';
                                        echo bizino_img_tag(array(
                                            'url' => esc_url($settings['logo_image']['url']),
                                            'class' => 'logo-img',
                                        ));
                                        echo '</a>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="col-auto col-xl text-xl-center">
                                        <nav class="main-menu menu-style2 d-none d-lg-block">
                                            <?php
                                            if (has_nav_menu('primary-menu')) {
                                                wp_nav_menu(array(
                                                    "theme_location" => 'primary-menu',
                                                    "container" => '',
                                                    "menu_class" => ''
                                                ));
                                            }
                                            ?>
                                        </nav>
                                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i
                                                    class="fal fa-bars"></i></button>
                                    </div>
                                    <?php
                                    if (!empty($mobile)) {
                                        echo '<div class="col-auto d-none d-xxl-block">
                                           <a class="header-number" href="' . esc_attr('tel:' . $mobileurl) . '">'.bizino_img_tag(array(
                                                'url' => esc_url($settings['contact_phone_img']['url']),
                                                'class' => '',
                                            )).' ' . esc_html($mobile) . '</a>
                                        </div>';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($settings['button_text'])) {
                                        echo '<div class="col-auto d-none d-xl-block">
                                            <a href="' . esc_url($settings['button_url']['url']) . '" class="vs-btn">' . esc_html($settings['button_text']) . '</a>
                                          </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        } else {
            ?>
            <!--==============================
                Header Area
            ==============================-->
            <section class="vs-header header-layout4">
                <div class="header-top">
                    <div class="container">
                        <div class="row justify-content-between justify-content-xl-end align-items-center">
                            <div class="col-auto">
                                <div class="header-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe"></i>English</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">German</a>
                                            <a href="#">French</a>
                                            <a href="#">Italian</a>
                                            <a href="#">Latvian</a>
                                            <a href="#">Spanish</a>
                                            <a href="#">Greek</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-social">
                                    <span class="social-label">Get In Touch:</span>
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
                </div>
                <div class="sticky-wrapper">
                    <div class="sticky-active">
                        <div class="menu-area">
                            <!-- Main Menu Area -->
                            <div class="container">
                                <div class="row align-items-center justify-content-between">
                                    <?php
                                    if (!empty($settings['logo_image']['url'])) {
                                        echo '<div class="col-auto">
                                            <div class="header-logo">';
                                        echo '<a href="' . esc_url(home_url('/')) . '">';
                                        echo bizino_img_tag(array(
                                            'url' => esc_url($settings['logo_image']['url']),
                                            'class' => 'logo-img',
                                        ));
                                        echo '</a>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="col-auto col-xl text-xl-center">
                                        <nav class="main-menu menu-style3 d-none d-lg-block">
                                            <?php
                                            if (has_nav_menu('primary-menu')) {
                                                wp_nav_menu(array(
                                                    "theme_location" => 'primary-menu',
                                                    "container" => '',
                                                    "menu_class" => ''
                                                ));
                                            }
                                            ?>
                                        </nav>
                                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i
                                                    class="fal fa-bars"></i></button>
                                    </div>
                                    <?php
                                    if (!empty($mobile)) {
                                        echo '<div class="col-auto d-none d-xxl-block">
                                           <a class="header-number" href="' . esc_attr('tel:' . $mobileurl) . '">'.bizino_img_tag(array(
                                                'url' => esc_url($settings['contact_phone_img']['url']),
                                                'class' => '',
                                            )).'' . esc_html($mobile) . '</a>
                                        </div>';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($settings['button_text'])) {
                                        echo '<div class="col-auto d-none d-xl-block">
                                            <a href="' . esc_url($settings['button_url']['url']) . '" class="vs-btn">' . esc_html($settings['button_text']) . '</a>
                                          </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Header());