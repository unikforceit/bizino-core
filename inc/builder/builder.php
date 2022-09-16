<?php
    /**
     * Class For Builder
     */
    class HaarmaxBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'haarmax_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'haarmax-core',HAARMAX_PLUGDIRURI.'assets/js/haarmax-core.js',array( 'jquery' ),'1.0',true );
		}


        public function haarmax_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'haarmax_header_option',
                [
                    'label'     => __( 'Header Option', 'haarmax' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'haarino_header_style',
                [
                    'label'     => __( 'Header Option', 'haarmax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'haarmax' ),
    					'header_builder'       => __( 'Header Builder', 'haarmax' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'haarino_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'haarmax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->haarmax_header_choose_option(),
                    'condition' => [ 'haarino_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'haarmax_footer_option',
                [
                    'label'     => __( 'Footer Option', 'haarmax' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'haarino_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'haarmax' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'haarmax' ),
    				'label_off'     => __( 'No', 'haarmax' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'haarino_footer_style',
                [
                    'label'     => __( 'Footer Style', 'haarmax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'haarmax' ),
    					'footer_builder'       => __( 'Footer Builder', 'haarmax' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'haarino_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'haarino_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'haarmax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->haarmax_footer_choose_option(),
                    'condition' => [ 'haarino_footer_style' => 'footer_builder','haarino_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Haarino Builder', 'haarmax' ),
            	esc_html__( 'Haarino Builder', 'haarmax' ),
				'manage_options',
				'haarmax',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('haarmax', esc_html__('Footer Builder', 'haarmax'), esc_html__('Footer Builder', 'haarmax'), 'manage_options', 'edit.php?post_type=haarmax_footer_build');
			add_submenu_page('haarmax', esc_html__('Header Builder', 'haarmax'), esc_html__('Header Builder', 'haarmax'), 'manage_options', 'edit.php?post_type=haarmax_header_build');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','haarmax' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'haarmax' ),
				'singular_name'      => __( 'Footer', 'haarmax' ),
				'menu_name'          => __( 'Haarmax Footer Builder', 'haarmax' ),
				'name_admin_bar'     => __( 'Footer', 'haarmax' ),
				'add_new'            => __( 'Add New', 'haarmax' ),
				'add_new_item'       => __( 'Add New Footer', 'haarmax' ),
				'new_item'           => __( 'New Footer', 'haarmax' ),
				'edit_item'          => __( 'Edit Footer', 'haarmax' ),
				'view_item'          => __( 'View Footer', 'haarmax' ),
				'all_items'          => __( 'All Footer', 'haarmax' ),
				'search_items'       => __( 'Search Footer', 'haarmax' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'haarmax' ),
				'not_found'          => __( 'No Footer found.', 'haarmax' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'haarmax' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'haarmax_footer_build', $args );

			$labels = array(
				'name'               => __( 'Header', 'haarmax' ),
				'singular_name'      => __( 'Header', 'haarmax' ),
				'menu_name'          => __( 'Haarmax Header Builder', 'haarmax' ),
				'name_admin_bar'     => __( 'Header', 'haarmax' ),
				'add_new'            => __( 'Add New', 'haarmax' ),
				'add_new_item'       => __( 'Add New Header', 'haarmax' ),
				'new_item'           => __( 'New Header', 'haarmax' ),
				'edit_item'          => __( 'Edit Header', 'haarmax' ),
				'view_item'          => __( 'View Header', 'haarmax' ),
				'all_items'          => __( 'All Header', 'haarmax' ),
				'search_items'       => __( 'Search Header', 'haarmax' ),
				'parent_item_colon'  => __( 'Parent Header:', 'haarmax' ),
				'not_found'          => __( 'No Header found.', 'haarmax' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'haarmax' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'haarmax_header_build', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'haarmax_footer_build' == $post->post_type || 'haarmax_header_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function haarmax_footer_choose_option(){

			$haarmax_post_query = new WP_Query( array(
				'post_type'			=> 'haarmax_footer_build',
				'posts_per_page'	    => -1,
			) );

			$haarmax_builder_post_title = array();
			$haarmax_builder_post_title[''] = __('Select a Footer','Haarmax');

			while( $haarmax_post_query->have_posts() ) {
				$haarmax_post_query->the_post();
				$haarmax_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $haarmax_builder_post_title;

		}

		public function haarmax_header_choose_option(){

			$haarmax_post_query = new WP_Query( array(
				'post_type'			=> 'haarmax_header_build',
				'posts_per_page'	    => -1,
			) );

			$haarmax_builder_post_title = array();
			$haarmax_builder_post_title[''] = __('Select a Header','Haarmax');

			while( $haarmax_post_query->have_posts() ) {
				$haarmax_post_query->the_post();
				$haarmax_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $haarmax_builder_post_title;

        }

    }

    $builder_execute = new HaarmaxBuilder();