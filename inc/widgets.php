<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Personnel_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'personnel_widget', // Base ID
            'Personnel Widget', // Name
            array( 'description' => __( 'Display two random team members', 'text_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
    
        $arguments = array(
            'posts_per_page' => 2,
            'post_type' => 'team_members',
            'orderby' => 'rand'
        );

        $teamMembers = new WP_Query($arguments);

        while($teamMembers -> have_posts()) {
            $teamMembers -> the_post();

            ?>
                <div class="personnel-widget">
                    <p><?php the_title(); ?></p>
                    <a class="fas fa-chevron-right" href="<?php the_permalink(); ?>"></a>
                </div>
            <!--personnel-item end-->
            <?php
        }

        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Personnel_Widget
 
?>

<?php
// Register Personnel_Widget widget

function mademoiselle_custom_widgets() { 
    register_widget( 'Personnel_Widget' ); 
}

add_action( 'widgets_init', 'mademoiselle_custom_widgets' );
?>