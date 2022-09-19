<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Offer Cart Widget .
 *
 */
class Bizino_Offer_Cart_Widget extends Widget_Base{

	public function get_name() {
		return 'bizinooffercart';
	}

	public function get_title() {
		return __( 'Bizino Offer Cart', 'bizino' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'offer_content',
			[
				'label'		=> __( 'Offar Cart','bizino' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'offer_title',
			[
				'label' 	=> __( 'Title', 'bizino' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'bizino' )
			]
        );
        $this->add_control(
			'offer_desc',
			[
				'label' 	=> __( 'Content', 'bizino' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'Short Descriptions', 'bizino' )
			]
        );
        $this->add_control(
			'image',
			[
				'label'     => __( 'Upload Fiture Image', 'bizino' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'bizino' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Button Text', 'bizino' ),
			]
        );

        $this->add_control(
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
					'{{WRAPPER}} .banner-title'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .banner-title'
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .banner-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .banner-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_styling',
			[
				'label' 	=> __( 'Content Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_desc_color',
			[
				'label' 		=> __( 'Content Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-text'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_desc_typography',
		 		'label' 		=> __( 'Content Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .banner-text'
			]
		);

        $this->add_responsive_control(
			'features_desc_margin',
			[
				'label' 		=> __( 'Content Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .banner-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_desc_padding',
			[
				'label' 		=> __( 'Content Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .banner-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-btn.style-white:hover'	=> 'background-color: {{VALUE}}!important;',
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
					'{{WRAPPER}} .vs-btn.style-white:hover'	=> 'color: {{VALUE}}!important;',
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
			]
        );

        $this->add_control(
			'shape_color',
			[
				'label' 		=> __( 'Shape Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .morp-ani::before'	=> 'background-color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'shape_delay',
			[
				'label' 		=> __( 'Shape Delay', 'bizino' ),
				'type' 			=> \Elementor\Controls_Manager::NUMBER,
				'min' 			=> 5,
				'max'		 	=> 100,
				'step' 			=> 1,
				'default' 		=> 10,
				'selectors' 	=> [
					'{{WRAPPER}} .morp-ani'	=> '--morp-spin-time: {{VALUE}}s',
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Offer Cart Area----------------------->';
			if( ! empty( $settings['image']['url'] ) ){
				echo '<div class="banner-box shape-delay" data-bg-src="'.esc_url( $settings['image']['url'] ).'">';
	                echo '<div class="banner-shape morp-ani" data-overlay="black" data-opacity="7"></div>';
	                echo '<div class="banner-content">';
	                	if( ! empty( $settings['offer_title'] ) ){
		                    echo '<h3 class="banner-title text-white">'.esc_html( $settings['offer_title'] ).'</h3>';
		                }
		                if( ! empty( $settings['offer_desc'] ) ){
		                    echo '<p class="banner-text text-white">'.esc_html( $settings['offer_desc'] ).'</p>';
		                }
		                if( ! empty( $settings['button_text'] ) ){
		                    echo '<a href="'.esc_url($settings['button_link']['url']).'" class="vs-btn style-white">'.esc_html($settings['button_text']).'</a>';
		                }
	                echo '</div>';
	            echo '</div>';
	        }
		echo '<!-----------------------End Offer Cart Area----------------------->';
	}
}