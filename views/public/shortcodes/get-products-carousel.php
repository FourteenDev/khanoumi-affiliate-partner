<div class="khanoumi-carousel" class="khanoumi-carousel slide" data-bs-ride="carousel">
	<button type="button" class="khanoumi-carousel__control-next" data-bs-slide="next">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="9 18 15 12 9 6"></polyline>
		</svg>
	</button>
	<div class="khanoumi-carousel__content">
		<?php for ($i = 0; $i < count($products); $i++) : $product = $products[$i]; ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<div class="khanoumi-carousel__item">
					<a href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
						<img alt="<?php echo $product['nameEn']; ?>" class="khanoumi-carousel__item-image" width="100%" height="100%" src="<?php echo $product['imageUrl']; ?>" />
					</a>
					<div class="khanoumi-carousel__item-container">
						<div class="khanoumi-carousel__item-caption">
							<a href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
								<h3><?php echo $product['nameFa']; ?></h3>
							</a>
							<p class="khanoumi-carousel__item-price">
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
							<a class="khanoumi-carousel__item-view-more" href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
								<button class="khanoumi-carousel__item-button">مشاهده و خرید »</button>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
	<button type="button" class="khanoumi-carousel__control-prev" data-bs-slide="prev">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="15 18 9 12 15 6"></polyline>
		</svg>
	</button>
</div>