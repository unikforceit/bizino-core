<?php

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\Page;

/**
 * Class For Builder
 */
class BizinoBuilder
{

    function __construct()
    {
        // register admin menus
        add_action('admin_menu', [$this, 'register_settings_menus']);

        // Custom Footer Builder With Post Type
        add_action('init', [$this, 'post_type'], 0);

        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_scripts']);

        add_filter('single_template', [$this, 'load_canvas_template']);

        add_action('elementor/element/wp-page/document_settings/after_section_end', [$this, 'bizino_add_elementor_page_settings_controls'], 10, 2);

    }

    public function widget_scripts()
    {
        wp_enqueue_script('bizino-core', BIZINO_PLUGDIRURI . 'assets/js/bizino-core.js', array('jquery'), '1.0', true);
    }


    public function bizino_add_elementor_page_settings_controls(Page $page)
    {

        $page->start_controls_section(
            'bizino_header_option',
            [
                'label' => __('Header Option', 'bizino'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );


        $page->add_control(
            'bizino_header_style',
            [
                'label' => __('Header Option', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'prebuilt' => __('Pre Built', 'bizino'),
                    'header_builder' => __('Header Builder', 'bizino'),
                ],
                'default' => 'prebuilt',
            ]
        );

        $page->add_control(
            'bizino_header_builder_option',
            [
                'label' => __('Header Name', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->bizino_header_choose_option(),
                'condition' => ['bizino_header_style' => 'header_builder'],
                'default' => ''
            ]
        );

        $page->end_controls_section();

        $page->start_controls_section(
            'bizino_footer_option',
            [
                'label' => __('Footer Option', 'bizino'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );
        $page->add_control(
            'bizino_footer_choice',
            [
                'label' => __('Enable Footer?', 'bizino'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bizino'),
                'label_off' => __('No', 'bizino'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $page->add_control(
            'bizino_footer_style',
            [
                'label' => __('Footer Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'prebuilt' => __('Pre Built', 'bizino'),
                    'footer_builder' => __('Footer Builder', 'bizino'),
                ],
                'default' => 'prebuilt',
                'condition' => ['bizino_footer_choice' => 'yes'],
            ]
        );
        $page->add_control(
            'bizino_footer_builder_option',
            [
                'label' => __('Footer Name', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->bizino_footer_choose_option(),
                'condition' => ['bizino_footer_style' => 'footer_builder', 'bizino_footer_choice' => 'yes'],
                'default' => ''
            ]
        );

        $page->end_controls_section();

    }

    public function bizino_header_choose_option()
    {

        $bizino_post_query = new WP_Query(array(
            'post_type' => 'bizino_header_build',
            'posts_per_page' => -1,
        ));

        $bizino_builder_post_title = array();
        $bizino_builder_post_title[''] = __('Select a Header', 'Bizino');

        while ($bizino_post_query->have_posts()) {
            $bizino_post_query->the_post();
            $bizino_builder_post_title[get_the_ID()] = get_the_title();
        }
        wp_reset_postdata();

        return $bizino_builder_post_title;

    }

    // Callback Function

    public function bizino_footer_choose_option()
    {

        $bizino_post_query = new WP_Query(array(
            'post_type' => 'bizino_footer_build',
            'posts_per_page' => -1,
        ));

        $bizino_builder_post_title = array();
        $bizino_builder_post_title[''] = __('Select a Footer', 'Bizino');

        while ($bizino_post_query->have_posts()) {
            $bizino_post_query->the_post();
            $bizino_builder_post_title[get_the_ID()] = get_the_title();
        }
        wp_reset_postdata();

        return $bizino_builder_post_title;

    }

    public function register_settings_menus()
    {
        add_menu_page(
            esc_html__('Bizino Builder', 'bizino'),
            esc_html__('Bizino Builder', 'bizino'),
            'manage_options',
            'bizino',
            [$this, 'register_settings_contents__settings'],
            'dashicons-admin-site',
            2
        );

        add_submenu_page('bizino', esc_html__('Footer Builder', 'bizino'), esc_html__('Footer Builder', 'bizino'), 'manage_options', 'edit.php?post_type=bizino_footer_build');
        add_submenu_page('bizino', esc_html__('Header Builder', 'bizino'), esc_html__('Header Builder', 'bizino'), 'manage_options', 'edit.php?post_type=bizino_header_build');
    }

    public function register_settings_contents__settings()
    {
        echo '<h2>';
        echo esc_html__('Welcome To Header And Footer Builder Of This Theme', 'bizino');
        echo '</h2>';
    }

    public function post_type()
    {

        $labels = array(
            'name' => __('Footer', 'bizino'),
            'singular_name' => __('Footer', 'bizino'),
            'menu_name' => __('Bizino Footer Builder', 'bizino'),
            'name_admin_bar' => __('Footer', 'bizino'),
            'add_new' => __('Add New', 'bizino'),
            'add_new_item' => __('Add New Footer', 'bizino'),
            'new_item' => __('New Footer', 'bizino'),
            'edit_item' => __('Edit Footer', 'bizino'),
            'view_item' => __('View Footer', 'bizino'),
            'all_items' => __('All Footer', 'bizino'),
            'search_items' => __('Search Footer', 'bizino'),
            'parent_item_colon' => __('Parent Footer:', 'bizino'),
            'not_found' => __('No Footer found.', 'bizino'),
            'not_found_in_trash' => __('No Footer found in Trash.', 'bizino'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => false,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'elementor'),
        );

        register_post_type('bizino_footer_build', $args);

        $labels = array(
            'name' => __('Header', 'bizino'),
            'singular_name' => __('Header', 'bizino'),
            'menu_name' => __('Bizino Header Builder', 'bizino'),
            'name_admin_bar' => __('Header', 'bizino'),
            'add_new' => __('Add New', 'bizino'),
            'add_new_item' => __('Add New Header', 'bizino'),
            'new_item' => __('New Header', 'bizino'),
            'edit_item' => __('Edit Header', 'bizino'),
            'view_item' => __('View Header', 'bizino'),
            'all_items' => __('All Header', 'bizino'),
            'search_items' => __('Search Header', 'bizino'),
            'parent_item_colon' => __('Parent Header:', 'bizino'),
            'not_found' => __('No Header found.', 'bizino'),
            'not_found_in_trash' => __('No Header found in Trash.', 'bizino'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => false,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'elementor'),
        );

        register_post_type('bizino_header_build', $args);
    }

    function load_canvas_template($single_template)
    {

        global $post;

        if ('bizino_footer_build' == $post->post_type || 'bizino_header_build' == $post->post_type) {

            $elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

            if (file_exists($elementor_2_0_canvas)) {
                return $elementor_2_0_canvas;
            } else {
                return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
            }
        }

        return $single_template;
    }

}

$builder_execute = new BizinoBuilder();