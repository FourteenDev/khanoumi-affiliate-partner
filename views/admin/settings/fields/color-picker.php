<input type="text" id="<?php echo esc_attr($id); ?>" class="kapp-color-picker" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" data-default-color="<?php echo !empty($default) ? esc_attr($default) : ''; ?>" />
<?php if (!empty($description)) : ?>
	<p><?php echo $description; ?></p>
<?php endif; ?>
