<div id="khanoumi-carousel" class="khanoumi-carousel slide" data-bs-ride="carousel">
	<div class="khanoumi-carousel__title section-heading sh-t1 sh-s1">
		<span>محصولات پیشنهادی</span>
	</div>
	<div class="khanoumi-carousel__indicators">
		<?php for ($i = 0; $i < count($products['items']); $i++) : $product = $products['items'][$i]; ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<button type="button" class="<?php if ($i == 0) echo 'active'; ?>" data-bs-target="#khanoumi-carousel" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo ($i + 1); ?>" aria-current="<?php if ($i == 0) echo 'true'; ?>"></button>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
	<button type="button" class="khanoumi-carousel__control-prev" data-bs-target="#khanoumi-carousel" data-bs-slide="prev">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="15 18 9 12 15 6"></polyline>
		</svg>
	</button>
	<button type="button" class="khanoumi-carousel__control-next" data-bs-target="#khanoumi-carousel" data-bs-slide="next">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="9 18 15 12 9 6"></polyline>
		</svg>
	</button>
	<div class="khanoumi-carousel__content">
		<?php for ($i = 0; $i < count($products['items']); $i++) : $product = $products['items'][$i]; ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<div class="khanoumi-carousel__item">
					<a href="https://khanoumi.com/products/<?php echo $product['slug']; ?>">
						<img alt="<?php echo $product['nameEn']; ?>" class="khanoumi-carousel__item-image" width="100%" height="100%" src="<?php echo $product['imageUrl']; ?>" />
					</a>
					<div class="khanoumi-carousel__item-container">
						<div class="khanoumi-carousel__item-caption">
							<a href="https://khanoumi.com/products/<?php echo $product['slug']; ?>">
								<h3><?php echo $product['nameFa']; ?></h3>
							</a>
							<p class="khanoumi-carousel__item-price">
								<?php if (isset($product['basePrice']) && intval($product['basePrice'])) : ?>
									<?php if (isset($product['effectivePrice']) && intval($product['effectivePrice'])) : ?>
										<strike><?php echo number_format($product['basePrice']); ?></strike>
										<?php echo number_format($product['effectivePrice']); ?>
									<?php else : ?>
										<?php echo number_format($product['basePrice']); ?>
									<?php endif; ?>
								<?php else : ?>
									<?php echo number_format($product['basePrice']); ?>
								<?php endif; ?>
								تومان
							</p>
							<a class="khanoumi-carousel__item-view-more" href="https://khanoumi.com/products/<?php echo $product['slug']; ?>" rel="nofollow">
								<button class="khanoumi-carousel__item-button">مشاهده و خرید »</button>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
</div>