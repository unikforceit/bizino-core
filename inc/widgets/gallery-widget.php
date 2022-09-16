<?php
/**
* @version  1.0
* @package  Haarmax
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Gallery Widget
***************************************/

class haarmax_gallery_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'haarmax_gallery_widget',

                // Widget name will appear in UI
                esc_html__( 'Haarmax :: Gallery', 'haarmax' ),

                // Widget description
                array(
                    'classname'                     => '',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Gallery Widget', 'haarmax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
				$haarmax_gallery_image = haarino_opt( 'haarino_gallery_image_widget' );
				if( !empty( $haarmax_gallery_image ) && isset( $haarmax_gallery_image ) ){
					echo '<div class="sidebar-gallery">';
						foreach( $haarmax_gallery_image as $single_image ){
                            echo '<div class="gallery-thumb">';
                                echo haarino_img_tag( array(
                                    'url'   => esc_url( $single_image['image'] ),
                                    'class' => 'w-100'
                                ) );
                                echo '<a href="'.esc_url( $single_image['image'] ).'" class="icon-thumb popup-image"><i class="fab fa-instagram"></i></a>';
                            echo '</div>';
						}
                    echo '</div>';
				}

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				<a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Haarino&tab=15' );?>"><?php _e( 'Add Gallery Image', 'haarmax' )?></a>
            </p>

            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }
    } // Class haarmax_gallery_widget ends here


    // Register and load the widget
    function haarmax_gallery_widget() {
        register_widget( 'haarmax_gallery_widget' );
    }
    add_action( 'widgets_init', 'haarmax_gallery_widget' );