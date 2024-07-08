<div class="wrap kapp-wrap">
	<div class="kapp-wrap__main shortcode-generator">
		<h1><?php esc_html_e('Shortcode Generator', KAPP_TEXT_DOMAIN); ?></h1>

		<?php if (!empty($error)) : ?>
			<div class="notice notice-error is-dismissible">
				<p>
					<?php echo esc_html($error); ?>
				</p>
			</div>
		<?php endif; ?>

		<p class="shortcode-generator__description">
			<?php esc_html_e('Use the options below to generate a proper "Khanoumi Products Shortcode" 👇', KAPP_TEXT_DOMAIN); ?>
		</p>

		<form method="post" id="shortcode-generator__form">
			<table class="form-table">
				<?php
				$category = !empty($_POST['shortcode-category']) ? intval($_POST['shortcode-category']) : 0;
				$tag      = !empty($_POST['shortcode-tag']) ? intval($_POST['shortcode-tag']) : 0;
				$brand    = !empty($_POST['shortcode-brand']) ? intval($_POST['shortcode-brand']) : 0;
				$limit    = !empty($_POST['shortcode-limit']) ? intval($_POST['shortcode-limit']) : 10;
				?>
				<tr>
					<th>
						<label for="shortcode-category">
							<?php _e('Category: ', KAPP_TEXT_DOMAIN); ?>
						</label>
					</th>
					<td>
						<select id="shortcode-category" name="shortcode-category">
							<option value="0" <?php selected($category, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
							<?php foreach (\KhanoumiAffiliatePartner\Helpers\FiltersHelper::getAllCategories() as $c) : ?>
								<option value="<?php echo $c['id']; ?>" <?php selected($category, $c['id']); ?>><?php echo $c['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="shortcode-tag">
							<?php _e('Tag: ', KAPP_TEXT_DOMAIN); ?>
						</label>
					</th>
					<td>
						<select id="shortcode-tag" name="shortcode-tag">
							<option value="0" <?php selected($tag, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
							<?php foreach (\KhanoumiAffiliatePartner\Helpers\FiltersHelper::getAllTags() as $t) : ?>
								<option value="<?php echo $t['id']; ?>" <?php selected($tag, $t['id']); ?>><?php echo $t['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="shortcode-brand">
							<?php _e('Brand: ', KAPP_TEXT_DOMAIN); ?>
						</label>
					</th>
					<td>
						<select id="shortcode-brand" name="shortcode-brand">
							<option value="0" <?php selected($brand, 0); ?>><?php _e('All', KAPP_TEXT_DOMAIN); ?></option>
							<?php foreach (\KhanoumiAffiliatePartner\Helpers\FiltersHelper::getAllBrands() as $b) : ?>
								<option value="<?php echo $b['id']; ?>" <?php selected($brand, $b['id']); ?>><?php echo $b['name_per']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="shortcode-limit">
							<?php _e('Limit: ', KAPP_TEXT_DOMAIN); ?>
						</label>
					</th>
					<td>
						<input type="number" id="shortcode-limit" name="shortcode-limit" value="<?php echo $limit; ?>" />
					</td>
				</tr>
			</table>

			<?php wp_nonce_field('kapp_shortcode_generator', 'kapp_shortcode_generator_nonce'); ?>
			<p class="submit">
				<input type="submit" id="submit" name="submit" class="button button-primary" value="<?php _e('Generate Shortcode', KAPP_TEXT_DOMAIN); ?>">
			</p>
		</form>

		<?php if (!empty($shortcode)) : ?>
			<div class="shortcode-generator__shortcode">
				<?php // @source https://CodePen.io/foxbeefly/pen/dyWbQgJ ?>
				<div class="shortcode-generator__shortcode-label">
					<?php echo sprintf(
						// translators: %s: Khanoumi.com website link.
						__('Use this shortcode to display <a href="%s" target="_blank">Khanoumi.com</a> products carousel anywhere on your website: ', KAPP_TEXT_DOMAIN),
						esc_url('https://khanoumi.com/')
					); ?>
				</div>
				<div class="shortcode-generator__shortcode-text">
					<input type="text" value="<?php echo esc_html($shortcode); ?>" />
					<button class="shortcode-generator__copy-button">
						<?php esc_html_e('Copy', KAPP_TEXT_DOMAIN); ?>
					</button>
				</div>
				<style>
					.shortcode-generator__copy-button:before {
						content: "<?php esc_html_e('Copied', KAPP_TEXT_DOMAIN); ?>";
					}
				</style>
			</div>
		<?php endif; ?>
	</div>
</div>