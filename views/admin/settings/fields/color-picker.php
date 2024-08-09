<input type="text" id="<?php echo $id; ?>" class="kapp-color-picker" name="<?php echo $name; ?>" value="<?php echo esc_attr($value); ?>" data-default-color="<?php echo !empty($default) ? esc_attr($default) : ''; ?>" />
<?php if (!empty($description)) : ?>
	<p><?php echo $description; ?></p>
<?php endif; ?>
