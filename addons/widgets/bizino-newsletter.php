<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
/**
 * 
 * Newsletter Widget .
 *
 */
class Bizino_Newsletter extends Widget_Base {

	public function get_name() {
		return 'haarmaxnewsletterform';
	}

	public function get_title() {
		return __( 'Newsletter', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-mail';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_content',
			[
				'label' 	=> __( 'Newsletter', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'newsletter_style',
			[
				'label' 		=> __( 'Newsletter Style', 'haarmax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'haarmax' ),
					'two' 			=> __( 'Style Two', 'haarmax' ),
				],
			]
		);
		
		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> __( 'Section Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'SUBSCRIBE TO NEWSLETTER', 'haarmax' ),
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' 		=> __( 'Section Content', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);

		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Enter Your Email', 'haarmax' ),
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' 		=> __( 'Image With Video Options', 'haarmax' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);

		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 	=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);


		$this->add_control(
			'video_btn',
			[
				'label' 		=> __( 'Video Button', 'haarmax' ),
				'type' 			=> Controls_Manager::SWITCHER,
                'label_on' 		=> __( 'Yes', 'haarmax' ),
				'label_off' 	=> __( 'No', 'haarmax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'haarmax' ),
				'default' 		=> [
					'url' => '#',
				],
				'condition'	=> ['video_btn' => 'yes']
			]
        );

        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
        );

        $this->add_control(
			'newsletter_title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'newsletter_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .sec-title',
			]
		);

        $this->add_responsive_control(
			'newsletter_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'newsletter_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Content styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Content Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
        );

        $this->add_control(
			'newsletter_content_color',
			[
				'label' 		=> __( 'Content Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'newsletter_content_typography',
		 		'label' 		=> __( 'Content Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'newsletter_content_margin',
			[
				'label' 		=> __( 'Content Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'newsletter_content_padding',
			[
				'label' 		=> __( 'Content Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------newsletter styling------------------------------------*/

		$this->start_controls_section(
			'newsletter_styling',
			[
				'label' 	=> __( 'Subscribe Box Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'newsletter_style'	=> 'one' ]
			]
        );

        $this->add_control(
			'box_color',
			[
				'label' 		=> __( 'Box Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subscribe-box input'	=> 'background-color: {{VALUE}}!important;',

				],
			]
        );
        $this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subscribe-box button'	=> '--theme-color: {{VALUE}};',

				],
			]
        );
        $this->end_controls_section();


        /*-----------------------------------------play Button styling------------------------------------*/

        $this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['video_btn' => 'yes']
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Newslatter Area----------------------->';
		if( $settings['newsletter_style'] == 'one' ){

			echo '<section class="subscribe-wrapper subscribe-layout1 position-relative space-top">';
				if( !empty( $settings['bg_image']['url'] ) ) {
			        echo '<div class="subscribe-shape" data-bg-src="'.esc_url( $settings['bg_image']['url'] ).'"></div>';
			    }
		        echo '<div class="container">';
		            echo '<div class="row text-center text-lg-start justify-content-center justify-content-lg-start">';
		            	if( !empty( $settings['image']['url'] ) ) {
			                echo '<div class="col-lg-6 col-xl-6 mb-30 mb-lg-0">';
			                    echo '<div class="transform-banner position-relative">';
			                    	echo bizino_img_tag( array(
											'url'	=> esc_url( $settings['image']['url'] ),
										) );
						            if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
						            	echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
						            }
			                    echo '</div>';
			                echo '</div>';
			            }
		                echo '<div class="col-lg-6 col-xl-6 ">';
		                    echo '<div class="row">';
		                        echo '<div class="col-xl-10 offset-xl-1">';
		                            echo '<div class="ms-xl-1">';
		                            	if( ! empty( $settings['section_title'] ) ){
			                                echo '<h2 class="sec-title text-white">' . htmlspecialchars_decode(esc_html( $settings['section_title'] )) . '</h2>';
			                            }
			                            if( ! empty( $settings['section_content'] ) ){
			                                echo '<p class=" text-white">'.esc_html( $settings['section_content'] ).'</p>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="col-xl-11 offset-xl-1">';
		                            echo '<form action="#" class="subscribe-us subscribe-box ms-xl-1 mt-40">';
		                                echo '<input type="email" class="form-control" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
		                                echo '<button type="submit" class="submit-btn">';
		                                    echo '<span class="hidden"><i class="far fa-arrow-right"></i></span>';
		                                    echo '<span class="default"><i class="fas fa-envelope"></i></span>';
		                                echo '</button>';
		                            echo '</form>';
		                       	echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}else{
			echo '<form action="#" class="subscribe-us footer-subscribe">';
                echo '<input type="email" class="form-control" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
                echo '<button type="submit" class="submit-btn">';
                    echo '<span class="hidden"><i class="far fa-arrow-right"></i></span>';
                    echo '<span class="default"><i class="fal fa-envelope"></i></span>';
                echo '</button>';
            echo '</form>';
		}
		echo '<!-----------------------Start Newslatter Area----------------------->';
	}
}