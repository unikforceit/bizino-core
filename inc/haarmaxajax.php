<?php
/**
 * @Packge     : Haarmax
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function haarmax_core_essential_scripts( ) {
    wp_enqueue_script('haarmax-ajax',HAARMAX_PLUGDIRURI.'assets/js/haarmax.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'haarmax-ajax',
    'haarmaxajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'haarmax-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','haarmax_core_essential_scripts');


// haarmax Section subscribe ajax callback function
add_action( 'wp_ajax_haarmax_subscribe_ajax', 'haarmax_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_haarmax_subscribe_ajax', 'haarmax_subscribe_ajax' );

function haarmax_subscribe_ajax( ){
  $apiKey = haarino_opt('haarino_subscribe_apikey');
  $listid = haarino_opt('haarino_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'haarmax-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'haarmax').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'haarmax').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'haarmax').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'haarmax').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'haarmax').'</div>';
        }
   }

   wp_die();

}


// ajax product search
add_action('wp_ajax_haarmax_ajax_search','haarmax_ajax_search');
add_action('wp_ajax_nopriv_haarmax_ajax_search','haarmax_ajax_search');

function haarmax_ajax_search( ) {
    $_products = new WP_Query( array(
        'post_type' => $_POST['posttype'],
        'posts_per_page'  => '5',
        's' => esc_html( $_POST['searchkey'] )
    ) );
    if( $_products->have_posts() ) {
        echo '<div class="serch-item-wrap">';
        while( $_products->have_posts() ) {
            $_products->the_post();
            $prodid = get_the_ID();
            $_product = wc_get_product($prodid);
            echo '<div class="vs-serch-item product-horizontal">';
                if( has_post_thumbnail() ) {
                    echo '<!-- Product Image -->
                    <a href="'.esc_url( get_permalink() ).'" class="product-thumbnail">
                        <img src="'.esc_url( get_the_post_thumbnail_url(null,'thumbnail') ).'" alt="">
                    </a>
                    <!-- End Product Image -->';
                }

                echo '<!-- Product Summery -->
                <div class="product-summary">
                        <h5 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses_post( get_the_title() ).'</a></h5>
                        <!-- Price -->
                        <span class="price">';
                            if( $_product->get_price_html() ) {
                                echo $_product->get_price_html();
                            }
                        echo '</span>
                        <!-- End Price -->

                        <!-- Rating -->';
                        if ( wc_review_ratings_enabled() ) {
                            echo wc_get_rating_html( $_product->get_average_rating() );
                        }
                        echo '<!-- End Product Rating -->
                </div>
                <!-- End Product Summery -->
            </div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<div class="search-item-wrap">';
            echo '<p class="text-danger mb-0">'.esc_html__('Sorry!!! No product found','haarmax').'</p>';
        echo '</div>';
    }
    wp_die();
}