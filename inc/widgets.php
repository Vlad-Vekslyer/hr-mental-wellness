<?php

class Link_Modal extends WP_Widget {

    public function __construct() {
        parent::__construct('link_modal', 'Link Modal');
        add_action( 'widgets_init', function() {
          register_widget( 'Link_Modal' );
        });
    }

    public $args = array(
        'before_widget' => '<div class="modal-link">',
        'after_widget'  => '</div>'
    );


    public function widget( $args, $instance ) {
        $header = esc_html($instance['header']);
        $body = esc_html($instance['body']);
        $link = esc_html($instance['link']);
        $img_link = esc_html($instance['img_link']);

        echo $args['before_widget'];
        echo "<img src=$img_link>";
        echo "<h4>$header</h4>";
        echo "<p>$body</p>";
        echo "<button class='btn'><a href=$link>Read More</a></button>";
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $header = ! empty( $instance['header'] ) ? $instance['header'] : '';
        $body = ! empty( $instance['body'] ) ? $instance['body'] : '';
        $link = ! empty( $instance['link'] ) ? $instance['link'] : '';
        $img_link = ! empty( $instance['img_link'] ) ? $instance['img_link'] : '';
        ?>
        <p>
          <label for="<?= $this->get_field_id( 'header' ); ?>">Header:</label>
          <input class="widefat" id="<?= $this->get_field_id( 'header' ); ?>" name="<?= $this->get_field_name( 'header' ); ?>" type="text" value="<?= esc_attr( $header ); ?>" />
        </p>
        <p>
          <label for="<?= $this->get_field_id( 'body' ); ?>">Body:</label>
          <input class="widefat" id="<?= $this->get_field_id( 'body' ); ?>" name="<?= $this->get_field_name( 'body' ); ?>" type="text" value="<?= esc_attr( $body ); ?>" />
        </p>
        <p>
          <label for="<?= $this->get_field_id( 'link' ); ?>">Link:</label>
          <input class="widefat" id="<?= $this->get_field_id( 'link' ); ?>" name="<?= $this->get_field_name( 'link' ); ?>" type="text" value="<?= esc_attr( $link ); ?>" />
        </p>
        <p>
          <label for="<?= $this->get_field_id( 'img_link' ); ?>">Background Image Link:</label>
          <input class="widefat" id="<?= $this->get_field_id( 'img_link' ); ?>" name="<?= $this->get_field_name( 'img_link' ); ?>" type="text" value="<?= esc_attr( $img_link ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['header'] = ( !empty( $new_instance['header'] ) ) ? strip_tags( $new_instance['header'] ) : '';
        $instance['body'] = ( !empty( $new_instance['body'] ) ) ? strip_tags( $new_instance['body'] ) : '';
        $instance['link'] = ( !empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
        $instance['img_link'] = ( !empty( $new_instance['img_link'] ) ) ? strip_tags( $new_instance['img_link'] ) : '';
        return $instance;
    }
}
new Link_Modal();
?>
