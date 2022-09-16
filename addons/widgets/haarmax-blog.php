<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Haarmax_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'haarmaxblogpost';
	}

	public function get_title() {
		return __( 'Blog Post', 'haarmax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'haarmax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'haarmax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_style',
			[
				'label' 	=> __( 'Blog Style', 'haarmax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'haarmax' ),
					'2' 		=> __( 'Style Two', 'haarmax' ),
				],
			]
		);

        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'haarmax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '4', 'haarmax' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'haarmax' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'haarmax' ),
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label' 	=> __( 'Excerpt Length', 'haarmax' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '16', 'haarmax' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'haarmax' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','haarmax'),
                    'DESC'   	=> __('DESC','haarmax'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'haarmax' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'haarmax' ),
                    'author'    => __( 'Author', 'haarmax' ),
                    'title'    	=> __( 'Title', 'haarmax' ),
                    'date'    	=> __( 'Date', 'haarmax' ),
                    'rand'    	=> __( 'Random', 'haarmax' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'haarmax' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->haarmax_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'haarmax' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->haarmax_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'haarmax' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->haarmax_post_id(),
			]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'haarmax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [ 'blog_style' => '1' ]
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
					'size' 		=> 3,
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label' 	=> __( 'Title', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label' 		=> __( 'Title Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_color_hover',
			[
				'label' 		=> __( 'Title Color Hover', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'label' 	=> __( 'Title Typography', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .blog-title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'haarmax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .meta-box a,{{WRAPPER}} .blog-steped .blog-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .meta-box a,{{WRAPPER}} .blog-steped .blog-date',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'excerpt_style',
			[
				'label' 	=> __( 'Excerpt', 'haarmax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'excerpt_color',
			[
				'label' 		=> __( 'Excerpt Color', 'haarmax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-content .blog-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'excerpt_typography',
				'label' 	=> __( 'Excerpt Typography', 'haarmax' ),
				'selector' 	=> '{{WRAPPER}} .blog-content .blog-text',
			]
		);
		$this->end_controls_section();
    }

    public function haarmax_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'haarmax');
        }

        return $catarr;
    }

    public function haarmax_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'haarmax');
        }

        return $catarr;
    }

    // Get Specific Post
    public function haarmax_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $haarmax_post = new WP_Query( $args );

        $postarray = [];

        while( $haarmax_post->have_posts() ){
            $haarmax_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }

        $this->add_render_attribute( 'wrapper', 'class', 'row blog-vs-carousel');

		if( $settings['blog_style'] == '1' ){
	        $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
	        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		}

        $blogpost = new WP_Query( $args );

        if( $blogpost->have_posts() ) {
			if( $settings['blog_style'] == '1' ){
				echo '<!-- blog Area -->';
				echo '<section class="vs-blog-wrapper">';
				  	echo '<div class="container">';
				    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							while( $blogpost->have_posts() ) {
								$blogpost->the_post();
								echo '<div class="col-xl-4">';
				                    echo '<div class="vs-blog blog-card">';
				                        echo '<div class="blog-img">';
				                            the_post_thumbnail( 'home-slider-blog-image', array( 'class' => 'w-100' ) );

				                        echo '</div>';
				                        echo '<div class="blog-content">';
										echo '<div class="meta-box">';
										   echo '<a href="'.esc_url( haarino_blog_date_permalink() ).'"><i class="far fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
										   echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="far fa-user"></i>'.esc_html( get_the_author() ).'</a>';
									   echo '</div>';
											if( get_the_title() ){
												echo '<!-- Post Title -->';
												echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
												echo '<!-- End Post Title -->';
											}
				                            echo '<p class="blog-text">'.esc_html( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
											echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html__( 'Read More', 'haarmax' ).'<i class="far fa-long-arrow-right"></i></a>';
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
						  	}
							wp_reset_postdata();
				    	echo '</div><!-- .row END -->';
				  	echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- blog Area end -->';
			}else{
				echo '<section class="vs-blog-wrapper">';
			        echo '<div class="container">';
			            echo '<div class="row gx-lg-0 align-items-start">';
							while( $blogpost->have_posts() ) {
								$blogpost->the_post();
					                echo '<div class="col-md-6 blog-steped">';
					                    echo '<div class="vs-blog">';
					                        echo '<div class="blog-img">';
					                            echo '<a href="'.esc_url( get_permalink() ).'">';
													the_post_thumbnail( 'home-slider-blog-image-two', array( 'class' => 'w-100' ) );
												echo '</a>';
					                            echo '<a href="'.esc_url( haarino_blog_date_permalink() ).'" class="blog-date">'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';
					                        echo '</div>';
					                        echo '<div class="blog-content">';
					                            echo '<div class="post-author">';
					                                echo esc_html__( 'Posted By ', 'haarmax' );
													echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">'.esc_html( get_the_author() ).'</a>';
					                            echo '</div>';
					                            echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
					                        echo '</div>';
					                    echo '</div>';
					                echo '</div>';
								}
							wp_reset_postdata();
			            echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
        }
	}
}