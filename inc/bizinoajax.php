<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function bizino_core_essential_scripts( ) {
    wp_enqueue_script('bizino-ajax',BIZINO_PLUGDIRURI.'assets/js/bizino.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'bizino-ajax',
    'bizinoajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'bizino-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','bizino_core_essential_scripts');


// bizino Section subscribe ajax callback function
add_action( 'wp_ajax_bizino_subscribe_ajax', 'bizino_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_bizino_subscribe_ajax', 'bizino_subscribe_ajax' );

function bizino_subscribe_ajax( ){
  $apiKey = bizino_opt('bizino_subscribe_apikey');
  $listid = bizino_opt('bizino_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'bizino-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'bizino').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'bizino').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'bizino').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'bizino').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'bizino').'</div>';
        }
   }

   wp_die();

}