<?php
/**
 * @version  1.0
 * @package  bizino
 * @author   Vecurosoft <support@vecurosoft.com>
 *
 * Websites: http://www.vecurosoft.com
 *
 */

/**************************************
*Creating Contact Information Widget
***************************************/

class bizino_contact_info_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'bizino_contact_info_widget',
			// Widget name will appear in UI
			esc_html__( 'Bizino :: Contact Info', 'bizino' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Contact Info', 'bizino' ),
				'classname'		 => 'widget_contact',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {

	$title          = apply_filters( 'widget_title', $instance['title'] );
	$mobile 		= apply_filters( 'widget_mobile', $instance['mobile'] );
	$email 			= ( !empty( $instance['email'] ) ) ? $instance['email'] : "";
	$address 		= ( !empty( $instance['address'] ) ) ? $instance['address'] : "";

	//Remove ' ' , '-', ' - ' from email
	$email 			= is_email( $email );
	$replace 		= array(' ','-',' - ');
	$with 			= array('','','');
	$emailurl 		= str_replace( $replace, $with, $email );

	$mobileurl 	    = str_replace( $replace, $with, $mobile );
	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- Contact Info Widget Start -->';
    	if( !empty( $title  ) ){
            echo $args['before_title']; 
                echo esc_html( $title );
            echo $args['after_title']; 
        }

		echo '<div class="vs-widget-about">';
            if( !empty( $mobile ) ){
                echo '<p class="footer-info"><i class="fal fa-map-marker-alt"></i>'.esc_html( $mobile ).'</p>';
            }
		    if( !empty( $email ) ){
		        echo '<p class="footer-info"><i class="fal fa-envelope"></i><a class="text-inherit" href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></p>';
		    }
            if( !empty( $address ) ){
                echo '<p class="footer-info"><i class="fal fa-phone-alt"></i><a class="text-inherit" href="'.esc_attr( 'tel:'.$address ).'">'.esc_html( $address ).'</a></p>';
            }
        echo '</div>';
	echo $args['after_widget'];
    echo '<!-- Contact Info Widget End -->';


}


// Widget Backend
public function form( $instance ) {

	//Title 
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }else {
        $title = '';
    }
	
	// E-mail one
	if ( isset( $instance[ 'email' ] ) ) {
		$email = $instance[ 'email' ];
	}else {
		$email = '';
	}
	// Mobile
    if ( isset( $instance[ 'mobile' ] ) ) {
        $mobile = $instance[ 'mobile' ];
    }else {
        $mobile = '';
    }

    // Address
    if ( isset( $instance[ 'address' ] ) ) {
        $address = $instance[ 'address' ];
    }else {
        $address = '';
    }
?>

	<p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'bizino'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'mobile' ); ?>">
			<?php
				_e( 'Mobile :' ,'bizino');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">
			<?php
				_e( 'Email :' ,'bizino');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>">
			<?php
				_e( 'Address :' ,'bizino');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
	</p>

	

<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['title'] 		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['email'] 		= ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

	$instance['mobile']  	= ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';

	$instance['address']  	= ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

	return $instance;
}
}
// Class bizino_subscribe_widget ends here

// Register and load the widget
function bizino_contact_info_load_widget() {
	register_widget( 'bizino_contact_info_widget' );
}
add_action( 'widgets_init', 'bizino_contact_info_load_widget' );