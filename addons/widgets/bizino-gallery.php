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
 * Gallery Widget .
 *
 */
class Bizino_Gallery extends Widget_Base{

	public function get_name() {
		return 'bizinogallery';
	}

	public function get_title() {
		return __( 'Gallery', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gallery_section',
			[
				'label' 	=> __( 'Gallery', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gallery_style',
			[
				'label' 		=> __( 'Gallery Style', 'bizino' ),
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
			'gallery_image',
			[
				'label' 		=> __( 'Gallery image', 'bizino' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'image_title', [
				'label' 		=> __( 'Image Title', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Image Title' , 'bizino' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'title_url', [
				'label' 		=> __( 'Title Url?', 'bizino' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'bizino' ),
				'label_block' 	=> true,
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
						'gallery_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ image_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'gallery_general',
			[
				'label' 	=> __( 'General', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'overlay_bg_color',
			[
				'label' 		=> __( 'Overlay bg Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-gallery-box .gallery-img:after,{{WRAPPER}} .vs-gallery-box .gallery-img:before,{{WRAPPER}} .gallery-thumb:after,{{WRAPPER}} .gallery-thumb:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'gallery_title_style_section',
			[
				'label' 	=> __( 'Title', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition'	=> [ 'gallery_style'	=> '1' ]
			]
        );

        $this->add_control(
			'gallery_title_color',
			[
				'label' 		=> __( 'Title Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-gallery-box .gallery-title' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'gallery_title_typography',
				'label' 	=> __( 'Title Typography', 'bizino' ),
				'selector' 	=> '{{WRAPPER}} .vs-gallery-box .gallery-title',
			]
        );

        $this->add_responsive_control(
			'gallery_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-gallery-box .gallery-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'gallery_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'bizino' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-gallery-box .gallery-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( ! empty( $settings['slides'] ) ){
    		if( $settings['gallery_style'] == '1' ){
                echo '<div class="vs-gallery-wrapper">';
                    echo '<div class="container">';
                        echo '<div class="row g-3 filter-active">';
                            foreach ( $settings['slides'] as $single_data ) {
                                echo '<div class="col-md-6 col-lg-4 filter-item">';
                                    echo '<div class="vs-gallery-box">';
                                        if( ! empty( $single_data['gallery_image']['url'] ) ){
                                            echo '<div class="gallery-img">';
                                                echo bizino_img_tag( array(
                                                    'url'   => esc_url( $single_data['gallery_image']['url'] ),
                                                    'class' => 'w-100',
                                                ) );
                                            echo '</div>';
                                        }
                                        echo '<div class="gallery-content">';
                                            if( ! empty( $single_data['image_title'] ) ){
                                                echo '<h3 class="gallery-title"><a href="'.esc_url( $single_data['title_url'] ).'" class="text-reset">'.esc_html( $single_data['image_title'] ).'</a></h3>';
                                            }
                                            echo '<a href="'.esc_url( $single_data['gallery_image']['url'] ).'" class="icon-btn popup-image style-outline"><i class="fas fa-plus"></i></a>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }else{
                echo '<div class="vs-gallery-wrapper">';
                    echo '<div class="container vs-container-style3">';
                        echo '<div class="row gx-30 justify-content-center">';
                            foreach ( $settings['slides'] as $single_data ) {
                                echo '<div class="col-sm-6 col-lg-4 mb-30">';
                                    echo '<div class="gallery-thumb">';
                                        echo bizino_img_tag( array(
                                            'url'   => esc_url( $single_data['gallery_image']['url'] ),
                                            'class' => 'w-100',
                                        ) );
                                        echo '<a href="'.esc_url( esc_url( $single_data['gallery_image']['url'] ) ).'" class="icon-thumb popup-image"><i class="fas fa-plus"></i></a>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
		}
	}
}