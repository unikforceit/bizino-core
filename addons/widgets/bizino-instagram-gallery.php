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
 * Instagram Gallery Widget .
 *
 */
class Bizino_Instagram_Gallery extends Widget_Base{

	public function get_name() {
		return 'bizinoinstagramgallery';
	}

	public function get_title() {
		return __( 'Instagram Gallery', 'bizino' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'bizino' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'instagramgallery_section',
			[
				'label' 	=> __( 'Instagram Gallery', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'instagram_style',
			[
				'label' 		=> __( 'Instagram Style', 'bizino' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'bizino' ),
					'two' 			=> __( 'Style Two', 'bizino' ),
				],
			]
		);
		$this->add_control(
			'slider_arrows',
			[
				'label' 		=> __( 'Arrows', 'bizino' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'bizino' ),
				'label_off' 	=> __( 'No', 'bizino' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'instagram_style'	=> 'two' ]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'instagramgallery_image',
			[
				'label' 		=> __( 'Instagram Gallery Image', 'bizino' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
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
						'instagramgallery_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'instagramgallery_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'instagramgallery_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> __( 'Gallery Image', 'bizino' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'instagramgallery_general',
			[
				'label' 	=> __( 'General', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'instagram_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-thumb .icon-thumb i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'overlay_bg_color',
			[
				'label' 		=> __( 'Overlay bg Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-thumb:after,{{WRAPPER}} .gallery-thumb:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------Arrow styling------------------------------------*/

		$this->start_controls_section(
			'arrow_styling',
			[
				'label' 	=> __( 'Arrow Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'arrow_color',
			[
				'label' 		=> __( 'Arrow Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow'	=> '--title-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'arrow_hvr_color',
			[
				'label' 		=> __( 'Arrow Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover'	=> '--theme-color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Instagram Gallery----------------------->';
		if( $settings['instagram_style'] == 'one' ){
			if( ! empty( $settings['slides'] ) ){
	            echo '<div class="instagram-gallery">';
	                echo '<div class="container">';
	                    echo '<div class="row gx-1 mb-n1 justify-content-center">';
	                        foreach ( $settings['slides'] as $single_data ) {
	                            echo '<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-xxl-auto mb-1">';
	                                echo '<div class="gallery-thumb">';
	                                    if( ! empty( $single_data['instagramgallery_image']['url'] ) ){
	                                        echo bizino_img_tag( array(
	                                            'url'   => esc_url( $single_data['instagramgallery_image']['url'] ),
	                                            'class' => 'w-100',
	                                        ) );
	                                        echo '<a href="'.esc_url( $single_data['instagramgallery_image']['url'] ).'" class="icon-thumb popup-image"><i class="fab fa-instagram"></i></a>';
	                                    }
	                                echo '</div>';
	                            echo '</div>';
	                        }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
			}
		}else{
			if( ! empty( $settings['slides'] ) ){
				$this->add_render_attribute( 'wrapper', 'id', 'gallery-slide-insta' );
				$this->add_render_attribute( 'wrapper', 'class', 'row gallery-cutted-slide' );

				echo '<div class="vs-gallery-wrapper  ">';
			        echo '<div class="container-fluid px-xxl-0 overflow-hidden">';
			            echo '<div '.$this->get_render_attribute_string('wrapper').'>';
			                foreach ( $settings['slides'] as $single_data ) {
				                echo '<div class="col-auto">';
				                	if( ! empty( $single_data['instagramgallery_image']['url'] ) ){
					                    echo '<div class="gallery-cutted gallery-thumb">';
					                        echo '<a href="'.esc_url($single_data['instagramgallery_image']['url']).'" class="icon-thumb popup-image"><i class="fab fa-instagram"></i></a>';
					                        echo '<img src="'.esc_url($single_data['instagramgallery_image']['url']).'" alt="Gallery image" class="w-100">';
					                    echo '</div>';
					                }
				                echo '</div>';
			                }
			            echo '</div>';
			            if( $settings['slider_arrows'] == 'yes' ){
				            echo '<div class="pt-40 d-flex justify-content-center gap-4">';
				                echo '<button data-slick-prev="#gallery-slide-insta" class="slick-arrow slick-prev default"><span class="long-arrow"></span></button>';
				                echo '<button data-slick-next="#gallery-slide-insta" class="slick-arrow slick-next default"><span class="long-arrow"></span></button>';
				            echo '</div>';
				        }
			        echo '</div>';
			    echo '</div>';
			}
		}
		echo '<!-----------------------End Instagram Gallery----------------------->';
	}
}