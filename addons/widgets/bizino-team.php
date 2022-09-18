<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Team Widget .
 *
 */
class Bizino_Team_Widget extends Widget_Base{

	public function get_name() {
		return 'haarmaxteammember';
	}

	public function get_title() {
		return __( 'Bizino Team', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_content',
			[
				'label'		=> __( 'Team','haarmax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'team_style',
			[
				'label' 	=> __( 'Team Style', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'haarmax' ),
					'2' 		=> __( 'Style Two', 'haarmax' ),
				],
			]
		);

		/*-----------------------------------------style 1 Control ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'phone', [
				'label' 		=> __( 'Contact Number', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
        $repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Team Image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
		$this->add_control(
			'team_members',
			[
				'label' 		=> __( 'Team Member', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'team_style' =>  '1' ],
			]
		);

		/*-----------------------------------------style 2 Control ------------------------------------*/

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'haarmax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'team_icon',
			[
				'label' 		=> esc_html__( 'Team Icon', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' => [
                    'url' => plugins_url( 'images/team-icon.png', __FILE__ )
                ],
			]
        );
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'phone', [
				'label' 		=> __( 'Contact Number', 'haarmax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( '020 7388 5619' , 'haarmax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Team Image', 'haarmax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'google_link',
			[
				'label' 		=> esc_html__( 'Google Link', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Profile Url?', 'haarmax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'team_members_v2',
			[
				'label' 		=> __( 'Team Member', 'haarmax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'haarmax' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'team_style' =>  '2' ],
			]
		);
		
		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'hover_effect',
			[
				'label' 		=> __( 'Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-grid::before'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .team-grid::after'	=> 'background-color: {{VALUE}}!important;',
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
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-name'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .text-inherit:hover'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Title Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .text-inherit'
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .text-inherit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .text-inherit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------designation styling------------------------------------*/

		$this->start_controls_section(
			'degi_styling',
			[
				'label' 	=> __( 'Designation Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'degi_color',
			[
				'label' 		=> __( 'Designation Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-degi'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'degi_hvr_color',
			[
				'label' 		=> __( 'Designation Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-degi:hover'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'degi_typography',
		 		'label' 		=> __( 'Designation Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .team-degi'
			]
		);

        $this->add_responsive_control(
			'degi_margin',
			[
				'label' 		=> __( 'Designation Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'degi_padding',
			[
				'label' 		=> __( 'Designation Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------contact styling------------------------------------*/

		$this->start_controls_section(
			'contact_styling',
			[
				'label' 	=> __( 'Contact Number Styling', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'contact_color',
			[
				'label' 		=> __( 'Contact Number Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-number'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'contact_hvr_color',
			[
				'label' 		=> __( 'Contact Number Hover Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-number:hover'	=> 'color: {{VALUE}}',
					'{{WRAPPER}} .text-inherit:hover'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'contact_typography',
		 		'label' 		=> __( 'Contact Number Typography', 'haarmax' ),
		 		'selector' 		=> '{{WRAPPER}} .team-number'
			]
		);

        $this->add_responsive_control(
			'contact_margin',
			[
				'label' 		=> __( 'Contact Number Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'contact_padding',
			[
				'label' 		=> __( 'Contact Number Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Team Area----------------------->';
		if( $settings['team_style'] == '1' ){
			echo '<div class="vs-team-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                foreach( $settings['team_members'] as $data ) {
		                	$link = $data['profile_link']['url'] ? $data['profile_link']['url'] : '#';
		                	$mobile = $data['phone'];

		                	$replace        = array(' ','-',' - ');
				            $with           = array('','','');
				            $mobileurl      = str_replace( $replace, $with, $mobile );

			                echo '<div class="col-sm-6 col-lg-4 team-grid mb-30">';
			                	if( ! empty( $data['team_image']['url'] ) ){
				                   	echo '<div class="team-img">';
				                   		echo bizino_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                            'class'  	=> 'w-100',
					                        ) );
				                    echo '</div>';
				                }
			                    echo '<div class="team-content">';
			                    	if( ! empty( $data['name']) ){
				                        echo '<h3 class="team-name"><a class="text-inherit" href="'.esc_url($link).'">'.esc_html($data['name']).'</a></h3>';
				                    }
				                    if( ! empty( $data['designation']) ){
				                        echo '<p class="team-degi">'.esc_html($data['designation']).'</p>';
				                    }
				                    if( ! empty( $mobile ) ){
				                        echo '<span class="team-number"><i class="fal fa-phone-alt"></i> <a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html($mobile).'</a></span>';
				                    }
			                    echo '</div>';
			                echo '</div>';
		                }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<section class="vs-team-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row gx-60 vs-carousel">';
		            	foreach( $settings['team_members_v2'] as $data ) {
		            		$link = $data['profile_link']['url'] ? $data['profile_link']['url'] : '#';
		            		$mobile = $data['phone'];

		                	$replace        = array(' ','-',' - ');
				            $with           = array('','','');
				            $mobileurl      = str_replace( $replace, $with, $mobile );
			                echo '<div class="col-xl-4">';
			                    echo '<div class="team-masked">';
			                        echo '<div class="team-header">';
			                        	if( ! empty( $data['team_image']['url'] ) ){
				                            echo '<div class="team-img" data-mask-src="' . esc_url( plugins_url( 'images/team-mask.png', __FILE__ ) ) . ' ">';
				                                echo bizino_img_tag( array(
						                            'url'       => esc_url( $data['team_image']['url'] ),
						                            'class'  	=> 'w-100',
						                        ) );
				                            echo '</div>';
				                        }
			                            echo '<div class="team-links">';
			                                echo '<a href="'.esc_url( '#' ).'" class="team-toggler-btn">';
			                                    echo '<span class="default">';
			                                    	echo '<i class="fal fa-share-alt"></i>';
			                                    echo '</span>';
			                                    echo '<span class="hidden"><i class="far fa-times"></i></span>';
			                                echo '</a>';
			                                echo '<div class="team-social">';
			                                	if(!empty($data['twitter_link']['url'])){
			                                    	echo '<a href="'.esc_url($data['twitter_link']['url']).'"><i class="fab fa-twitter"></i></a>';
			                                	}
			                                	if(!empty($data['google_link']['url'])){
			                                    	echo '<a href="'.esc_url($data['google_link']['url']).'"><i class="fab fa-google"></i></a>';
			                                    }
			                                    if(!empty($data['fb_link']['url'])){
			                                    	echo '<a href="'.esc_url($data['fb_link']['url']).'"><i class="fab fa-facebook-f"></i></a>';
			                                    }
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                        echo '<div class="team-content">';
			                        	if(!empty($data['name'])){
				                            echo '<h3 class="team-name"><a class="text-inherit" href="'.esc_url($link).'">'.esc_html($data['name']).'</a></h3>';
				                        }
				                        if( ! empty( $data['designation']) ){
					                        echo '<p class="team-degi">'.esc_html($data['designation']).'</p>';
					                    }
					                    if( ! empty( $mobile ) ){
					                        echo '<span class="team-number"><i class="fal fa-phone-alt"></i> <a class="text-inherit" href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html($mobile).'</a></span>';
					                    }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}
		echo '<!-----------------------End Team Area----------------------->';
	}
}