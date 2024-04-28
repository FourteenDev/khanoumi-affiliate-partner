<div id="productsCarousel" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel__title section-heading sh-t1 sh-s1">
		<span class="h-text">محصولات پیشنهادی</span>
	</div>
	<div class="carousel-indicators">
		<?php for ($i = 0; $i < count($products['items']); $i++) : $product = $products['items'][$i]; ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<button type="button" data-bs-target="#productsCarousel" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo ($i + 1); ?>" class="<?php if ($i == 0) echo 'active'; ?>" aria-current="<?php if ($i == 0) echo 'true'; ?>"></button>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#productsCarousel" data-bs-slide="prev">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
			<polyline points="15 18 9 12 15 6"></polyline>
		</svg>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#productsCarousel" data-bs-slide="next">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
			<polyline points="9 18 15 12 9 6"></polyline>
		</svg>
	</button>
	<div class="carousel__content">
		<?php for ($i = 0; $i < count($products['items']); $i++) : $product = $products['items'][$i]; ?>
			<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
				<div class="carousel__item item-category">
					<a href="https://khanoumi.com/products/<?php echo $product['slug']; ?>">
						<img alt="<?php echo $product['nameEn']; ?>" class="bd-placeholder-img" width="100%" height="100%" src="<?php echo $product['imageUrl']; ?>" />
					</a>
					<div class="container">
						<div class="carousel-caption text-end">
							<a href="https://khanoumi.com/products/<?php echo $product['slug']; ?>">
								<h3><?php echo $product['nameFa']; ?></h3>
							</a>
							<p class="price">
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
							<a class="view-more" href="https://khanoumi.com/products/<?php echo $product['slug']; ?>" rel="nofollow">
								<button class="button">مشاهده و خرید »</button>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
</div>