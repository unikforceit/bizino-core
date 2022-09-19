 <?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Contact Information Widget .
 *
 */
class Bizino_Social_Media_Widget extends Widget_Base {

	public function get_name() {
		return 'bizinosocialmedia';
	}

	public function get_title() {
		return esc_html__( 'Bizino Social Media', 'bizino' );
	}


	public function get_icon() {
		return 'eicon-social-icons';
    }


	public function get_categories() {
		return [ 'bizino_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'social_media_section',
			[
				'label'     => esc_html__( 'Social Media', 'bizino' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
			

		$repeater = new Repeater();

        $repeater->add_control(
			'social_icon',
			[
				'label' 	=> esc_html__( 'Social Icon', 'bizino' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> esc_html__( 'Link', 'bizino' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'bizino' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> esc_html__( 'Social Icon', 'bizino' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => esc_html__( 'Add Social Icon','bizino' ),
					],
				],
			]
		);

        $this->end_controls_section();


        /*----------------------------------------Social Media Settings----------------------------------------*/
 
		$this->start_controls_section(
			'social_media_styling',
			[
				'label' 	=> esc_html__( 'Social Media Styling', 'bizino' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'social_media_color',
			[
				'label' 		=> esc_html__( 'Icon Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-social ul li a' => 'color: {{VALUE}} !important;',
				],
			]
        );

        $this->add_control(
			'social_media_hover_color',
			[
				'label' 		=> esc_html__( 'Icon Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-social ul li a:hover' => 'color: {{VALUE}} !important;',
				],
			]
        );

        $this->add_control(
			'social_media_back_color',
			[
				'label' 		=> esc_html__( 'Icon Background Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-social ul li a' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'social_media_back_hover_color',
			[
				'label' 		=> esc_html__( 'Icon Background Hover Color', 'bizino' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-social ul li a:hover' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<div class="vs-social style2 hover-black">';
			echo '<ul>';
				foreach( $settings['social_icon_list'] as $social_icon ){

					$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';

					$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                	echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

						\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

					echo '</a></li>';
				}
			echo '</ul>';
		echo '</div>';		
	}
}