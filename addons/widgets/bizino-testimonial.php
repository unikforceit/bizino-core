<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Bizino_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'bizinotestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'bizino' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'bizino' ),
					'2' 			=> __( 'Style Two', 'bizino' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'bizino' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_image_icon',
			[
				'label' 		=> __( 'Testimonial Image Icon', 'bizino' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rubaida Kanom' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Chef Leader' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'bizino' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'rating', [
				'label' 	=> esc_html__( 'Rating', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> esc_html__( 'One Star', 'medilax' ),
					'two' 			=> esc_html__( 'Two Star', 'medilax' ),
					'three' 		=> esc_html__( 'Three Star', 'medilax' ),
					'four' 			=> esc_html__( 'Four Star', 'medilax' ),
					'five' 			=> esc_html__( 'Five Star', 'medilax' ),
				],
			]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Marko Polo', 'bizino' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Vivi Marian', 'bizino' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Customer', 'bizino' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'bizino' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'bizino' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slider_arrows',
			[
				'label' 		=> __( 'Arrows', 'bizino' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'bizino' ),
				'label_off' 	=> __( 'No', 'bizino' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'bizino' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'bizino' ),
				'label_off' 	=> __( 'No', 'bizino' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'testimonial_style'	=> '1' ]
			]
		);

		$this->add_control(
			'slider_dots',
			[
				'label' 		=> __( 'Dots', 'bizino' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'bizino' ),
				'label_off' 	=> __( 'No', 'bizino' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'testimonial_style'	=> '1' ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'testimonial_bg_color',
			[
				'label' 		=> __( 'Testimonial Background Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-box' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style'	=> '2' ]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-testimonial-box',
				'condition'		=> [ 'testimonial_style'	=> '2' ]
			]
		);

		$this->add_control(
			'testimonial_rating_color',
			[
				'label' 		=> __( 'Testimonial Star Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .star-rating span:before' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style'	=> '2' ]
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-box .author-name,{{WRAPPER}} .vs-testimonial .author-name' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-testimonial-box .author-name,{{WRAPPER}} .vs-testimonial .author-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-box .author-name,{{WRAPPER}} .vs-testimonial .author-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-box .author-name,{{WRAPPER}} .vs-testimonial .author-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'bizino' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-testimonial .testimonial-desc p,{{WRAPPER}} .vs-testimonial-box .testimonial-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Client Feedback Typography', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-testimonial .testimonial-desc p,{{WRAPPER}} .vs-testimonial-box .testimonial-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Client Feedback Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial .testimonial-desc p,{{WRAPPER}} .vs-testimonial-box .testimonial-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Client Feedback Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial .testimonial-desc p,{{WRAPPER}} .vs-testimonial-box .testimonial-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_designation_style_section',
			[
				'label' 		=> __( 'Designation', 'bizino' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'testimonial_style'	=> '1' ]
			]
        );

        $this->add_control(
			'testimonial_slider_designation_color',
			[
				'label' 	=> __( 'Client Designation Color', 'bizino' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-testimonial .author-degi' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_designation_typography',
				'label' 	=> __( 'Client Designation Typography', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-testimonial .author-degi',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_margin',
			[
				'label' 		=> __( 'Client Designation Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial .author-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_padding',
			[
				'label' 		=> __( 'Client Designation Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial .author-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------Arrow styling------------------------------------*/

		$this->start_controls_section(
			'arrow_styling',
			[
				'label' 	=> __( 'Arrow Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'testimonial_style'	=> '1' ]
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

		if( $settings['testimonial_style'] == '1' ){
			$this->add_render_attribute( 'wrapper', 'id', 'testimonialslide1' );
			$this->add_render_attribute( 'wrapper', 'class', 'testimonial-one vs-carousel' );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row slider-two vs-carousel' );
			if( $settings['slider_dots'] == 'yes' ){
				$this->add_render_attribute( 'wrapper', 'data-slick-dots', 'true' );
			}else{
				$this->add_render_attribute( 'wrapper', 'data-slick-dots', 'false' );
			}
			if( $settings['slider_arrows'] == 'yes' ){
				$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'true' );
			}else{
				$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
			}
			if( $settings['slider_autoplay'] == 'yes' ){
				$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
			}else{
				$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
			}
		}
		if( ! empty( $settings['slides'] ) ){
			if( $settings['testimonial_style'] == '1' ){
				echo '<section class="vs-testimonial-wrapper">';
					echo '<div class="container position-relative">';
						echo '<div class="avater-fly vs-carousel d-none d-lg-block" id="avaterfly">';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="avater">';
									if( ! empty( $singleslide['client_image']['url'] ) ){
										echo bizino_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
									}
		                        echo '</div>';
							}
	                    echo '</div>';

    					echo '<div class="row justify-content-center">';
        					echo '<div class="col-lg-9 col-xl-7">';
        	                    echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	                        foreach( $settings['slides'] as $singleslide ) {
                                        echo '<div class="vs-testimonial">';
                                            if( ! empty( $singleslide['testimonial_image_icon']['url'] ) ){
                                                echo '<span class="quote-icon">';
                                                    echo bizino_img_tag( array(
                                                        'url'   => esc_url( $singleslide['testimonial_image_icon']['url'] )
                                                    ) );
                                                echo '</span>';
                                            }
                                            if( ! empty( $singleslide['client_feedback'] ) ){
                                                echo '<div class="testimonial-desc">';
                                                    echo '<p>'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
                                                echo '</div>';
                                            }
                                            echo '<div class="author">';
                                                if( ! empty( $singleslide['client_name'] ) ){
                                                    echo '<h3 class="author-name">'.esc_html( $singleslide['client_name'] ).'</h3>';
                                                }
                                                if( ! empty( $singleslide['client_designation'] ) ){
                                                    echo '<span class="author-degi">'.esc_html( $singleslide['client_designation'] ).'</span>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
        	                        }
        	                    echo '</div>';
                            echo '</div>';
                        echo '</div>';
						if( $settings['slider_arrows'] == 'yes' ){
                            echo '<div class="testimonial-arrow d-flex justify-content-center gap-4">';
                                echo '<button data-slick-prev="#testimonialslide1" class="slick-arrow slick-prev"><span class="long-arrow"></span></button>';
                                echo '<button data-slick-next="#testimonialslide1" class="slick-arrow slick-next"><span class="long-arrow"></span></button>';
                            echo '</div>';
						}
                    echo '</div>';
			    echo '</section>';
			}else{
				echo '<section class="vs-testimonial-wrapper">';
			        echo '<div class="container">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="col-xl-6">';
				                    echo '<div class="vs-testimonial-box">';
										if( ! empty( $singleslide['testimonial_image_icon']['url'] ) ){
											echo '<div class="quote-icon">';
												echo bizino_img_tag( array(
													'url'   => esc_url( $singleslide['testimonial_image_icon']['url'] )
												) );
											echo '</div>';
										}
										if( ! empty( $singleslide['client_feedback'] ) ){
											echo '<p class="testimonial-text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
										}
										if( ! empty( $singleslide['client_name'] ) ){
					                        echo '<h3 class="author-name h5">'.esc_html( $singleslide['client_name'] ).'</h3>';
										}
										echo '<div class="testimonial-rating">';
		                                    if( $singleslide['rating'] == 'one' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['rating'] == 'two' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['rating'] == 'three' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['rating'] == 'four' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }else{
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
							                }
		                                echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
	                    echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
		}
	}
}