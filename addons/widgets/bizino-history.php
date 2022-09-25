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
 * Hostory Widget .
 *
 */
class Bizino_History_Slider extends Widget_Base{

	public function get_name() {
		return 'bizinohistoryslider';
	}

	public function get_title() {
		return __( 'History Slider', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'history_section',
			[
				'label' 	=> __( 'History Sections', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'year', [
				'label' 		=> __( 'Year', 'bizino' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( '2020', 'bizino' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'content', [
				'label' 		=> __( 'Content', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Chef Leader' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'bizino' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'JR Shawon' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'designations', [
				'label' 		=> __( 'Designation', 'bizino' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'CEO' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------year styling------------------------------------*/

		$this->start_controls_section(
			'year_styling',
			[
				'label' 	=> __( 'Year Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_year_color',
			[
				'label' 		=> __( 'Year Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .story-year'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_year_typography',
		 		'label' 		=> __( 'Year Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .story-year'
			]
		);

        $this->add_responsive_control(
			'about_year_margin',
			[
				'label' 		=> __( 'Year Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-year' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_year_padding',
			[
				'label' 		=> __( 'Year Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-year' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Conrtent styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Content Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_content_color',
			[
				'label' 		=> __( 'Content Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .story-text'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_content_typography',
		 		'label' 		=> __( 'Content Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .story-text'
			]
		);

        $this->add_responsive_control(
			'about_content_margin',
			[
				'label' 		=> __( 'Content Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_content_padding',
			[
				'label' 		=> __( 'Content Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Authore styling------------------------------------*/

		$this->start_controls_section(
			'authore_styling',
			[
				'label' 	=> __( 'Authore Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'authore_color',
			[
				'label' 		=> __( 'Authore Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .story-author'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'authore_typography',
		 		'label' 		=> __( 'Authore Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .story-author'
			]
		);

        $this->add_responsive_control(
			'authore_margin',
			[
				'label' 		=> __( 'Authore Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'authore_padding',
			[
				'label' 		=> __( 'Authore Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .story-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Designation styling------------------------------------*/

		$this->start_controls_section(
			'degi_styling',
			[
				'label' 	=> __( 'Designation Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'degi_color',
			[
				'label' 		=> __( 'Designation Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .degi'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'degi_typography',
		 		'label' 		=> __( 'Designation Typography', 'bizino' ),
		 		'selector' 		=> '{{WRAPPER}} .degi'
			]
		);

        $this->add_responsive_control(
			'degi_margin',
			[
				'label' 		=> __( 'Designation Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'degi_padding',
			[
				'label' 		=> __( 'Designation Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start History----------------------->';
		echo '<div class="story-media-wrap pt-xl-4">';
			foreach ( $settings['slides'] as $single_data ) {
	            echo '<div class="story-media">';
	            	if( ! empty( $single_data['year'] ) ){
		                echo '<span class="story-year">'.esc_html( $single_data['year'] ).'</span>';
		            }
		            if( ! empty( $single_data['content'] ) ){
		                echo '<p class="story-text">'.esc_html( $single_data['content'] ).'</p>';
		            }
		            if( ! empty( $single_data['name']  && $single_data['designations'] ) ){
		                echo '<div class="story-author">'.esc_html( $single_data['name'] ).' <span class="degi">'.esc_html( $single_data['designations'] ).'</span></div>';
		            }
	            echo '</div>';
	        }
        echo '</div>';
        echo '<!-----------------------Start History----------------------->';
	}
}