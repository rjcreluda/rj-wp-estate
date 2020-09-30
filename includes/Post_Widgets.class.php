<?php

class Post_Widgets extends WP_Widget
{
	public function __construct(){
		$options = array(
			"classname" => "Post_Widgets",
			"description" => "Display post list with thumbnail"
		);
		parent::__construct('Post_Widgets', 'Jind Post Widgets', $options);
	}
	// Widget Output in front_end
	public function widget($args, $instance){
		extract($args);
		if(isset($instance['post_type']) && isset($instance['post_number'])){
			$post_type = $instance['post_type'];
			$post_number = (int) $instance['post_number'];
			$title = $instance['title'];
			echo $before_widget.$before_title.$title.$after_title;
			// Query
			$this->get_posts_list($post_type, $post_number);
			echo $after_widget;
		}

	}
	// Widget form in Admin
	public function form($instance){
		$title = isset($instance['title']) ? $instance['title'] : '';
		$post_type = isset($instance['post_type']) ? $instance['post_type'] : 'post';
		$post_number = isset($instance['post_number']) ? $instance['post_number'] : 4
			?>
			<p>
				<label for="title">Title</label><br>
				<input class="widefat" type="text" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $title; ?>">
			</p>
			<?php
			$arg = array( 'public' => true, );
			$post_types = get_post_types( $arg, 'object' );
			?>
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
				<label for="post_number">Post number</label><br>
				<select class="widefat " id="<?php echo $this->get_field_id('post_number');?>" name="<?php echo $this->get_field_name('post_number'); ?>">
					<?php for($x = 1; $x < 10; $x++): ?>
						<option <?php echo $x == $post_number ? 'selected="selected"' : ''; ?> value="<?php echo $x; ?>"> <?php echo $x; ?> </option>
					<?php endfor; ?>
				</select>
			</p>
			<?php
	}
	// process widgets options
	public function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if(isset($new_instance['post_type']) && !empty($new_instance['post_type'])){
			$instance['post_type'] = strip_tags($new_instance['post_type']);
			$instance['post_number'] = strip_tags($new_instance['post_number']);
		}
		return $instance;
	}

	function get_posts_list($type, $number){
		global $post;
		add_image_size( 'jind_widget_size', 100, 100, false );
		$list = new WP_Query();
		$list->query('post_type='.$type.'&amp;posts_per_page='.$number);
		$default_img = '<img src="'.THEME_DIR_URI.'/assets/images/placeholder.png" width="100" height="100">';
		if($list->found_posts > 0){
			$i = 0;
			while($list->have_posts()){
				if( $i == $number){
					break;
				}
				$list->the_post();
				$img = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail( $post->ID, 'jind_widget_size') : $default_img;
				?>
				<div class="d-flex mb-3 align-items-top">
		            <div class="avatar avatar-xl h-auto">
		              <?php echo $img; ?>
		            </div>
		            <div class="ml-3">
		              <a class="text-dark" href="<?php echo get_permalink(); ?>">
		              	<?php echo get_the_title(); ?>
		              </a>
		              <a class="d-flex font-sm text-dark" href="<?php echo get_permalink(); ?>">
		              	<?php echo get_the_date( 'D M j, Y' ); ?>
		              </a>
		            </div>
		        </div><!-- end item -->
				<?php
				$i++;
			}
			//echo '</ul>';
			wp_reset_postdata();
		}
		else{
			echo "No posts";
		}
	}
}


?>