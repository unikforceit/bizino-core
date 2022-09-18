<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image with Video Widget .
 *
 */
class Bizino_Image_Widget extends Widget_Base {

	public function get_name() {
		return 'haarmaximage';
	}

	public function get_title() {
		return __( 'Bizino Image with Video', 'haarmax' );
	}


	public function get_icon() {
		return 'eicon-image-hotspot';
    }


	public function get_categories() {
		return [ 'haarmax' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'img_style',
			[
				'label' 		=> __( 'Image Style', 'haarmax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'haarmax' ),
					'two' 			=> __( 'Style Two', 'haarmax' ),
					'three' 		=> __( 'Style Three', 'haarmax' ),
					'four' 			=> __( 'Style Four', 'haarmax' ),
					'five' 			=> __( 'Style Five', 'haarmax' ),
				],
			]
		);
        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'video_btn',
			[
				'label' 		=> __( 'Video Button', 'haarmax' ),
				'type' 			=> Controls_Manager::SWITCHER,
                'label_on' 		=> __( 'Yes', 'haarmax' ),
				'label_off' 	=> __( 'No', 'haarmax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'haarmax' ),
				'default' 		=> [
					'url' => '#',
				],
				'condition'	=> ['video_btn' => 'yes']
			]
        );

        $this->end_controls_section();


		$this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['video_btn' => 'yes']
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'haarmax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if( $settings['img_style'] == 'one' ){
	        echo '<div class="video-box position-relative mb-10">';
	        if( !empty( $settings['image']['url'] ) ) {
	            echo bizino_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						'class'	=> 'w-100'
					) );
	            if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
	            	echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
	            }
	        }
	       	echo '</div>';
	    }elseif( $settings['img_style'] == 'two' ){
	    	echo '<div class="transform-banner">';
                if( !empty( $settings['image']['url'] ) ) {
                	echo bizino_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
					) );
					if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
		            	echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
		            }
                }
            echo '</div>';
	    }elseif( $settings['img_style'] == 'three' ){
	    	echo '<div class="image-scale-hover">';
                if( !empty( $settings['image']['url'] ) ) {
                	echo bizino_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						'class' => 'w-100'
					) );
					if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
		            	echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
		            }
                }
            echo '</div>';
	    }else{
	    	echo '<div class="team-details-shape mask-cover" data-mask-src="' . esc_url( plugins_url( 'images/team-mask-2.png', __FILE__ ) ) . '"></div>';
            echo '<div class="team-img mask-cover" data-mask-src="' . esc_url( plugins_url( 'images/team-mask-2.png', __FILE__ ) ) . '">';
                if( !empty( $settings['image']['url'] ) ) {
                	echo bizino_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						'class' => 'w-100'
					) );
					if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
		            	echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
		            }
                }
            echo '</div>';
	    }
	}
}