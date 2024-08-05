<?php

namespace KhanoumiAffiliatePartner\Widgets;

use KhanoumiAffiliatePartner\Helpers\FiltersHelper;
use KhanoumiAffiliatePartner\Helpers\ProductsHelper;

class ProductsCarouselWidget extends \WP_Widget
{
	public function __construct()
	{
		/**
		 * The parent constructor.
		 *
		 * @param	string	$id_base			Base ID for the widget, lowercase and unique. If left empty, a portion of the widget's PHP class name will be used. Has to be unique.
		 * @param	string	$name				Name for the widget displayed on the configuration page.
		 * @param	array	$widget_options		Optional. Widget options. See `wp_register_sidebar_widget()` for information on accepted arguments.
		 * @param	array	$control_options	Optional. Widget control options. See `wp_register_widget_control()` for information on accepted arguments.
		 */
		parent::__construct(
			'kapp-products-carousel',
			__('Khanoumi Products Carousel', KAPP_TEXT_DOMAIN),
			['description' => __('Display Khanoumi.com products in a carousel.', KAPP_TEXT_DOMAIN)]
		);

		add_action('widgets_init', function ()
		{
			register_widget('\KhanoumiAffiliatePartner\Widgets\ProductsCarouselWidget');
		});
	}

	/**
	 * Echoes the widget content.
	 *
	 * @param	array	$args		Display arguments including `before_title`, `after_title`, `before_widget`, and `after_widget`.
	 * @param	array	$instance	The settings for the particular instance of the widget.
	 *
	 * @return	void
	 */
	public function widget($args, $instance)
	{
		$title    = !empty($instance['title']) ? $instance['title'] : '';
		$category = !empty($instance['category']) ? intval($instance['category']) : 0;
		$tag      = !empty($instance['tag']) ? intval($instance['tag']) : 0;
		$brand    = !empty($instance['brand']) ? intval($instance['brand']) : 0;
		$limit    = !empty($instance['limit']) ? intval($instance['limit']) : 10;
		// $page     = !empty($instance['page']) ? intval($instance['page']) : 1;
		$speed    = !empty($instance['speed']) ? intval($instance['speed']) : 3000;

		echo $args['before_widget'];
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
			echo '<div class="khanoumi-carousel-widget">';
				echo ProductsHelper::getProducts([
					'category' => $category,
					'tag'      => $tag,
					'brand'    => $brand,
					'limit'    => $limit,
					'speed'    => $speed,
				]);
			echo '</div>';
		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings update form.
	 *
	 * @param	array	$instance	Current settings.
	 *
	 * @return	void
	 */
	public function form($instance)
	{
		$title    = !empty($instance['title']) ? $instance['title'] : '';
		$category = !empty($instance['category']) ? intval($instance['category']) : 0;
		$tag      = !empty($instance['tag']) ? intval($instance['tag']) : 0;
		$brand    = !empty($instance['brand']) ? intval($instance['brand']) : 0;
		$limit    = !empty($instance['limit']) ? intval($instance['limit']) : 10;
		// $page     = !empty($instance['page']) ? intval($instance['page']) : 1;
		$speed    = !empty($instance['speed']) ? intval($instance['speed']) : 3000;
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php _e('Title: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('category')); ?>">
				<?php _e('Category: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<select id="<?php echo esc_attr($this->get_field_id('category')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
				<option value="0" <?php selected($category, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
				<?php foreach (FiltersHelper::getAllCategories() as $c) : ?>
					<option value="<?php echo $c['id']; ?>" <?php selected($category, $c['id']); ?>><?php echo $c['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('tag')); ?>">
				<?php _e('Tag: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<select id="<?php echo esc_attr($this->get_field_id('tag')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('tag')); ?>">
				<option value="0" <?php selected($tag, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
				<?php foreach (FiltersHelper::getAllTags() as $t) : ?>
					<option value="<?php echo $t['id']; ?>" <?php selected($tag, $t['id']); ?>><?php echo $t['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('brand')); ?>">
				<?php _e('Brand: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<select id="<?php echo esc_attr($this->get_field_id('brand')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('brand')); ?>">
				<option value="0" <?php selected($brand, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
				<?php foreach (FiltersHelper::getAllBrands() as $b) : ?>
					<option value="<?php echo $b['id']; ?>" <?php selected($brand, $b['id']); ?>><?php echo $b['name_per']; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">
				<?php _e('Limit: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<input type="number" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" value="<?php echo esc_attr($limit); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('speed')); ?>">
				<?php _e('Slider speed (milliseconds): ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<input type="number" id="<?php echo esc_attr($this->get_field_id('speed')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('speed')); ?>" value="<?php echo esc_attr($speed); ?>" min="500" />
		</p>
		<?php
	}

	/**
	 * Updates the widget.
	 *
	 * @param	array		$newInstance	New settings for this instance as input by the user via `WP_Widget::form()`.
	 * @param	array		$oldInstance	Old settings for this instance.
	 *
	 * @return	array						Saved settings or bool `false` if nothing was saved.
	 */
	public function update($newInstance, $oldInstance)
	{
		$instance             = [];

		$instance['title']    = !empty($newInstance['title']) ? strip_tags($newInstance['title']) : '';
		$instance['category'] = !empty($newInstance['category']) ? intval($newInstance['category']) : 0;
		$instance['tag']      = !empty($newInstance['tag']) ? intval($newInstance['tag']) : 0;
		$instance['brand']    = !empty($newInstance['brand']) ? intval($newInstance['brand']) : 0;
		$instance['limit']    = !empty($newInstance['limit']) ? intval($newInstance['limit']) : 10;
		// $instance['page']     = !empty($newInstance['page']) ? intval($newInstance['page']) : 1;
		$instance['speed']    = !empty($newInstance['speed']) ? intval($newInstance['speed']) : 3000;

		return $instance;
	}
}
