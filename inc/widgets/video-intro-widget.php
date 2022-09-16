<?php
/**
* @version  1.0
* @package  haarmax
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Video Intro Widget
***************************************/

class haarmax_vido_intro_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'haarmax_vido_intro_widget',

                // Widget name will appear in UI
                esc_html__( 'Haarmax :: Video Intro Widget', 'haarmax' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Video Intro Widget', 'haarmax' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );
            $video_title    = apply_filters( 'widget_video_title', $instance['video_title'] );
			$video_link 	= apply_filters( 'widget_video_link', $instance['video_link'] );
            if ( isset( $instance[ 'thumbnail' ] ) ) {
                $thumbnail = $instance[ 'thumbnail' ];
            }else {
                $thumbnail = '#';
            }
            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }

                echo '<div class="vs-video-widget">';
                    if( !empty( $thumbnail ) ){
                        echo '<div class="video-thumb">';
                            echo '<img src="'.esc_url( $thumbnail ).'" alt="Video Thumb" class="w-100">';
                            if( !empty( $video_link ) ){
                                echo '<a href="'.esc_url( $video_link ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
                            }
                        echo '</div>';
                    }
                    if( !empty( $video_title ) ){
                        echo '<h4 class="video-thumb-title">'.esc_html( $video_title ).'</h4>';
                    }
                echo '</div>';
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

            //Video Title
             if ( isset( $instance[ 'video_title' ] ) ) {
                $video_title = $instance[ 'video_title' ];
            }else {
                $video_title = '';
            }

            //Video Link
             if ( isset( $instance[ 'video_link' ] ) ) {
                $video_link = $instance[ 'video_link' ];
            }else {
                $video_link = '';
            }


            //Image Url
            if ( isset( $instance[ 'thumbnail' ] ) ) {
                $thumbnail = $instance[ 'thumbnail' ];
            }else {
                $thumbnail = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'video_title' ); ?>"><?php _e( 'Video Title:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'video_title' ); ?>" name="<?php echo $this->get_field_name( 'video_title' ); ?>" type="text" value="<?php echo esc_attr( $video_title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'video_link' ); ?>"><?php _e( 'Video Url:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'video_link' ); ?>" name="<?php echo $this->get_field_name( 'video_link' ); ?>" type="text" value="<?php echo esc_attr( $video_link ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr( $thumbnail ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" type="hidden" class="widefat img_val" type="text" />
                <img class="img_show" src="<?php echo esc_url( $thumbnail ); ?>" alt="">
            </p>

            <p>
                <button class="button about-up-btn"><?php ( empty( $thumbnail ) ) ?  esc_html_e( "Upload Image", "haarmax" ) : esc_html_e( "Change Image", "haarmax" ); ?></button>
            </p>
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']              = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['video_title']                 = ( ! empty( $new_instance['video_title'] ) ) ? strip_tags( $new_instance['video_title'] ) : '';
            $instance['video_link'] 	        	= ( ! empty( $new_instance['video_link'] ) ) ? strip_tags( $new_instance['video_link'] ) : '';
            $instance['thumbnail'] 	    = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
			return $instance;
        }
    } // Class haarmax_vido_intro_widget ends here


    // Register and load the widget
    function haarmax_vidointro_load_widget() {
        register_widget( 'haarmax_vido_intro_widget' );
    }
    add_action( 'widgets_init', 'haarmax_vidointro_load_widget' );