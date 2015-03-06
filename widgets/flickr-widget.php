<?php 

class lovecraft_flickr_widget extends WP_Widget {

	function lovecraft_flickr_widget() {
		parent::WP_Widget(false, $name = 'Flickr widget', array('description' => __('Displays your latest Flickr photos.', 'lovecraft') ));	
	}
	
	function widget($args, $instance) {
	
		// Outputs the content of the widget
		extract($args); // Make before_widget, etc available.
		
		$widget_title = apply_filters('widget_title', esc_attr($instance['widget_title']));
		$fli_id = esc_attr($instance['id']);
		$fli_number = esc_attr($instance['number']);
		$unique_id = esc_attr($args['widget_id']);
		
		echo $before_widget;
		
		
		if (!empty($widget_title)) {
		
			echo $before_title . $widget_title . $after_title;
			
		} ?>
		
			<div class="flickr-container">
				
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fli_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $fli_id; ?>"></script>
			
			</div>
							
		<?php echo $after_widget; 
	}
	
	
	function update($new_instance, $old_instance) {
	
		//update and save the widget
		return $new_instance;
		
	}
	
	function form($instance) {
		
		// Set defaults
		if(!isset($instance["widget_title"])) { $instance["widget_title"] = ''; }
		if(!isset($instance["id"])) { $instance["id"] = ''; }
		if(!isset($instance["number"])) { $instance["number"] = ''; }
	
		// Get the options into variables, escaping html characters on the way
		$widget_title = esc_attr($instance['widget_title']);
		$fli_id = esc_attr($instance['id']);
		$fli_number = esc_attr($instance['number']);
		?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('widget_title')); ?>"><?php  _e('Title', 'lovecraft'); ?>:
			<input id="<?php echo esc_attr($this->get_field_id('widget_title')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($widget_title); ?>" /></label>
		</p>
				
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php _e('Flickr ID (use <a target="_blank" href="http://www.idgettr.com">idGettr</a>)', 'lovecraft'); ?>:
			<input id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" class="widefat" value="<?php echo esc_attr($fli_id); ?>" /></label>
		</p>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of images to display', 'lovecraft'); ?>:
			<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" class="widefat" value="<?php echo esc_attr($fli_number); ?>" /></label>
		</p>
		
		<?php
	}
}
register_widget('lovecraft_flickr_widget'); ?>