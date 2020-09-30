<?php

class Jind_Recent_Posts_Widgets extends WP_Widget{
	public function __construct(){
		$options = array(
			"classname" => "Jind_Recent_Posts_Widgets",
			"description" => "Display recent posts"
		);
		parent::__construct('Jind_Recent_Posts_Widgets', 'Jind Recent posts Widgets', $options);
	}

	public function widget($args, $instance){
		extract($args);
		if( isset($instance['post_number']) ){
			$post_type = isset( $instance['post_type'] ) ? $instance['post_type'] : 'post';
			$number = (int) $instance['post_number'];
			$title = $instance['title'];
			echo $before_widget.$before_title.$title.$after_title;
			global $post;
			$post_arg = array(
				'posts_per_page' => $number,
				'post_type' => $post_type,
				'orderby' => 'date',
                'order' => 'DESC',
			);
			$list = new WP_Query($post_arg);
			if($list->found_posts > 0):
				?>
				<ul class="list-unstyled">
				<?php
				while($list->have_posts()):
					$list->the_post();
					?>
					<li>
						<a href="<?php echo get_permalink(); ?>">
							<i class="fa fa-chevron-right"></i> <?php echo get_the_title(); ?>
						</a>
					</li>
					<?php
				endwhile;
				?>
				</ul>
				<?php
				echo $after_widget;
			endif;
		}
		?>
		<?php
	}

	public function form($instance){
		$title = isset($instance['title']) ? $instance['title'] : '';
		$post_number = isset($instance['post_number']) ? $instance['post_number'] : 3;
		$post_type = isset( $instance['post_type'] ) ? $instance['post_type'] : 'post';
		$arg = array( 'public' => true, );
		$post_types = get_post_types( $arg, 'object' );
		?>
		<p>
			<label for="title">Title</label><br>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="post_type">Post type</label><br>
			<select class="widefat" name="<?php echo $this->get_field_name('post_type'); ?>" id="">
				<?php foreach ($post_types as $obj) :
						$label = get_post_type_labels( $obj );
						$value = esc_attr($obj->name);
						?>
						<option value="<?php echo $value; ?>" <?php echo $value == $post_type ? 'selected="selected"' : ''; ?>> <?php echo esc_html($label->name); ?> </option>
				<?php endforeach;?>
			</select>
		</p>
		<p>
			<label for="post_number">Post Number</label><br>
			<select class="widefat " id="<?php echo $this->get_field_id('post_number');?>" name="<?php echo $this->get_field_name('post_number'); ?>">
				<?php for($x = 3; $x < 8; $x++): ?>
					<option <?php echo $x == $post_number ? 'selected="selected"' : ''; ?> value="<?php echo $x; ?>"> <?php echo $x; ?> </option>
				<?php endfor; ?>
			</select>
		</p>
		<?php
	}
}