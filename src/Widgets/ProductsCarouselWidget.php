<?php

namespace KhanoumiAffiliatePartner\Widgets;

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
		echo $args['before_widget'];
			if (!empty($instance['title']))
				echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
			echo '<div id="khanoumi-carousel-widget">';
				echo ProductsHelper::getProducts();
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
		$title = !empty($instance['title']) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php echo __('Title: ', KAPP_TEXT_DOMAIN); ?>
			</label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}

	/**
	 * Updates the widget.
	 *
	 * @param	array		$new_instance	New settings for this instance as input by the user via `WP_Widget::form()`.
	 * @param	array		$old_instance	Old settings for this instance.
	 *
	 * @return	array|false					Saved settings or bool `false` if nothing was saved.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance          = [];
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
}
