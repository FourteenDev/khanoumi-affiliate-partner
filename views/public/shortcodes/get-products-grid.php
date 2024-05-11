<div class="khanoumi-products-grid">
	<div class="khanoumi-products-grid__content">
		<?php foreach ($products as $product) : ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<div class="khanoumi-products-grid__item">
					<div class="khanoumi-products-grid__item-container">
						<a href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
							<img src="<?php echo $product['imageUrl']; ?>" width="100%" height="225" />
						</a>
						<div class="khanoumi-products-grid__item-body">
							<div class="khanoumi-products-grid__item-caption">
								<a href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
									<h3><?php echo $product['nameFa']; ?></h3>
								</a>
								<p class="khanoumi-products-grid__item-price">
									<?php if (isset($product['basePrice']) && intval($product['basePrice'])) : ?>
										<?php if (isset($product['effectivePrice']) && intval($product['effectivePrice'])) : ?>
											<span><?php echo number_format($product['basePrice']); ?></span>
											<?php echo number_format($product['effectivePrice']); ?>
										<?php else : ?>
											<?php echo number_format($product['basePrice']); ?>
										<?php endif; ?>
									<?php else : ?>
										<?php echo number_format($product['basePrice']); ?>
									<?php endif; ?>
									تومان
								</p>
								<a href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
									<button type="button" class="khanoumi-products-grid__item-button">مشاهده و خرید »</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>