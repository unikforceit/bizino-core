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
		if( $settings['instagram_style'] == 'one' ){
			if( ! empty( $settings['slides'] ) ){
                ?>
                <div class="instagram-cs" data-sec-pos="bottom-half" data-pos-for=".copyright-wrap">
                    <div class="row vs-carousel" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4">
                        <?php foreach ( $settings['slides'] as $single_data ) {?>
                            <div class="col-xl-2">
                            <div class="gallery-style2">
                                <div class="gallery-img">
                                    <?php
                                    if( ! empty( $single_data['instagramgallery_image']['url'] ) ){
                                        echo bizino_img_tag( array(
                                            'url'   => esc_url( $single_data['instagramgallery_image']['url'] ),
                                            'class' => '',
                                        ) );
                                        echo '<div class="gallery-overlay"></div>';
                                        echo '<a href="'.esc_url( $single_data['instagramgallery_image']['url'] ).'" class="gallery-icon popup-image"><i class="fab fa-instagram"></i></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
			}
		}else{
			if( ! empty( $settings['slides'] ) ){
				?>
                <div class="sidebar-gallery">
                <?php foreach ( $settings['slides'] as $single_data ) {?>
                    <div class="gallery-thumb">
                        <?php
                        if( ! empty( $single_data['instagramgallery_image']['url'] ) ){
                            echo '<a href="'.esc_url( $single_data['instagramgallery_image']['url'] ).'">';
                            echo bizino_img_tag( array(
                                'url'   => esc_url( $single_data['instagramgallery_image']['url'] ),
                                'class' => 'w-100',
                            ) );
                            echo '</a>';
                        }
                        ?>
                    </div>
                <?php } ?>
                </div>
                <?php
			}
		}
	}
}
\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Instagram_Gallery());