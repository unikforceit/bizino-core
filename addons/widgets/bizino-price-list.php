<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Price List Widget .
 *
 */
class Bizino_Price_List_Widget extends Widget_Base{

	public function get_name() {
		return 'bizinopricelist';
	}

	public function get_title() {
		return __( 'Bizino Price List', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-price-table';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Price List','bizino' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'pricing_style',
			[
				'label' 		=> __( 'Price List Style', 'bizino' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'bizino' ),
					'two' 			=> __( 'Style Two', 'bizino' ),
					'three' 		=> __( 'Style Three', 'bizino' ),
					'four' 			=> __( 'Style Four', 'bizino' ),
				],
			]
		);

		/*-----------------------------------------style one ------------------------------------*/
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
				'label' 		=> __( 'Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Price Plan', 'bizino' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'bizino' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Button Text', 'bizino' ),
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'bizino' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'bizino' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'pricing_table',
			[
				'label' 		=> __( 'Price Table', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'bizino' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> [ 'pricing_style' => 'one' ],
			]
		);


		/*-----------------------------------------style two ------------------------------------*/

		$this->add_control(
			'posts_per_page',
			[
				'label' 		=> esc_html__( 'Slide to show', 'bizino' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 1,
						'max' 			=> 4,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'condition'	=> [ 'pricing_style' => 'two' ],
			]
		);
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
            'image_icon',
            [
                'label'     => __( 'Icon', 'bizino' ),
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
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Price Plan', 'bizino' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'pricing_table_v2',
			[
				'label' 		=> __( 'Price Table', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'bizino' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> [ 'pricing_style' => 'two' ],
			]
		);


		/*-----------------------------------------style three ------------------------------------*/
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
			'price_title', [
				'label' 		=> __( 'Pricing Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'price_desc', [
				'label' 		=> __( 'Price Plan', 'bizino' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'content_title', [
				'label' 		=> __( 'Content Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'content_desc', [
				'label' 		=> __( 'Content Description', 'bizino' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'bizino' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Button Text', 'bizino' ),
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'bizino' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'bizino' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'pricing_table_v3',
			[
				'label' 		=> __( 'Price Table', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'bizino' ),
					],
				],
				'title_field' 	=> '{{{ price_title }}}',
				'condition'		=> [ 'pricing_style' =>  ['three','four']  ],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'pricing_style' =>  ['one','two']  ],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 			=> 'background',
				'label' 		=> __( 'Price Plan Background', 'bizino' ),
				'types' 		=> [ 'classic', 'gradient', 'video' ],
				'selector' 		=> '{{WRAPPER}} .price-list-box .price-content',
				'condition'		=> [ 'pricing_style' => 'one' ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .price-list-box .price-content',
				'condition'	=> [ 'pricing_style' => 'one' ],
			]
		);
		$this->add_control(
			'width',
			[
				'label' 	=> __( 'Box Radious', 'bizino' ),
				'type' 		=> Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .price-list-box .price-content' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [ 'pricing_style' => 'one' ],
			]
		);

		$this->add_control(
			'body_color',
			[
				'label' 		=> __( 'Price Box Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-grid .price-shape2:before '	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .price-grid .price-shape2:after '	=> 'background-color: {{VALUE}}!important;',
				],
				'condition'	=> [ 'pricing_style' => 'two' ],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 			=> 'background_control',
				'label' 		=> __( 'Hover Effect', 'bizino' ),
				'types' 		=> [ 'classic', 'gradient', 'video' ],
				'selector' 		=> '{{WRAPPER}} .price-grid:before',
				'condition'		=> [ 'pricing_style' => 'two' ],
			]
		);



		$this->add_control(
			'shape_color',
			[
				'label' 		=> __( 'Shape Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-grid .price-shape:before'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .price-grid .price-shape:after'	=> 'background-color: {{VALUE}}!important;',
				],
				'condition'	=> [ 'pricing_style' => 'two' ],
			]
        );

		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_title_color',
			[
				'label' 		=> __( 'Title Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-wrapper .price-title'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .price-plan-wrapper .package-name'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .price-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'bizino' ),
		 		'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-wrapper .price-title',
					'{{WRAPPER}} .price-plan-wrapper .package-name',
					'{{WRAPPER}} .price-title',
				],
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-wrapper .price-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-plan-wrapper .package-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-wrapper .price-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-plan-wrapper .package-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------content styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Content Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'pricing_style' =>  ['three', 'four']  ],
			]
        );

        $this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Content Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Content Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .price-text',
			]
		);

        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Content Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Title Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------price title styling------------------------------------*/

		$this->start_controls_section(
			'price_title_styling',
			[
				'label' 	=> __( 'Price Title Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'pricing_style' =>  ['three', 'four']  ],
			]
        );

        $this->add_control(
			'price_title_color',
			[
				'label' 		=> __( 'Title Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pack-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'price_title_typography',
		 		'label' 		=> __( 'Title Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .pack-title',
			]
		);

        $this->add_responsive_control(
			'price_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pack-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'price_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pack-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'pricing_style' =>  ['one', 'three', 'four']  ],
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn::after'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn::after'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();

        /*-----------------------------------------Arrow styling------------------------------------*/

		$this->start_controls_section(
			'arrow_styling',
			[
				'label' 	=> __( 'Arrow Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'pricing_style' =>  ['one', 'three', 'four']  ],
			]
        );

        $this->add_control(
			'arrow_color',
			[
				'label' 		=> __( 'Arrow Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow'	=> '--title-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'arrow_hvr_color',
			[
				'label' 		=> __( 'Arrow Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover'	=> '--theme-color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Price List Area----------------------->';
		if( $settings['pricing_style'] == 'one' ){
			echo '<div class="vs-pricing-wrapper price-layout1">';
		        echo '<div class="container-fluid">';
		            echo '<div class="row price-plan-slide gx-70">';
		            	foreach( $settings['pricing_table'] as $data ) {
			                echo '<div class="col-xl-4">';
			                    echo '<div class="price-list-box">';
				                    if( ! empty( $data['image']['url'] ) ){
				                        echo '<div class="price-img background-image" style="background-image: url('.esc_url( $data['image']['url']).');"></div>';
				                    }
			                        echo '<div class="price-content">';
			                        	if( ! empty( $data['title'] ) ){
				                            echo '<h2 class="price-title h1">'.esc_html( $data['title'] ).'</h2>';
				                        }
				                        if(!empty($data['desc'])){
				                            echo '<div class="price-list">';
												echo htmlspecialchars_decode(esc_html( $data['desc'] ));
				                            echo '</div>';
			                            }
			                            if( ! empty( $data['button_text'] ) ){
				                            echo '<a href="'.esc_url($data['button_link']['url']).'" class="vs-btn">'.esc_html($data['button_text']).'</a>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['pricing_style'] == 'two' ){
			echo '<div class="price-plan-wrapper">';
			    echo '<div class="container">';
			        echo '<div class="price-plan-style-2 row gx-4">';
			        	foreach( $settings['pricing_table_v2'] as $data ) {
				            echo '<div class="col-md-6 col-xl-4 mb-30">';
								if( ! empty( $data['image']['url'] ) ){
								    echo '<div class="price-grid" data-bg-src="'.esc_url( $data['image']['url'] ).'">';
								}
							        echo '<div class="price-shape"></div>';
							        echo '<div class="price-shape2"></div>';
							        echo '<div class="price-shape3"></div>';
							        if( ! empty( $data['image_icon']['url'] ) ){
							            echo '<div class="price-icon">';
							            	echo bizino_img_tag( array(
							                    'url'       => esc_url( $data['image_icon']['url'] ),
							                ) );
							            echo '</div>';
							        }
							        if( ! empty( $data['title'] ) ){
								        echo '<h3 class="package-name">'.esc_html( $data['title'] ).'</h3>';
								    }
							        if(!empty($data['desc'])){
							            echo '<div class="price-list">';
											echo htmlspecialchars_decode(esc_html( $data['desc'] ));
							            echo '</div>';
							        }
							    if( ! empty( $data['image']['url'] ) ){
								    echo '</div>';
								}
							echo '</div>';
				        }
			        echo '</div>';
			    echo '</div>';
			echo '</div>';
		}elseif( $settings['pricing_style'] == 'three' ){
			echo '<div class="vs-price-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="price-plan-style-3">';
		            	foreach( $settings['pricing_table_v3'] as $data ) {
			                echo '<div class="vs-price-morp">';
			                    echo '<div class="row justify-content-center justify-content-lg-end align-items-center gx-xl-5 text-center text-lg-start">';
			                        echo '<div class="col-md order-2 order-sm-1 mt-35 mt-sm-0">';
			                            echo '<div class="price-pack">';
			                            	if( ! empty( $data['price_title'] ) ){
				                                echo '<h3 class="pack-title">'.esc_html( $data['price_title'] ).'</h3>';
				                            }
				                            if(!empty($data['price_desc'])){
				                            	echo htmlspecialchars_decode(esc_html( $data['price_desc'] ));
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                        echo '<div class="col-md-8 col-lg-auto col-xl-auto text-end  order-1 order-sm-2">';
			                        	if( ! empty( $data['image']['url'] ) ){
				                            echo '<div class="price-img transform-banner">';
				                            		echo bizino_img_tag( array(
									                    'url'       => esc_url( $data['image']['url'] ),
									                ) );
				                            echo '</div>';
				                        }
			                        echo '</div>';
			                        echo '<div class="col-md-10 col-lg-4 col-xl-4 mt-40 mt-lg-0  order-3">';
			                            echo '<div class="price-content">';
			                            	if( ! empty( $data['content_title'] ) ){
				                                echo '<h3 class="price-title mt-n2">'.esc_html( $data['content_title'] ).'</h3>';
				                            }
				                            if( ! empty( $data['content_desc'] ) ){
				                                echo '<p class="price-text pe-xxl-2">'.esc_html( $data['content_desc'] ).'</p>';
				                            }
				                            if( ! empty( $data['button_text'] ) ){
					                            echo '<a href="'.esc_url($data['button_link']['url']).'" class="vs-btn">'.esc_html($data['button_text']).'</a>';
					                        }
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<section class="vs-price-wrapper space">';
		        echo '<div class="container">';
		        	foreach( $settings['pricing_table_v3'] as $data ) {
		                echo '<div class="vs-price-morp mb-50">';
		                    echo '<div class="row justify-content-center justify-content-lg-end align-items-center gx-xl-5 text-center text-lg-start">';
		                        echo '<div class="col-md order-2 order-sm-1 mt-35 mt-sm-0">';
		                            echo '<div class="price-pack">';
		                            	if( ! empty( $data['price_title'] ) ){
			                                echo '<h3 class="pack-title">'.esc_html( $data['price_title'] ).'</h3>';
			                            }
			                            if(!empty($data['price_desc'])){
			                            	echo htmlspecialchars_decode(esc_html( $data['price_desc'] ));
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="col-md-8 col-lg-auto col-xl-auto text-end  order-1 order-sm-2">';
		                        	if( ! empty( $data['image']['url'] ) ){
			                            echo '<div class="price-img transform-banner">';
			                            		echo bizino_img_tag( array(
								                    'url'       => esc_url( $data['image']['url'] ),
								                ) );
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                        echo '<div class="col-md-10 col-lg-4 col-xl-4 mt-40 mt-lg-0  order-3">';
		                            echo '<div class="price-content">';
		                            	if( ! empty( $data['content_title'] ) ){
			                                echo '<h3 class="price-title mt-n2">'.esc_html( $data['content_title'] ).'</h3>';
			                            }
			                            if( ! empty( $data['content_desc'] ) ){
			                                echo '<p class="price-text pe-xxl-2">'.esc_html( $data['content_desc'] ).'</p>';
			                            }
			                            if( ! empty( $data['button_text'] ) ){
				                            echo '<a href="'.esc_url($data['button_link']['url']).'" class="vs-btn">'.esc_html($data['button_text']).'</a>';
				                        }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            }
		        echo '</div>';
		    echo '</section>';
		}
		echo '<!-----------------------End Price List Area----------------------->';
	}
}