<?php
/**
 * Plugin Name: England World Cup Countdown
 * Plugin URI: http://shop.englandstuff.com/widgets/england-countdown.php
 * Description: This widget shows a countdown to the next England World Cup game. It automatically switches to the next game after the previous game has started. Show your support for the England team with this widget!
 * Version: 0.1.0
 * Author: Mike Robinson
 * Author URI: http://shop.englandstuff.com
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'englandcountdown_load_widgets' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function englandcountdown_load_widgets() {
	register_widget( 'England_Countdown' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class England_Countdown extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function England_Countdown() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'englandcountdown', 'description' => __('Countdown to the England World Cup games!', 'englandcountdown') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 190, 'height' => 350, 'id_base' => 'englandcountdown' );
	
		/* Create the widget. */
		$this->WP_Widget( 'englandcountdown', __('England Countdown', 'englandcountdown'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;
	
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
?>
<script type="text/javascript" src="http://cdn.widgetserver.com/syndication/subscriber/InsertWidget.js"></script><script type="text/javascript">if (WIDGETBOX) WIDGETBOX.renderWidget('61fdd15a-7a65-46df-85b3-8d7609e9ec03');</script><noscript>Get the <a href="http://www.widgetbox.com/widget/england-world-cup-countdown">ENGLAND World Cup Games Countdown</a> widget and many other <a href="http://www.widgetbox.com/">great free widgets</a> at <a href="http://www.widgetbox.com">Widgetbox</a>! Not seeing a widget? (<a href="http://docs.widgetbox.com/using-widgets/installing-widgets/why-cant-i-see-my-widget/">More info</a>)</noscript>
<?php 	
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('England Countdown', 'englandcountdown') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<!-- Widget Title: Text Input -->
		<div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		</div>
	<?php
	}
}

?>