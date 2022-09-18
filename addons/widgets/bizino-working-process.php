<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Working Process Widget .
 *
 */
class Bizino_Working_Process extends Widget_Base {

	public function get_name() {
		return 'haarmaxworkingprocess';
	}

	public function get_title() {
		return __( 'Working Process', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'working_process_section',
			[
				'label'     => __( 'Working Process', 'haarmax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'workingprocess_image',
			[
				'label' 		=> __( 'Working Process image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'image_title', [
				'label' 		=> __( 'Image Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Image Title' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'title_url', [
				'label' 		=> __( 'Title Url?', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'haarmax' ),
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
						'workingprocess_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'workingprocess_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'workingprocess_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ image_title }}}',
			]
		);


        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'haarmax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'haarmax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 3,
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'general_style',
			[
				'label' 	=> __( 'General', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_bg_color',
			[
				'label' 		=> __( 'Overlay Background Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-box:hover .process-img:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label' 	=> __( 'Title', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-box .process-title a' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_control(
			'post_title_color_hover',
			[
				'label' 		=> __( 'Title Color Hover', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-box .process-title a:hover' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'label' 	=> __( 'Title Typography', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .process-box .process-title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box .process-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box .process-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();



    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel');

        $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

		echo '<!-- blog Area -->';
		echo '<section class="what-we-do-wrapper">';
		  	echo '<div class="container">';
		    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach ( $settings['slides'] as $single_data ) {
						echo '<div class="col-xl-3">';
                            echo '<div class="process-box">';
                                if( ! empty( $single_data['workingprocess_image']['url'] ) ){
                                    echo '<div class="process-img">';
                                        echo '<span class="process-border"></span>';
                                        echo '<span class="process-border border2"></span>';
                                        echo bizino_img_tag( array(
                                            'url'   => esc_url( $single_data['workingprocess_image']['url'] ),
                                            'class' => 'w-100',
                                        ) );
                                    echo '</div>';
                                }
                                if( ! empty( $single_data['image_title'] ) ){
                                    echo '<div class="process-content">';
                                        echo '<h3 class="process-title"><a class="text-reset" href="'.esc_url( $single_data['title_url'] ).'">'.esc_html( $single_data['image_title'] ).'</a></h3>';
                                    echo '</div>';
                                }
                                echo '<a href="'.esc_url( $single_data['title_url'] ).'" class="process-btn"><i class="fas fa-chevron-right"></i></a>';
                            echo '</div>';
		                echo '</div>';
				  	}
		    	echo '</div><!-- .row END -->';
		  	echo '</div><!-- .container END -->';
		echo '</section>';
		echo '<!-- blog Area end -->';
	}
}