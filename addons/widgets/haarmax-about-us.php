<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * About Us Widget .
 *
 */
class Haarmax_AboutUs_Widget extends Widget_Base{

	public function get_name() {
		return 'aboutus';
	}

	public function get_title() {
		return __( 'Haarmax About Us', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-editor-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'About Us', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'about_image',
			[
				'label'     => __( 'About Image', 'haarmax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'about_subtitle',
            [
				'label'         => __( 'About Subtitle', 'haarmax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=>2,
				'default'       => __( 'About Us Subtitle' , 'haarmax' ),
				'label_block'   => true,

			]
		);
		$this->add_control(
			'about_title',
            [
				'label'         => __( 'About Title', 'haarmax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=>2,
				'default'       => __( 'About Us Title' , 'haarmax' ),
				'label_block'   => true,
			]
		);
        $this->add_control(
			'about_description',
            [
				'label'         => __( 'About Description', 'haarmax' ),
				'type'          => Controls_Manager::WYSIWYG,
				'default'       => __( 'About Description' , 'haarmax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'offer_text',
			[
				'label' 	=> esc_html__( 'Offer Text', 'haarmax' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> esc_html__( 'Offer Text', 'haarmax' ),
			]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'btn',
			[
				'label'     => __( 'Button', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Button Text', 'haarmax' ),
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'haarmax' ),
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

		$this->end_controls_section();

        /*-----------------------------------------subtitle styling------------------------------------*/

		$this->start_controls_section(
			'subtitle_styling',
			[
				'label' 	=> __( 'Subtitle Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_subtitle_typography',
		 		'label' 		=> __( 'Subtitle Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .sub-title'
			]
		);

        $this->add_responsive_control(
			'about_subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'about_title_color',
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
				'name' 			=> 'about_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .sec-title'
			]
		);

        $this->add_responsive_control(
			'about_title_margin',
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
			'about_title_padding',
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

        /*-----------------------------------------offer styling------------------------------------*/

		$this->start_controls_section(
			'offer_styling',
			[
				'label' 	=> __( 'Offer Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'offer_color',
			[
				'label' 		=> __( 'Offer Rounded Background Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .offer-pill'	=> '--theme-color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> __( 'Border', 'haarmax' ),
				'selector' 		=> '{{WRAPPER}} .offer-pill::before',
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
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'haarmax' ),
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
		 		'label' 		=> __( 'Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start About us Area----------------------->';
			echo '<div class="vs-about-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-6 col-xl-6 mb-40 mb-lg-0">';
		                    echo '<div class="about-image d-inline-block transform-banner position-relative">';
		                    	if( ! empty( $settings['about_image']['url'] ) ){
			                        echo haarino_img_tag( array(
										'url'	=> esc_url( $settings['about_image']['url'] ),
									) );
			                    }
			                    if( ! empty( $settings['offer_text'] ) ){
			                        echo '<div class="offer-pill">';
			                        	echo htmlspecialchars_decode(esc_html( $settings['offer_text'] ));
			                        echo '</div>';
			                    }

		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-6 col-xl-5 offset-xxl-1 ms-xl-5 ms-xl-xxl-0 align-self-center">';
		                    echo '<div class="about-content ps-lg-4 ps-xl-0">';
		                    	if( ! empty( $settings['about_subtitle'] ) ){
			                        echo '<span class="sub-title">'.htmlspecialchars_decode(esc_html( $settings['about_subtitle'] )).'</span>';
			                    }
			                    if( ! empty( $settings['about_title'] ) ){
			                        echo '<h2 class="sec-title text-white lh-xs">'.htmlspecialchars_decode(esc_html( $settings['about_title'] )).'</h2>';
			                    }
			                    if( ! empty( $settings['about_description'] ) ){
			                    	echo htmlspecialchars_decode(esc_html( $settings['about_description'] ));
			                    }
			                    if( ! empty( $settings['button_text'] ) ){
			                        echo '<a href="'.esc_url($settings['button_link']['url']).'" class="vs-btn mt-xl-2">'.esc_html($settings['button_text']).'</a>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
        echo '<!-----------------------End About us Area----------------------->';
	}
}