<?php

/**

 * Plugin Name: Bizino Core
 * Description: This is a helper plugin of bizino theme
 * Version:     1.0
 * Author:      Vecurosoft
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: bizino
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'BIZINO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'BIZINO_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );

define( 'BIZINO_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'BIZINO_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'BIZINO_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'BIZINO_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'bizino-template/' );



// load textdomain

load_plugin_textdomain( 'bizino', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once BIZINO_PLUGIN_INC_PATH .'bizinocore-functions.php';
require_once BIZINO_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once BIZINO_PLUGIN_INC_PATH .'bizinoajax.php';
require_once BIZINO_PLUGIN_INC_PATH .'builder/builder.php';



//Widget

require_once BIZINO_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once BIZINO_PLUGIN_WIDGET_PATH . 'newslatter.php';
require_once BIZINO_PLUGIN_WIDGET_PATH . 'contact-info-widget.php';



//addons

require_once BIZINO_ADDONS . 'addons.php';