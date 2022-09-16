<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Haarmax Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Haarmax_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		add_action( 'elementor/elements/categories_registered',[ $this, 'haarmax_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'haarmax' ),
			'<strong>' . esc_html__( 'Haarmax Core', 'haarmax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'haarmax' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'haarmax' ),
			'<strong>' . esc_html__( 'Haarmax Core', 'haarmax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'haarmax' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'haarmax' ),
			'<strong>' . esc_html__( 'Haarmax Core', 'haarmax' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'haarmax' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( HAARMAX_ADDONS . '/widgets/rating.php' );
		require_once( HAARMAX_ADDONS . '/widgets/features-box.php' );
		require_once( HAARMAX_ADDONS . '/widgets/section-title.php' );
		require_once( HAARMAX_ADDONS . '/widgets/image-with-video.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-service.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-price-list.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-testimonial.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-single-price-cart.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-gallery.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-team.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-newsletter.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-salon-infobox.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-blog.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-package.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-working-process.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-product-search.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-logo-carousel.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-offer-cart.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-counter.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-instagram-gallery.php' );
		require_once( HAARMAX_ADDONS . '/widgets/social-media.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-trends-product.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-right-choice.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-button.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-about-us.php' );
		require_once( HAARMAX_ADDONS . '/widgets/haarmax-history.php' );


		// Header Elements

		require_once( HAARMAX_ADDONS . '/header/header.php' );

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Rating_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Features_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Image_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Service_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Price_List_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Single_Price_Cart() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Team_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Newsletter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Salon_Info_Box_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Packages_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Working_Process() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Logo_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Offer_Cart_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Instagram_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Social_Media_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Trends_Products_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Right_Choice_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Button_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_AboutUs_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_History_Slider() );




		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Haarmax_Header() );
	}

    public function widget_scripts() {

        wp_enqueue_script(
            'haarmax-frontend-script',
            HAARMAX_PLUGDIRURI . 'assets/js/haarmax-frontend.js',
            array('jquery'),
            false,
            true
		);
	}


    function haarmax_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'haarmax',
            [
                'title' => __( 'Haarmax', 'haarmax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'haarmax_footer_elements',
            [
                'title' => __( 'Haarmax Footer Elements', 'haarmax' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'haarmax_header_elements',
            [
                'title' => __( 'Haarmax Header Elements', 'haarmax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Haarmax_Extension::instance();