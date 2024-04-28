<div class="album py-5 bg-light">
	<div class="container">
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
			<?php foreach ($products['items'] as $product) : ?>
				<?php if (is_array($product) && !empty($product['imageUrl'])) : ?>
					<div class="col">
						<div class="card shadow-sm">
							<img class="bd-placeholder-img" width="100%" height="225" src="<?php echo $product['imageUrl']; ?>" />
							<div class="card-body">
								<?php echo $product['name']; ?>
								<div class="d-flex justify-content-between align-items-center">
									<button type="button" class="btn btn-outline-secondary">مشاهده‌ی جزییات »</button>
									<?php if (isset($product['basePrice']) && intval($product['basePrice'])) : ?>
										<?php if (isset($product['effectivePrice']) && intval($product['effectivePrice'])) : ?>
											<p class="text-muted"><strike><?php echo number_format($product['basePrice']); ?></strike>
												<?php echo number_format($product['effectivePrice']); ?>
											<p>
										<?php else : ?>
											<p><?php echo number_format($product['basePrice']); ?><p>
										<?php endif; ?>
									<?php else : ?>
										<p><?php echo number_format($product['basePrice']); ?><p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>