<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Bizino_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'haarmaxsectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'haarmax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'haarmax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'haarmax' ),
					'2' 		=> __( 'Style Two', 'haarmax' ),
				],
			]
		);


		$this->add_control(
			'section_icon',
			[
				'label'         => esc_html__( 'Icon', 'haarmax' ),
                'type'          => Controls_Manager::MEDIA,
                'default' 		=> [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'		=> [ 'title_style' =>  [ '2']  ],
			]
		);

        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'haarmax' )
			]
        );
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h2',
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'haarmax' ),
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  => 'P',
					'span'  => 'span',
				],
				'default' 	=> 'span',
				'condition'	=> ['section_subtitle!' => '']
			]
		);

		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'medilax' )
			]
        );

        $this->add_responsive_control(
			'section_title_align',
			[
				'label' 		=> __( 'Alignment', 'haarmax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'haarmax' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'haarmax' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'haarmax' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'haarmax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'haarmax' ),
                'selector' 	=> '{{WRAPPER}} .title-selector',
                'condition' => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .title-selector',
				'condition' => [
                    'section_title!'    => ''
                ],
                'separator' => 'after'
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
                'condition' 	=> [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'haarmax' ),
                'selector' 	=> '{{WRAPPER}} .subtitle-selector',
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_control(
			'section_description_color',
			[
				'label' 	=> __( 'Section Description Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title .desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_description!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_description_typography',
				'label' 	=> __( 'Section Description Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .section-title .desc',
                'condition' => [
                    'section_description!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_description_margin',
			[
				'label' 		=> __( 'Section Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' 	=> [
                    'section_description!'    => ''
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'section-title' );

        echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

    	if($settings['title_style'] == '2'){
        	if( ! empty( $settings['section_icon']['url'] ) ){
				echo '<div class="sec-icon">';
					echo bizino_img_tag( array(
	                        'url'   => esc_url( $settings['section_icon']['url'] )
	                    ) );
				echo '</div>';
			}
		}

		if( !empty( $settings['section_subtitle'] ) ) {
			echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sub-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
		}

		if( ! empty( $settings['section_title'] ) ) {
        	echo '<'.esc_attr($settings['section_title_tag']).' class="sec-title title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
		}
		if( ! empty( $settings['section_description'] ) ){
				echo bizino_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'desc'
				) );
			}
		echo '</div>';
	}
}