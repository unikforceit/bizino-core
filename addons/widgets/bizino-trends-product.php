<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Trend Products Widget .
 *
 */
class Bizino_Trends_Products_Widget extends Widget_Base{

	public function get_name() {
		return 'haarmaxtrendproduct';
	}

	public function get_title() {
		return __( 'Bizino Trends Products', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-product-images';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Trends','haarmax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'content', [
				'label' 		=> __( 'Content', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'price', [
				'label' 		=> __( 'Price', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'btn_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
            'image',
            [
                'label'     => __( 'Image', 'haarmax' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
		
		$this->add_control(
			'trends',
			[
				'label' 		=> __( 'Trends Product', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

		
		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'hover_effect',
			[
				'label' 		=> __( 'Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-trends-box .trends-body'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'header_effect',
			[
				'label' 		=> __( 'Header Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-trends-box .trends-header'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .trends-label'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .trends-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selectors' 	=> [
		 			'{{WRAPPER}} .trends-label',
		 			'{{WRAPPER}} .trends-title'
		 		]
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .trends-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .trends-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .trends-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .trends-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------content styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Content Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_content_color',
			[
				'label' 		=> __( 'Content Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .trends-text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_content_typography',
		 		'label' 		=> __( 'Content Typography', 'haarmax' ),
		 		'selectors' 	=> [
		 			'{{WRAPPER}} .trends-text',
		 		]
			]
		);

        $this->add_responsive_control(
			'features_content_margin',
			[
				'label' 		=> __( 'Content Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .trends-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_content_padding',
			[
				'label' 		=> __( 'Content Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .trends-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Price styling------------------------------------*/

		$this->start_controls_section(
			'price_styling',
			[
				'label' 	=> __( 'Price Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_price_color',
			[
				'label' 		=> __( 'Price Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_price_typography',
		 		'label' 		=> __( 'Price Typography', 'haarmax' ),
		 		'selectors' 	=> [
		 			'{{WRAPPER}} .price',
		 		]
			]
		);

        $this->add_responsive_control(
			'features_price_margin',
			[
				'label' 		=> __( 'Price Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_price_padding',
			[
				'label' 		=> __( 'Price Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'button_icon_color',
			[
				'label' 		=> __( 'Button Icon Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'button_hover_color',
			[
				'label' 		=> __( 'Button hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn:hover'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'button_icon_hover_color',
			[
				'label' 		=> __( 'Button Icon hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->end_controls_section();
 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Trends Area----------------------->';
			echo '<section class="vs-testimonial-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row gx-2 vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-sm-slide-show="2" data-dots="true" data-speed="1500">';
		                foreach( $settings['trends'] as $data ) {
		                	$link = $data['btn_link']['url'] ? $data['btn_link']['url'] : '#';

			                echo '<div class="col-xl-3 mb-30">';
			                    echo '<div class="vs-trends-box">';
			                    	if( ! empty( $data['image']['url'] ) ){
				                        echo '<div class="trends-img">';
				                            echo bizino_img_tag( array(
								                    'url'       => esc_url( $data['image']['url'] ),
								                    'class' 	=> 'w-100'
								                ) );
				                        echo '</div>';
				                    }
				                    if( ! empty( $data['title'] ) ){
				                        echo '<div class="trends-header">';
				                            echo '<h3 class="trends-label">'.esc_html( $data['title'] ).'</h3>';
				                        echo '</div>';
				                    }
			                        echo '<div class="trends-body">';
			                            echo '<div class="trends-content">';
			                            	if( ! empty( $data['title'] ) ){
				                                echo '<h4 class="trends-title"><a class="text-reset" href="'.esc_url($link).'">'.esc_html( $data['title'] ).'</a></h4>';
				                            }
				                            if( ! empty( $data['content'] ) ){
				                                echo '<p class="trends-text">'.esc_html( $data['content'] ).'</p>';
				                            }
			                            echo '</div>';
			                            echo '<div class="trends-actions">';
			                            	if( ! empty( $data['price'] ) ){
				                                echo '<span class="price">'.esc_html( $data['price'] ).'</span>';
				                            }
				                            if( ! empty( $link ) ){
				                                echo '<a href="'.esc_url($link).'" class="icon-btn"><i class="fas fa-chevron-right"></i></a>';
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		echo '<!-----------------------End Trends Area----------------------->';
	}
}