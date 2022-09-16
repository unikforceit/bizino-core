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
 * Counter Widget .
 *
 */
class Haarmax_Counter extends Widget_Base{

	public function get_name() {
		return 'haarmaxcounter';
	}

	public function get_title() {
		return __( 'Counter', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Counter', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'counter_image',
			[
				'label' 		=> __( 'Counter image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'counter_number', [
				'label' 		=> __( 'Counter Number', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '3116' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'counter_title', [
				'label' 		=> __( 'Counter Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
                'default'       =>  __( 'Hair Treatments' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_image' 		=> Utils::get_placeholder_image_src(),
						'counter_number' 		=> __( '3116' , 'haarmax' ),
						'counter_title' 		=> __( 'Hair Treatments' , 'haarmax' ),
					],
					[
						'counter_image' 		=> Utils::get_placeholder_image_src(),
						'counter_number' 		=> __( '200' , 'haarmax' ),
						'counter_title' 		=> __( 'Salon Products' , 'haarmax' ),
					],
					[
						'counter_image' 		=> Utils::get_placeholder_image_src(),
						'counter_number' 		=> __( '350' , 'haarmax' ),
						'counter_title' 		=> __( 'Shades of colors' , 'haarmax' ),
					],
					[
						'counter_image' 		=> Utils::get_placeholder_image_src(),
						'counter_number' 		=> __( '130k' , 'haarmax' ),
						'counter_title' 		=> __( 'Satisfied Customers' , 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ counter_title }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'counter_title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-text'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-counter .counter-text'
			]
		);

        $this->add_responsive_control(
			'counter_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'number_styling',
			[
				'label' 	=> __( 'Counter Number Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'counter_number_color',
			[
				'label' 		=> __( 'Counter Number Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-number'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_number_typography',
		 		'label' 		=> __( 'Counter Number Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-counter .counter-number'
			]
		);

        $this->add_responsive_control(
			'counter_number_margin',
			[
				'label' 		=> __( 'Counter Number Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_number_padding',
			[
				'label' 		=> __( 'Counter Number Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-counter .counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'row gx-0');

		if( ! empty( $settings['slides'] ) ){
            echo '<div class="vs-counter-wrapper">';
                echo '<div class="container">';
                    echo '<div '.$this->get_render_attribute_string('wrapper').'>';
                        foreach ( $settings['slides'] as $single_data ) {
                            echo '<div class="col-sm-6 col-lg-3 counter-border">';
                                echo '<div class="vs-counter text-center">';
                                    if( ! empty( $single_data['counter_image']['url'] ) ){
                                        echo '<div class="counter-icon">';
                                            echo haarino_img_tag( array(
                                                'url'   => esc_url( $single_data['counter_image']['url'] ),
                                            ) );
                                        echo '</div>';
                                    }
                                    if( ! empty( $single_data['counter_number'] ) ){
                                        echo '<span class="counter-number">'.esc_html( $single_data['counter_number'] ).'</span>';
                                    }
                                    if( ! empty( $single_data['counter_title'] ) ){
                                        echo '<p class="counter-text mb-0">'.esc_html( $single_data['counter_title'] ).'</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
		}
	}
}