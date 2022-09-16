<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Price Cart Widget .
 *
 */
class Haarmax_Single_Price_Cart extends Widget_Base{

	public function get_name() {
		return 'haarmaxpricecart';
	}

	public function get_title() {
		return __( 'Price Cart', 'haarmax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'price_cart',
			[
				'label'		=> __( 'Price Cart','haarmax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'reverse_cart',
			[
				'label' 		=> __( 'Cart Reverse Style?', 'haarmax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'haarmax' ),
				'label_off' 	=> __( 'Hide', 'haarmax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
        $this->add_control(
			'title', [
				'label' 		=> __( 'Cart Title', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'feature_bg_image',
			[
				'label'     => __( 'Feature Background Image', 'haarmax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'features', [
				'label' 		=> __( 'Cart Features', 'haarmax' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'thumb_image',
			[
				'label'     => __( 'Thumbnail Image', 'haarmax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'haarmax' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 	=> __( 'Link', 'haarmax' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
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
					'{{WRAPPER}} .price-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .price-title',
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .price-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		/*-----------------------------------------button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn::after'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn::after'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$reverse = $settings['reverse_cart'] == 'yes' ? 'flex-row-reverse' : '';

		echo '<!-----------------------Start single price Area----------------------->';
			echo '<div class="row gx-0 '.esc_attr( $reverse ).'">';
				if( ! empty( $settings['thumb_image']['url'] ) ){
					echo '<div class="col-lg-6 col-xl-7 col-xxl align-self-center">';
						echo '<div class="price-image mb-30">';
							echo haarino_img_tag( array(
		                            'url'       => esc_url( $settings['thumb_image']['url'] ),
		                            'class' 	=> 'w-100'
		                        ) );		
						echo '</div>';
					echo '</div>';
				}
				echo '<div class="col-lg-6 col-xl-5 col-xxl-auto">';
					if( ! empty( $settings['feature_bg_image']['url'] ) ){
						echo '<div class="price-card mb-30" data-bg-src="'.esc_url( $settings['feature_bg_image']['url'] ).'">';
					}

						echo '<div class="price-content">';
							if( ! empty( $settings['title'] ) ){
								echo '<h2 class="price-title h3 fw-semibold">'.esc_html( $settings['title'] ).'</h2>';
							}
							if(!empty($settings['features'])){
								echo '<div class="price-list">';
									echo htmlspecialchars_decode(esc_html( $settings['features'] ));
								echo '</div>';
							}
							if( ! empty( $settings['button_text'] ) ){
	                            echo '<a href="'.esc_url($settings['button_link']['url']).'" class="vs-btn">'.esc_html($settings['button_text']).'</a>';
	                        }
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '<!------------------------End single price Area------------------------>';
	}
}