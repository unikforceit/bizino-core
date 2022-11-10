<?php

/**
 * @version  1.0
 * @package  Bizino
 * @author   Vecurosoft <support@vecurosoft.com>
 *
 * Websites: http://www.vecurosoft.com
 *
 */

/**************************************
 * Creating Recent Post Widget
 ***************************************/
// Adds widget: Bizino :: Recent Posts
class bizino_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'bizino_recent_posts_widget',
            esc_html__( 'Bizino :: Recent Posts', 'bizino' ),
            array( 'description' => esc_html__( 'Add Recent Posts Widget', 'bizino' ), ) // Args
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Number Of Post',
            'id' => 'post_count',
            'default' => '4',
            'type' => 'number',
        ),
        array(
            'label' => 'Show Date',
            'id' => 'show_date',
            'default' => true,
            'type' => 'checkbox',
        ),
    );

    public function widget( $args, $instance ) {
        //echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        //Post Count
        if (isset($instance['post_count'])) {
            $post_count = $instance['post_count'];
        } else {
            $post_count = '4';
        }
        if (!empty($title)) {
            echo $args['before_title'];
            echo esc_html($title);
            echo $args['after_title'];
        }

        $query_args = array(
            "post_type" => "post",
            "posts_per_page" => esc_attr($post_count),
            "post_status" => "publish",
            "ignore_sticky_posts" => true
        );

        $recentposts = new WP_Query($query_args);

        if ($recentposts->have_posts()) {
            echo '<div class="recent-post-wrap">';
            echo '<!-- Widget Content -->';
            while ($recentposts->have_posts()) {
                $recentposts->the_post();
                echo '<div class="recent-post">';
                if (has_post_thumbnail()) {
                    echo '<div class="media-img">';
                    echo '<a href="' . get_the_permalink() . '">';
                    echo bizino_img_tag(array(
                        "url" => esc_url(get_the_post_thumbnail_url(null, 'bizino_90X80')),
                    ));
                    echo '</a>';
                    echo '</div>';

                }
                echo '<div class="media-body">';
                echo '<h4 class="post-title"><a class="text-inherit" href="' . esc_url(get_the_permalink()) . '">' . wp_trim_words(wp_kses_post(get_the_title()), '4', '') . '</a></h4>';
                if ($instance['show_date'] == '1') {
                    echo '<div class="recent-post-meta">';
                    echo '<a href="' . esc_url(get_the_permalink()) . '">' . esc_html(get_the_time('d M Y')) . '</a>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
            wp_reset_postdata();
            echo '<!-- End of Widget Content -->';
            echo '</div>';
        }

        //echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'bizino' );
            switch ( $widget_field['type'] ) {
                case 'checkbox':
                    $output .= '<p>';
                    $output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'bizino' ).'</label>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'bizino' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'bizino' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'bizino' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

function bizino_recent_posts_load_widget() {
    register_widget( 'bizino_recent_posts_widget' );
}
add_action( 'widgets_init', 'bizino_recent_posts_load_widget' );