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
class Bizino_Packages_Widget extends Widget_Base{

	public function get_name() {
		return 'bizinopackage';
	}

	public function get_title() {
		return __( 'Bizino Package', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Package','bizino' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'package_style',
			[
				'label' 		=> __( 'Package Style', 'bizino' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'bizino' ),
					'two' 			=> __( 'Style Two', 'bizino' ),
					'three' 		=> __( 'Style Three', 'bizino' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'bizino' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'bizino' )
			]
        );

        $this->add_control(
			'content',
			[
				'label' 	=> __( 'Content', 'bizino' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Content', 'bizino' ),
                'condition'		=> [ 'package_style' =>  'one' ],
			]
        );

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'bizino' ),
                'type' 		=> Controls_Manager::TEXT,

                'default'  	=> __( 'Button Text', 'bizino' ),
                'condition'		=> [ 'package_style' =>  'one' ],
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 	=> __( 'Link', 'bizino' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bizino' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'package_style' =>  'one' ],
			]
		);
		/*-----------------------------------------package styling 1------------------------------------*/
		$repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label'     => __( 'Thumbnail Image', 'bizino' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Pricing Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'price', [
				'label' 		=> __( 'Price Plan', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'packages',
			[
				'label' 		=> __( 'Packages', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'bizino' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> [ 'package_style' => 'one' ],
			]
		);

		$repeater = new Repeater();

		/*-----------------------------------------package styling 2------------------------------------*/

        $repeater->add_control(
            'image',
            [
                'label'     => __( 'Thumbnail Image', 'bizino' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'content', [
				'label' 		=> __( 'Content List', 'bizino' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'price', [
				'label' 		=> __( 'Price Plan', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'packages_v2',
			[
				'label' 		=> __( 'Packages', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'bizino' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> [ 'package_style!' => 'one' ],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------subtitle styling------------------------------------*/

		$this->start_controls_section(
			'subtitle_styling',
			[
				'label' 	=> __( 'Subtitle Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'package_style' =>  'one' ],
			]
        );

        $this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sub-title'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'subtitle_typography',
		 		'label' 		=> __( 'Subtitle Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-packages-wrapper .sub-title'
			]
		);

        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sec-title'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Title Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-packages-wrapper .sec-title'
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'package_style' =>  'one' ],
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .text-inherit'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'button_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .text-inherit:hover'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Button Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-packages-wrapper .text-inherit'
			]
		);

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .text-inherit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-packages-wrapper .text-inherit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------offer styling------------------------------------*/

		$this->start_controls_section(
			'offer_styling',
			[
				'label' 	=> __( 'Offer Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'offer_color',
			[
				'label' 		=> __( 'Offer Rounded Background Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .offer-pill-2'	=> '--theme-color: {{VALUE}}',
				],
				'condition'		=> [ 'package_style' =>  'one' ],
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> __( 'Border', 'bizino' ),
				'selector' 		=> '{{WRAPPER}} .offer-pill-2::before',
				'condition'		=> [ 'package_style' =>  'one' ],
			]
		);

        $this->add_control(
			'offer_txt_color',
			[
				'label' 		=> __( 'Offer Text Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-label'	=> 'color: {{VALUE}}',
				],
				'condition'		=> [ 'package_style' =>  'one' ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'offer_txt_typography',
		 		'label' 		=> __( 'Offer Text Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .price-label',
		 		'condition'		=> [ 'package_style' =>  'one' ],
			]
		);
		$this->add_control(
			'price_txt_color',
			[
				'label' 		=> __( 'Price Text Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price'	=> 'color: {{VALUE}}',
					'{{WRAPPER}} .offers-price'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'price_txt_typography',
		 		'label' 		=> __( 'Price Text Typography', 'bizino' ),
		 		'selectors' 	=> [
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
				'label' 	=> __( 'Animation Control', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'package_style' =>  'two' ],
			]
        );

        $this->add_control(
			'shape_color',
			[
				'label' 		=> __( 'Shape Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .offers-box::before'	=> 'background-color: {{VALUE}}',
				],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Package Area----------------------->';
		if( $settings['package_style'] == 'one' ){
			echo '<section class="vs-packages-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row gx-60">';
		                echo '<div class="col-lg-5 align-self-center">';
		                    echo '<div class="d-flex flex-column align-items-center d-lg-block">';
		                        echo '<div class="order-1 order-lg-1">';
		                            echo '<div class="title-area mb-2 mb-lg-3 pb-lg-2 text-center text-lg-start">';
		                            	if( !empty( $settings['title'] ) ) {
			                                echo '<span class="sub-title">'.esc_html( $settings['title'] ).'</span>';
			                            }
			                            if( !empty( $settings['content'] ) ) {
			                                echo '<h2 class="sec-title">'.esc_html( $settings['content'] ).'</h2>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="order-3 w-100 order-lg-2">';
		                            echo '<div class="row gx-2 vs-packages-small" id="packSlide1">';
		                            	foreach ( $settings['packages'] as $single_data ) {
		                            		if( ! empty( $single_data['image']['url'] ) ){
				                                echo '<div class="col-xl-auto">';
				                                    echo '<div class="package-thumb">';
				                                        echo '<span class="thumb-icon"><i class="fas fa-plus"></i></span>';
				                                        echo bizino_img_tag( array(
		                                                    'url'   => esc_url( $single_data['image']['url'] ),
		                                                    'class' => 'w-100',
		                                                ) );
				                                    echo '</div>';
				                                echo '</div>';
				                            }
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        if( ! empty( $settings['button_text'] ) ){
			                        echo '<div class="order-2 order-lg-3">';
			                            echo '<div class="text-uppercase fw-semibold text-title mb-4 mb-lg-0 mt-lg-4 mt-xl-5 mb-n2">';
			                                echo '<a href="'.esc_url($settings['button_link']['url']).'" class="vs-btn">'.esc_html($settings['button_text']).' <i class="fas fa-chevron-right ms-2"></i></a>';
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-7 mt-30 mt-lg-0">';
		                    echo '<div class="package-banner vs-packages-big" id="packSlide2">';
		                    	foreach ( $settings['packages'] as $single_data ) {
			                        echo '<div class="package-banner-big">';
			                        	if( ! empty( $single_data['image']['url'] ) ){
				                        	echo bizino_img_tag( array(
		                                            'url'   => esc_url( $single_data['image']['url'] ),
		                                        ) );
				                        }
			                            echo '<div class="offer-pill-2">';
			                            	if( ! empty( $single_data['title'] ) ){
				                                echo '<span class="price-label">'.esc_html( $single_data['title'] ).'</span>';
				                            }
				                            if( ! empty( $single_data['price'] ) ){
				                                echo '<div class="price">'.esc_html( $single_data['price'] ).'</div>';
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}elseif( $settings['package_style'] == 'two' ){
			echo '<section class="vs-offers-wrapper space-bottom">';
		        echo '<div class="container-fluid px-xxl-0">';
		            echo '<div class="row offers-slide">';
		                foreach ( $settings['packages_v2'] as $single_data ) {
			                echo '<div class="col-xl-auto">';
			                    echo '<div class="offers-box" data-overlay="theme">';
			                    	if( ! empty( $single_data['image']['url'] ) ){
				                        echo '<div class="offers-img">';
				                            echo bizino_img_tag( array(
		                                            'url'   	=> esc_url( $single_data['image']['url'] ),
		                                            'class'  	=> 'w-100'
		                                        ) );
				                        echo '</div>';
				                    }
			                        echo '<div class="offers-content">';
			                        	if( ! empty( $single_data['title'] ) ){
				                            echo '<h3 class="offers-title">'.esc_html( $single_data['title'] ).'</h3>';
				                        }
				                        if( ! empty( $single_data['content'] ) ){
				                            echo '<div class="checked-list">';
				                                echo htmlspecialchars_decode(esc_html( $single_data['content'] ));
				                            echo '</div>';
				                        }
				                        if( ! empty( $single_data['price'] ) ){
				                            echo '<span class="offers-price">'.esc_html( $single_data['price'] ).'</span>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}else{
			echo '<section class="vs-offers-wrapper">';
		        echo '<div class="container mb-20 mt-20">';
		            echo '<div class="row gy-4">';
		                foreach ( $settings['packages_v2'] as $single_data ) {
			                echo '<div class="col-xl-auto">';
			                    echo '<div class="offers-box" data-overlay="theme">';
			                    	if( ! empty( $single_data['image']['url'] ) ){
				                        echo '<div class="offers-img">';
				                            echo bizino_img_tag( array(
		                                            'url'   	=> esc_url( $single_data['image']['url'] ),
		                                            'class'  	=> 'w-100'
		                                        ) );
				                        echo '</div>';
				                    }
			                        echo '<div class="offers-content">';
			                        	if( ! empty( $single_data['title'] ) ){
				                            echo '<h3 class="offers-title">'.esc_html( $single_data['title'] ).'</h3>';
				                        }
				                        if( ! empty( $single_data['content'] ) ){
				                            echo '<div class="checked-list">';
				                                echo htmlspecialchars_decode(esc_html( $single_data['content'] ));
				                            echo '</div>';
				                        }
				                        if( ! empty( $single_data['price'] ) ){
				                            echo '<span class="offers-price">'.esc_html( $single_data['price'] ).'</span>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}
		echo '<!-----------------------End Package Area----------------------->';
	}
}