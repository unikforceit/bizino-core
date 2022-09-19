<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * Search Widget .
 *
 */
class Bizino_Search extends Widget_Base {

	public function get_name() {
		return 'bizinosearch';
	}

	public function get_title() {
		return __( 'Search', 'bizino' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'bizino' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'search_section',
			[
				'label' => __( 'Search Form', 'bizino' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'placeholder_text',
			[
				'label' 		=> __( 'Placeholder Text', 'bizino' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'What are you looking for?', 'bizino' ),
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
			'search_style_section',
			[
				'label' => __( 'Search Style', 'bizino' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
					'name' => 'input_typography',
					'label' => __( 'Typography', 'bizino' ),
					'selector' => '{{WRAPPER}} .search-form-wrapper .search-form input',
			]
		);


        $this->end_controls_section();

    }


	protected function render() {

        $settings = $this->get_settings_for_display();

		$plcaholder_text = !empty( $settings['placeholder_text'] ) ? $settings['placeholder_text'] : '';


        echo '<!-- Search Form -->';
        echo '<form data-post="product" class="live-search" action="#">';
            echo '<div class="live-search-input">';
								echo '<input type="text" class="form-control" placeholder="'.esc_attr( $plcaholder_text ).'">';
								echo '<div class="search-loader d-none"><i class="fal fa-sync"></i></div>';
            echo '</div>';
            echo '<div class="search-result"></div>';
        echo '</form>';
        echo '<!-- End Search Form -->';
	}

}