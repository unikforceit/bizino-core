<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Features Widget .
 *
 */
class Haarmax_Features_Widget extends Widget_Base{

	public function get_name() {
		return 'haarmaxfeatures';
	}

	public function get_title() {
		return __( 'Haarmax Features', 'haarmax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Features','haarmax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'features_style',
			[
				'label' 		=> __( 'Features Style', 'haarmax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'haarmax' ),
					'two' 			=> __( 'Style Two', 'haarmax' ),
				],
			]
		);

		$this->add_control(
			'feature_title',
			[
				'label' 	=> __( 'Title', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'haarmax' )
			]
        );
        $this->add_control(
			'feature_desc',
			[
				'label' 	=> __( 'Short Descriptions', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'Short Descriptions', 'haarmax' )
			]
        );
        $this->add_control(
			'feature_image',
			[
				'label'     => __( 'Upload Fiture Image', 'haarmax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				]
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
					'{{WRAPPER}} .vs-banner-slide .banner-title'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-banner-slide .banner-title'
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide .banner-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-banner-slide .banner-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_styling',
			[
				'label' 	=> __( 'Content Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'features_desc_color',
			[
				'label' 		=> __( 'Content Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide p'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_desc_typography',
		 		'label' 		=> __( 'Content Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-banner-slide p'
			]
		);

        $this->add_responsive_control(
			'features_desc_margin',
			[
				'label' 		=> __( 'Content Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_desc_padding',
			[
				'label' 		=> __( 'Content Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Animation styling------------------------------------*/

		$this->start_controls_section(
			'animation_styling',
			[
				'label' 	=> __( 'Animation Control', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'shape_color',
			[
				'label' 		=> __( 'Shape Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide'	=> '--morp-color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'shape_delay',
			[
				'label' 		=> __( 'Shape Delay', 'haarmax' ),
				'type' 			=> \Elementor\Controls_Manager::NUMBER,
				'min' 			=> 5,
				'max'		 	=> 100,
				'step' 			=> 1,
				'default' 		=> 10,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-banner-slide'	=> '--morp-delay: {{VALUE}}s',
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Features Area----------------------->';
			echo '<div class="vs-banner-slide">';
				if(!empty($settings['feature_image']['url'])){
	                echo '<div class="media-img">';
	                	echo haarino_img_tag( array(
                            'url'       => esc_url( $settings['feature_image']['url'] ),
                            'class' 	=> 'w-100',
                        ) );
	                echo '</div>';
	            }
                echo '<div class="media-content">';
                	if(!empty($settings['feature_title'])){
	                    echo '<h2 class="banner-title">'.esc_html($settings['feature_title']).'</h2>';
	                }
	                if(!empty($settings['feature_desc'])){
	                    echo '<p class="banner-text">'.esc_html($settings['feature_desc']).'</p>';
	                }
                echo '</div>';
                echo '<div class="banner-morp morp-ani"></div>';
            echo '</div>';
		echo '<!-----------------------End Features Area----------------------->';
	}
}