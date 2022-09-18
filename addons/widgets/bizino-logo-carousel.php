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
 * Logo Carousel Widget .
 *
 */
class Bizino_Logo_Carousel extends Widget_Base{

	public function get_name() {
		return 'haarmaxlogocarousel';
	}

	public function get_title() {
		return __( 'Logo Carousel', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'logocarousel_section',
			[
				'label' 	=> __( 'Logo Carousel', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'logocarousel_image',
			[
				'label' 		=> __( 'Logo Carousel image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'image_url', [
				'label' 		=> __( 'Title Url?', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'awards_title', [
				'label' 		=> __( 'Awards Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
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
						'logocarousel_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'logocarousel_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'logocarousel_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ image_url }}}',
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
					'size' 		=> 5,
				],
			]
		);
		$this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel text-center');

        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
        $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );

		if( ! empty( $settings['slides'] ) ){
            echo '<div class="vs-brand-wrapper">';
                echo '<div class="container">';
                    echo '<div '.$this->get_render_attribute_string('wrapper').'>';
                        foreach ( $settings['slides'] as $single_data ) {
                            echo '<div class="col-auto">';
                                echo '<div class="awards-box">';
	                                echo '<div class="awards-img">';
	                                    echo '<a href="'.esc_url( esc_url( $single_data['image_url'] ) ).'" class="icon-thumb">';
	                                        echo bizino_img_tag( array(
	                                            'url'   => esc_url( $single_data['logocarousel_image']['url'] ),
	                                        ) );
	                                    echo '</a>';
	                                echo '</div>';
									if( ! empty( $single_data['awards_title'] ) ){
										echo '<h3 class="awards-title">'.esc_html( $single_data['awards_title'] ).'</h3>';
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