<?php

/**

 * Plugin Name: Haarino Core
 * Description: This is a helper plugin of haarino theme
 * Version:     1.0
 * Author:      Vecurosoft
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: haarmax
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'HAARMAX_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'HAARMAX_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );

define( 'HAARMAX_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'HAARMAX_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'HAARMAX_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'HAARMAX_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'haarmax-template/' );



// load textdomain

load_plugin_textdomain( 'haarmax', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once HAARMAX_PLUGIN_INC_PATH .'haarmaxcore-functions.php';
require_once HAARMAX_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once HAARMAX_PLUGIN_INC_PATH .'haarmaxajax.php';
require_once HAARMAX_PLUGIN_INC_PATH .'builder/builder.php';



//Widget

require_once HAARMAX_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once HAARMAX_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once HAARMAX_PLUGIN_WIDGET_PATH . 'contact-info-widget.php';
require_once HAARMAX_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once HAARMAX_PLUGIN_WIDGET_PATH . 'video-intro-widget.php';



//addons

require_once HAARMAX_ADDONS . 'addons.php';