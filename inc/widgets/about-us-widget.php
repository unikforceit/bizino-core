<?php
/**
* @version  1.0
* @package  haarmax
* @author   Vecurosoft <support@haarmax.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class haarmax_about_us_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'haarmax_about_us_widget',

                // Widget name will appear in UI
                esc_html__( 'Bizino :: About Us', 'haarmax' ),

                // Widget description
                array(
                    'classname'                     => 'about',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'haarmax' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
            $desc           = ( !empty( $instance['desc'] ) ) ? $instance['desc'] : "";
            $rating_txt     = ( !empty( $instance['rating_txt'] ) ) ? $instance['rating_txt'] : "";
            $rating         = ( !empty( $instance['rating'] ) ) ? $instance['rating'] : "";

            //before and after widget arguments are defined by themes
            echo '<!-- Author Widget -->';
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }

                echo '<div class="vs-widget-about">';
                    if( !empty( $instance['desc'] ) ) {
                        echo bizino_paragraph_tag( array(
                            'text'  => wp_kses_post( $instance['desc'] ),
                            'class' => 'pe-xl-5 mb-3',
                        ) );
                    }
                    echo '<div class="footer-rating">';
                        if( !empty( $instance['rating_txt'] ) ) {
                            echo '<div class="text-theme fs-16">';
                                if( $instance['rating_txt']  ==  1 ) {
                                    echo '<i class="fas fa-star"></i>';
                                }elseif( $instance['rating_txt']  ==  2 ){
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';;
                                }elseif( $instance['rating_txt']  ==  3 ){
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';
                                }elseif( $instance['rating_txt']  ==  4 ){
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';
                                    echo '<i class="fas fa-star"></i>';
                                }elseif( $instance['rating_txt']  ==  5 ){
                                    echo '<i class="fas fa-star"></i> ';
                                    echo '<i class="fas fa-star"></i> ';
                                    echo '<i class="fas fa-star"></i> ';
                                    echo '<i class="fas fa-star"></i> ';
                                    echo '<i class="fas fa-star"></i>';
                                }
                            echo '</div>';
                        }
                        if( !empty( $instance['rating_txt'] ) ) {
                            echo bizino_paragraph_tag( array(
                                'text'  => wp_kses_post( $instance['rating_txt'] ),
                                'class' => 'text-uppercase text-white mb-0',
                            ) );
                        }
                    echo '</div>';

                echo '</div>';
            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // Description
            if ( isset( $instance[ 'desc' ] ) ) {
                $desc = $instance[ 'desc' ];
            }else {
                $desc = '';
            }

            // Ratting Text
            if ( isset( $instance[ 'rating_txt' ] ) ) {
                $rating_txt = $instance[ 'rating_txt' ];
            }else {
                $rating_txt = '';
            }

            // Ratting
            if ( isset( $instance[ 'rating' ] ) ) {
                $rating = $instance[ 'rating' ];
            }else {
                $rating = '';
            }



            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php _e( 'Description:' ,'haarmax'); ?></label>
                <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" cols="30" rows="10"><?php echo wp_kses_post( $desc ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'rating_txt' ); ?>"><?php _e( 'Rating Text:' ,'haarmax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'rating_txt' ); ?>" name="<?php echo $this->get_field_name( 'rating_txt' ); ?>" type="text" value="<?php echo esc_attr( $rating_txt ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'rating' ); ?> "><?php _e('Select Rating:', 'haarmax'); ?></label>
                <select id="<?php echo $this->get_field_id( 'rating' ); ?>" name="<?php echo $this->get_field_id( 'rating' ); ?>">
                     <option value="1" selected="selected"><?php _e('1 star', 'haarmax'); ?></option>
                     <option value="2" selected="selected"><?php _e('2 star', 'haarmax'); ?></option>
                     <option value="3" selected="selected"><?php _e('3 star', 'haarmax'); ?></option>
                     <option value="4" selected="selected"><?php _e('4 star', 'haarmax'); ?></option>
                     <option value="5" selected="selected"><?php _e('5 star', 'haarmax'); ?></option>
                </select>
            </p>



            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['desc']         = ( ! empty( $new_instance['desc'] ) ) ? wp_kses_post( $new_instance['desc'] ) : '';
            $instance['rating_txt']   = ( ! empty( $new_instance['rating_txt'] ) ) ? wp_kses_post( $new_instance['rating_txt'] ) : '';
            $instance['rating']       = ( ! empty( $new_instance['rating'] ) ) ? wp_kses_post( $new_instance['rating'] ) : '';

            return $instance;
        }
    } // Class haarmax_about_us_widget ends here


    // Register and load the widget
    function haarmax_about_us_load_widget() {
        register_widget( 'haarmax_about_us_widget' );
    }
    add_action( 'widgets_init', 'haarmax_about_us_load_widget' );