<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Rating Widget .
 *
 */
class Haarmax_Rating_Widget extends Widget_Base {

	public function get_name() {
		return 'haarmaxrating';
	}

	public function get_title() {
		return __( 'Rating', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-rating';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'rating_section',
			[
				'label'		 	=> __( 'Rating', 'haarmax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'rating_qty',
			[
				'label' 	=> esc_html__( 'Rating', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> esc_html__( 'One Star', 'medilax' ),
					'two' 			=> esc_html__( 'Two Star', 'medilax' ),
					'three' 		=> esc_html__( 'Three Star', 'medilax' ),
					'four' 			=> esc_html__( 'Four Star', 'medilax' ),
					'five' 			=> esc_html__( 'Five Star', 'medilax' ),
				],
			]
        );
        

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		
        echo '<!------------------ Start Rating Area------------------->';
        echo '<div class="text-theme fs-16">';
			if( $testimonial['rating'] == 'one' ){
            	echo '<i class="fas fa-star"></i> ';
            }elseif( $testimonial['rating'] == 'two' ){
            	echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
            }elseif( $testimonial['rating'] == 'three' ){
            	echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
            }elseif( $testimonial['rating'] == 'four' ){
            	echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i>';
            }else{
            	echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i> ';
                echo '<i class="fas fa-star"></i>';
            }
        echo '</div>';
	    echo '<!---------------End Rating Area---------------->';
	}
}