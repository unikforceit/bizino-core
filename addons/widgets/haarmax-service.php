<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Services Widget .
 *
 */
class Haarmax_Service_Widget extends Widget_Base{

	public function get_name() {
		return 'haarmaxservices';
	}

	public function get_title() {
		return __( 'Haarmax Services', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-editor-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Services','haarmax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'features_style',
			[
				'label' 		=> __( 'Services Style', 'haarmax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'haarmax' ),
					'two' 			=> __( 'Style Two', 'haarmax' ),
					'three' 		=> __( 'Style Three', 'haarmax' ),
				],
			]
		);

		/*-----------------------------------------service version 1 control ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'haarmax' ),
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
				'label' 		=> __( 'Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'features',
			[
				'label' 		=> __( 'Services Content', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'features_style' =>  ['one', 'three']  ],
			]
		);

		/*-----------------------------------------service version 2 control ------------------------------------*/


		$repeater = new Repeater();

        $repeater->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'haarmax' ),
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
				'label' 		=> __( 'Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'content', [
				'label' 		=> __( 'Content', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'features_v2',
			[
				'label' 		=> __( 'Services Content', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'features_style' =>  ['two']  ],
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
					'{{WRAPPER}} .service p'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selectors' 	=> [
		 			'{{WRAPPER}} .service p',
		 			'{{WRAPPER}} .h4'
		 		]
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .service p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Services Area----------------------->';
			if( $settings['features_style'] == 'one' ){
				echo '<div class="row service">';
					foreach( $settings['features'] as $data ) {
						echo '<div class="col-6 col-sm-4 thumb-about">';
							if( ! empty( $data['image_icon']['url'] ) ){
				                echo haarino_img_tag( array(
									'url'	=> esc_url( $data['image_icon']['url'] ),
								) );
				            }
				            if( ! empty( $data['title'] ) ){
				                echo '<p class="text-title fw-semibold">'.esc_html( $data['title'] ).'</p>';
				            }
			            echo '</div>';
			        }
		        echo '</div>';
		    }elseif( $settings['features_style'] == 'two' ){
		    	echo '<div class="about-media-wrap">';
		    		foreach( $settings['features_v2'] as $data ) {
	                    echo '<div class="d-md-flex gap-4 about-media text-center text-md-start">';
	                    	if( ! empty( $data['image_icon']['url'] ) ){
		                        echo '<div class="media-img mb-30 mb-md-0">';
		                            echo haarino_img_tag( array(
										'url'	=> esc_url( $data['image_icon']['url'] ),
									) );
		                        echo '</div>';
		                    }
	                        echo '<div class="media-body">';
	                        	if( ! empty( $data['title'] ) ){
		                            echo '<h4 class="fw-semibold mb-1 mt-n1">'.esc_html( $data['title'] ).'</h4>';
		                        }
		                        if( ! empty( $data['content'] ) ){
		                            echo '<p>'.esc_html( $data['content'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
                    }
                echo '</div>';
		    }else{
		    	echo '<div class="row gx-4 text-center vs-carousel">';
                    foreach( $settings['features'] as $data ) {
					    echo '<div class="col-6 col-sm-4 col-lg">';
						    echo '<div class="thumb-about-style2">';
						    	if( ! empty( $data['image_icon']['url'] ) ){
		                            echo haarino_img_tag( array(
										'url'	=> esc_url( $data['image_icon']['url'] ),
									) );
			                    }
			                    if( ! empty( $data['title'] ) ){
							        echo '<p class="text-title fw-semibold">'.esc_html( $data['title'] ).'</p>';
							    }
						    echo '</div>';
					    echo '</div>';
					}
				echo '</div>';
		    }
		echo '<!-----------------------End Services Area----------------------->';
	}
}