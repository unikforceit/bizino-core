<?php

/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access

    if( ! defined( 'ABSPATH' ) ){

        exit();

    }

/**

 * Admin Custom Login Logo

 */

function bizino_custom_login_logo() {

    $logo = ! empty( bizino_opt( 'bizino_admin_login_logo', 'url' ) ) ? bizino_opt( 'bizino_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'bizino_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'bizino_admin_styles' );

function bizino_admin_styles() {

  if ( ! empty( $bizino_admin_custom_css ) ) {
        $bizino_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $bizino_admin_custom_css);
        echo '<style rel="stylesheet" id="bizino-admin-custom-css" >';
            echo esc_html( $bizino_admin_custom_css );
        echo '</style>';
    }
}

 // share button code

 function bizino_social_sharing_buttons( ) {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );

    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );

    $pinteresturl   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());

    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );

    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';

    $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';

    $content .= '<li><a class="pinterest" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i></a></li>';

    $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';

    return $content;

};



//add SVG to allowed file uploads

function bizino_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;

}

add_filter('upload_mimes', 'bizino_mime_types');



function bizino_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'bizino_wp_check_filetype_and_ext', 10, 4 );


/**
* Enqueue block editor JavaScript and CSS
*/
function bizino_widget_editor_scripts() {

    // Make paths variables so we don't write em twice 😉
    $blockPath = '../assets/js/blocks.js';

    // Enqueue the bundled block JS file
    wp_enqueue_script(
        'bizino-blocks-js',
        plugins_url( $blockPath, __FILE__ ),
        [  'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ],
        '1.00',
        true
    );

}
// Hook scripts function into block editor hook
add_action( 'enqueue_block_editor_assets', 'bizino_widget_editor_scripts' );

// Add Image Size

add_image_size( 'bizino_150X170', 150, 170, true );
add_image_size( 'bizino_90X80', 90, 80, true );
add_image_size( 'home-slider-blog-image', 374, 313, true );
add_image_size( 'home-slider-blog-image-two', 470, 270, true );