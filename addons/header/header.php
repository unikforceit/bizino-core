<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Bizino_Header extends Widget_Base {

	public function get_name() {
		return 'haarmaxheader';
	}
	public function get_title() {
		return __( 'Bizino Header', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-header';
    }

	public function get_categories() {
		return [ 'haarmax_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'header_style',
			[
				'label' 	=> __( 'Style', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'haarmax' ),
					'2' => __( 'Style Two', 'haarmax' ),
					'3' => __( 'Style Three', 'haarmax' ),
				],
				'default' => '1',
			]
        );
        $this->add_control(
			'topbar_options',
			[
				'label' => __( 'Topbar Informations', 'haarmax' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'location_text',

			[
				'label' 		=> __( 'Location Text', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'placeholder' 	=> __( 'United State', 'haarmax' ),
			]
		);
		$this->add_control(
			'location',

			[
				'label' 		=> __( 'Office Location', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'placeholder' 	=> __( 'Google Map url', 'haarmax' ),
			]
		);

		$this->add_control(
			'contact_email',
			[
				'label' 		=> __( 'Contact Email', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'example@domain.com', 'haarmax' ),
				'condition'		=> [ 'header_style' => [ '1', '3' ] ],
				'rows' 			=> 2,
			]
		);
		$this->add_control(
			'contact_phone',
			[
				'label' 		=> __( 'Contact Phone', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '020 7388 5619', 'haarmax' ),
				'rows' 			=> 2,
				'condition'		=> [ 'header_style' => [ '1', '3' ] ],
			]
		);

		$this->add_control(
			'header_notice',
			[
				'label' 		=> __( 'Header Notice', 'medilax' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'condition'		=> [ 'header_style' => [ '2' ] ],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'medilax' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','medilax' ),
					],
				],
				'condition'		=> [ 'header_style' => [ '2' ] ],
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
				'label' 		=> __( 'Upload Logo', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
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
				'label' 		=> __( 'Button Text', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 	=> __( 'Link', 'medilax' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(
			'show_cart_count',
			[
				'label' 		=> __( 'Show Cart?', 'haarmax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'haarmax' ),
				'label_off' 	=> __( 'Hide', 'haarmax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();
       //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'topbar_styling',
			[
				'label'     => __( 'Topbar Styling', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_top_bar' => [ 'yes'] ],
			]
        );

        $this->add_control(

			'topbar_background_color',
			[

				'label'     => __( 'Background Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-wrapper .bg-title' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(

			'topbar_content_color',
			[

				'label'     => __( 'Topbar Content Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top-info li' => 'color: {{VALUE}}!important;',
                ],
			]
        );


        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'topbar_content_typography',
				'label'     => __( 'Content Typography', 'haarmax' ),
                'selector'  => '{{WRAPPER}} .header-top-info li',
			]
        );

        $this->add_control(
			'topbar_icon_color',
			[
				'label'     => __( 'Social Icon Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'topbar_icon_hover_color',
			[
				'label'     => __( 'Social Icon Hover Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
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
				'label'     => __( 'Menubar Styling', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_top_bar' => [ 'yes'] ],
			]
        );

        $this->add_control(
			'phone_color',
			[
				'label'     => __( 'Phone Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body a' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_control(
			'phone_hvr_color',
			[
				'label'     => __( 'Phone Hover Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body a:hover' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'phone_typography',
				'label'     => __( 'Phone Typography', 'haarmax' ),
                'selector'  => '{{WRAPPER}} .media-body a',
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'phone_icon_color',
			[
				'label'     => __( 'Phone Icon Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'icon_bg_color',
			[
				'label'     => __( 'Icon Background Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon' => 'background-color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_control(
			'icon_shake_color',
			[
				'label'     => __( 'Icon Shake Color', 'haarmax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon::after,
					 {{WRAPPER}} .phone-box .box-icon::before' => 'background-color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'top_level_menu_color',
			[
				'label' 		=> __( 'Menu Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'haarmax' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'haarmax' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'haarmax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
                ]
			]
		);

		$this->end_controls_section();

		//-----------------------------------menu bottom notice Styling-------------------------------------//
        $this->start_controls_section(
			'notice_styling',
			[
				'label'     => __( 'Notice Box Styling', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_header_notice' => [ 'yes'] ],
			]
        );

		$this->add_control(
			'notice_color',
			[
				'label' 		=> __( 'Background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-notice' => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} [data-overlay="title"]::before' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

		//-----------------------------------wishlist Styling-------------------------------------//
        $this->start_controls_section(
			'wishlist_styling',
			[
				'label'     => __( 'Wishlist Styling', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'wishlist_icon_color',
			[
				'label' 		=> __( 'Wishlist Icon Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_color_hover',
			[
				'label' 		=> __( 'Wishlist Icon Color On Hover', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_background_color',
			[
				'label' 		=> __( 'Wishlist Icon Background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter.icon-btn i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_background_color_hover',
			[
				'label' 		=> __( 'Wishlist Icon Background Color Hover', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter.icon-btn:hover i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_count_background',
			[
				'label' 		=> __( 'Wishlist Count Background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter .badge' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		//-----------------------------------wishlist Styling-------------------------------------//
        $this->start_controls_section(
			'cart_styling',
			[
				'label'     => __( 'Cart Styling', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'cart_icon_color',
			[
				'label' 		=> __( 'Cart Icon Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_hover_color',
			[
				'label' 		=> __( 'Cart Icon Hover Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_backgroound_color',
			[
				'label' 		=> __( 'Cart Icon background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_backgroound_hover_color',
			[
				'label' 		=> __( 'Cart Icon Background Hover Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn:hover i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_count_backgroound_color',
			[
				'label' 		=> __( 'Cart Count Background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn .badge' => 'background-color: {{VALUE}}',
				],
				'separator'		=> 'after',
			]
		);
        $this->end_controls_section();

        /*-----------------------------------------button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn.style2',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn.style2'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();


        if( $settings['header_style'] == '1' ) {
        	echo '<!--===================== Header Area =====================-->';
	        echo '<div class="vs-header header-layout1">';

                $mobile    	= $settings['contact_phone'];
                $email    	= $settings['contact_email'];

                $email          = is_email( $email );

                $replace        = array(' ','-',' - ');
                $with           = array('','','');

                $emailurl       = str_replace( $replace, $with, $email );
                $mobileurl      = str_replace( $replace, $with, $mobile );

                echo '<!-- Header Top Area -->';
                echo '<div class="header-top py-15 d-none d-sm-block">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center justify-content-center justify-content-lg-between">';
                            if( ! empty( $settings['location'] ) ){
                                echo '<div class="col-sm-auto d-none d-lg-block">';
									echo '<div class="header-info-list text-white">';
	                                    echo '<ul>';
	                                    echo '<li><i class="fal fa-map-marker-alt me-2"></i> <a href="'.esc_url( $settings['location'] ).'" class="text-reset">'.esc_html( $settings['location_text'] ).'</a></li>';
										echo '</ul>';
									echo '</div>';
								echo '</div>';
                            }
                            echo '<div class="col-auto">';
                                echo '<div class="header-info-list text-white">';
                                    echo '<ul>';
                                        if( ! empty( $mobile ) ){

                                            echo '<li><i class="fas fa-phone-alt"></i>'.esc_html__('Phone:', 'haarmax').' <a class="text-reset" href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a></li>';
                                        }
                                        if( ! empty( $email ) ){
                                            echo '<li><i class="fal fa-envelope"></i>'.esc_html__('Email:', 'haarmax').' <a class="text-reset" href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></li>';
                                        }

                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
	            echo '<div class="sticky-wrapper">';
	                echo '<div class="sticky-active">';
	                   echo ' <!-- Main Menu Area -->';
	                    echo '<div class="header-inner">';
	                        echo '<div class="container">';
	                            echo '<div class="row align-items-center justify-content-between">';
	                                echo '<div class="col-7 col-sm-auto order-1">';
	                                	if( ! empty( $settings['logo_image']['url'] ) ){
			                            echo '<div class="header-logo py-2 py-lg-0">';
			                                    echo '<a href="'.esc_url( home_url( '/' ) ).'">';
			                                    echo bizino_img_tag( array(
													'url'	=> esc_url( $settings['logo_image']['url'] ),
													'class' => 'logo-img',
												) );
			                                    echo '</a>';
			                             echo '</div>';
				                        }
	                                echo '</div>';
	                                echo '<div class="col-auto order-3 order-sm-2">';
	                                    echo '<nav class="main-menu menu-style1 d-none d-lg-block">';
	                                        if( has_nav_menu('primary-menu') ) {
	                                            wp_nav_menu( array(
	                                            "theme_location"    => 'primary-menu',
	                                            "container"         => '',
	                                            "menu_class"        => ''
	                                            ) );
	                                        }
	                                    echo '</nav>';
	                                echo '</div>';
	                                echo '<div class="col-5 col-sm-auto order-2 order-sm-3 text-end">';
	                                    echo '<div class="header-btn">';
	                                    	if( class_exists( 'woocommerce' ) && $settings['show_cart_count'] == 'yes' ){
												global $woocommerce;
												if( ! empty( $woocommerce->cart->cart_contents_count ) ){
													$count = $woocommerce->cart->cart_contents_count;
												}else{
													$count = "0";
												}
		                                        echo '<a href="'.wc_get_cart_url().'" class="cart-icon me-4 me-lg-3 mr-xl-0 has-badge sideMenuToggler"><i class="fal fa-shopping-cart"></i><span class="badge">'.esc_html( $count ).'</span></a>';
		                                    }
		                                    if( ! empty( $settings['button_text'] ) ){
		                                        echo '<a href="'.esc_url($settings['button_url']['url']).'" class="vs-btn d-none d-xl-inline-block">'.esc_html($settings['button_text']).'</a>';
		                                    }
	                                        echo '<button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';

	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
        }elseif( $settings['header_style'] == '2' ){
        	echo '<div class="header-top-style2 bg-black d-none d-md-block">';
		        echo '<div class="container">';
		            echo '<div class="row justify-content-between align-items-center">';
		                echo '<div class="col-auto">';
		                    echo '<button type="button" class="hamburger-btn vs-menu-toggle">';
		                        echo '<span class="bar">';
		                            echo '<span class="inner"></span>';
		                            echo '<span class="hidden"></span>';
		                        echo '</span>';
		                    echo '</button>';
		                echo '</div>';
		                if(!empty($settings['header_notice'])){
			                echo '<div class="col-auto d-none d-md-block">';
			                    echo '<p class="text-white mb-0">'.wp_kses_post( $settings['header_notice'] ).'</p>';
			                echo '</div>';
			            }

		                if( class_exists( 'woocommerce' ) && $settings['show_cart_count'] == 'yes' ){
							global $woocommerce;
							if( ! empty( $woocommerce->cart->cart_contents_count ) ){
								$count = $woocommerce->cart->cart_contents_count;
							}else{
								$count = "0";
							}
							echo '<div class="col-auto">';
                            	echo '<a href="'.wc_get_cart_url().'" class="cart-icon text-white"><i class="fal fa-shopping-cart"></i><span class="badge bg-theme">'.esc_html( $count ).'</span></a>';
                            echo '</div>';
                        }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		    echo '<div class="vs-header header-layout2">';
		        echo '<div class="header-transparent">';
		            echo '<div class="container">';
		                echo '<div class="row justify-content-between align-items-center">';
		                    echo '<div class="col-auto d-none d-lg-block">';
		                        echo '<div class="outline-social ">';
		                            echo '<ul>';
		                                foreach( $settings['social_icon_list'] as $social_icon ){

											$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';

											$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

			                            	echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

												\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

											echo '</a></li>';
										}
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-9 col-sm-auto">';
		                    	if( ! empty( $settings['logo_image']['url'] ) ){
		                            echo '<div class="header-logo">';
		                                    echo '<a href="'.esc_url( home_url( '/' ) ).'">';
		                                    echo bizino_img_tag( array(
												'url'	=> esc_url( $settings['logo_image']['url'] ),
											) );
		                                    echo '</a>';
		                             echo '</div>';
			                        }
		                    echo '</div>';
		                    echo '<div class="col col-sm-auto text-end">';
		                        echo '<button class="vs-menu-toggle d-inline-block d-md-none"><i class="fas fa-bars"></i></button>';
		                        echo '<div class="header-btn d-none d-md-block">';
			                        if( ! empty( $settings['button_text'] ) ){
                                        echo '<a href="'.esc_url($settings['button_url']['url']).'" class="vs-btn outline-white">'.esc_html($settings['button_text']).'</a>';
                                    }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
        }else{
        	$mobile    	= $settings['contact_phone'];
            $email    	= $settings['contact_email'];;

            $email          = is_email( $email );

            $replace        = array(' ','-',' - ');
            $with           = array('','','');

            $emailurl       = str_replace( $replace, $with, $email );
            $mobileurl      = str_replace( $replace, $with, $mobile );

        	echo '<div class="vs-header header-layout3">';
		        echo '<!-- Header Top Area -->';
		        echo '<div class="header-top py-15 d-none d-sm-block">';
		            echo '<div class="container">';
		                echo '<div class="row align-items-center justify-content-center justify-content-lg-between">';
							if( ! empty( $settings['location'] ) ){
								echo '<div class="col-sm-auto d-none d-lg-block">';
									echo '<div class="header-info-list text-white">';
										echo '<ul>';
										echo '<li><i class="fal fa-map-marker-alt me-2"></i> <a href="'.esc_url( $settings['location'] ).'" class="text-reset">'.esc_html( $settings['location_text'] ).'</a></li>';
										echo '</ul>';
									echo '</div>';
								echo '</div>';
							}
		                    echo '<div class="col-auto">';
		                        echo '<div class="header-info-list text-white">';
		                            echo '<ul>';
										if( ! empty( $mobile ) ){
										echo '<li><i class="fas fa-phone-alt"></i>'.esc_html__('Phone:', 'haarmax').' <a class="text-reset" href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a></li>';
										}
										if( ! empty( $email ) ){
										echo '<li><i class="fal fa-envelope"></i>'.esc_html__('Email:', 'haarmax').' <a class="text-reset" href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></li>';
										}
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="sticky-wrapper">';
		            echo '<div class="sticky-active">';
		                echo '<!-- Main Menu Area -->';
		                echo '<div class="header-inner-style2">';
		                    echo '<div class="container py-3 py-lg-0">';
		                        echo '<div class="row align-items-center justify-content-between">';
		                            echo '<div class="col-9 col-sm-auto">';
		                                if( ! empty( $settings['logo_image']['url'] ) ){
			                            echo '<div class="header-logo">';
			                                    echo '<a href="'.esc_url( home_url( '/' ) ).'">';
				                                    echo bizino_img_tag( array(
														'url'	=> esc_url( $settings['logo_image']['url'] ),
														'class' => 'logo-img',
													) );
			                                    echo '</a>';
			                             echo '</div>';
				                        }
		                            echo '</div>';
		                            echo '<div class="col col-sm-auto text-end text-lg-start">';
		                                echo '<nav class="main-menu menu-style1 d-none d-lg-block">';
		                                   	if( has_nav_menu('primary-menu') ) {
	                                            wp_nav_menu( array(
	                                            "theme_location"    => 'primary-menu',
	                                            "container"         => '',
	                                            "menu_class"        => ''
	                                            ) );
	                                        }
		                                echo '</nav>';
		                                echo '<button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
		                            echo '</div>';
		                            echo '<div class="col-auto d-none d-xl-block">';
		                                echo '<div class="header-btn">';
		                                    if( class_exists( 'woocommerce' ) && $settings['show_cart_count'] == 'yes' ){
												global $woocommerce;
												if( ! empty( $woocommerce->cart->cart_contents_count ) ){
													$count = $woocommerce->cart->cart_contents_count;
												}else{
													$count = "0";
												}
		                                        echo '<a href="'.wc_get_cart_url().'" class="cart-icon me-4 me-lg-3 mr-xl-0 has-badge sideMenuToggler"><i class="fal fa-shopping-cart"></i><span class="badge">'.esc_html( $count ).'</span></a>';
		                                    }
		                                    if( ! empty( $settings['button_text'] ) ){
		                                        echo '<a href="'.esc_url($settings['button_url']['url']).'" class="vs-btn d-none d-xl-inline-block">'.esc_html($settings['button_text']).'</a>';
		                                    }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
        }
        echo '<!--=======================Mobile Menu======================= -->';
        echo '<div class="vs-menu-wrapper">';
            echo '<div class="vs-menu-area text-center">';
                echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';

                echo '<div class="mobile-logo">';
                    echo bizino_theme_mobile_logo();
                echo '</div>';
                echo '<div class="vs-mobile-menu">';
                    if( has_nav_menu('mobile-menu') ) {
                        wp_nav_menu( array(
                            "theme_location"    => 'mobile-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}
}