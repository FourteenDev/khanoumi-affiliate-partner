<div class="khanoumi-carousel" class="khanoumi-carousel slide" data-bs-ride="carousel" data-speed="<?php echo !empty($speed) ? intval($speed) : 3000; ?>">
	<button type="button" class="khanoumi-carousel__control-next" data-bs-slide="next">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="9 18 15 12 9 6"></polyline>
		</svg>
	</button>
	<div class="khanoumi-carousel__content">
		<div class="khanoumi-carousel__item khanoumi-carousel-intro">
			<div class="khanoumi-carousel-intro--title"><?php esc_html_e('Buy from Khanoumi', KAPP_TEXT_DOMAIN); ?></div>
			<img class="khanoumi-carousel-intro--image" src="<?php echo esc_url(KAPP()->url('assets/public/images/pink-box.png')); ?>" alt="<?php esc_html_e('Buy from Khanoumi', KAPP_TEXT_DOMAIN); ?>">
		</div>
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
								<?php if (!empty($product['basePrice']) && intval($product['basePrice'])) : ?>
									<?php if (!empty($product['effectivePrice']) && intval($product['effectivePrice'])) : ?>
										<span><?php echo number_format($product['basePrice']); ?></span>
										<?php echo number_format($product['effectivePrice']); ?>
									<?php else : ?>
										<?php echo number_format($product['basePrice']); ?>
									<?php endif; ?>
								<?php else : ?>
									0
								<?php endif; ?>
								<svg class="toman-currency-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M3.52231 9.85151C3.70646 11.2265 3.81695 13.9888 3.7924 15.5724C3.76785 16.751 3.91517 17.107 4.86047 17.107H4.92186L5.02007 18.0278L4.92186 18.9363H4.86047C3.00669 18.9363 2.31919 17.8559 2.31919 15.8057C2.30692 13.9642 2.2087 11.6194 2 10.183L3.52231 9.85151Z"></path>
									<path d="M4.80273 18.9363L4.83956 17.107H5.06054C5.64983 17.107 6.20228 16.7633 6.63196 15.953C7.35629 14.6026 8.04378 13.7187 8.97681 13.6696C11.3462 13.5468 12.0705 17.7086 10.2168 18.8258C9.51699 19.2555 8.36298 18.8381 7.04937 18.0155C6.53375 18.6416 5.83398 18.9363 5.03599 18.9363H4.80273ZM7.83508 16.5669C8.78039 17.1439 9.54154 17.4508 9.76252 17.2912C10.3027 16.9474 9.95895 15.3146 9.0382 15.3146C8.719 15.3146 8.32615 15.6216 7.83508 16.5669Z"></path>
									<path d="M12.1629 20.9374C14.3727 20.4586 15.6004 19.8693 16.0055 18.9485C14.4709 18.924 13.145 18.7521 12.654 17.7086C11.9419 16.1863 13.0837 13.5713 14.7656 13.5713C16.0915 13.5713 17.0859 15.2164 17.3314 17.107H17.847L17.9452 18.0278L17.847 18.9363H17.2946C16.8894 20.7655 15.2321 22.0423 12.7276 22.5211L12.1629 20.9374ZM13.7834 16.6774C14.029 17.0088 14.9374 17.0948 16.0301 17.107C15.8214 16.1372 15.3426 15.3269 14.741 15.2164C14.0167 15.0691 13.4765 16.2477 13.7834 16.6774Z"></path>
									<path d="M17.6909 18.9363V17.107H18.2802C19.9621 17.107 20.5022 16.8124 20.5022 16.2599C20.49 15.8425 19.9375 14.4184 19.827 14.1975L21.1284 13.4854C21.3616 13.9888 21.865 15.376 21.865 16.3459C21.8527 18.0032 20.7601 18.9363 18.5502 18.9363H17.6909ZM17.8136 11.9877C18.1451 11.6439 18.5011 11.3002 18.8326 10.9564C19.1764 11.3002 19.5201 11.6439 19.8516 11.9877C19.5201 12.3314 19.1764 12.6629 18.8326 13.0066C18.5011 12.6629 18.1451 12.3314 17.8136 11.9877ZM19.9621 11.9877C20.2935 11.6439 20.6496 11.3002 20.981 10.9564C21.3248 11.3002 21.6685 11.6439 22 11.9877C21.6685 12.3314 21.3248 12.6629 20.981 13.0066C20.6496 12.6629 20.2935 12.3314 19.9621 11.9877Z"></path>
									<path d="M5.90307 3.41851C5.57159 4.16739 5.26468 4.92855 5.24012 5.73881C5.19102 7.18746 6.11177 7.8504 7.72002 7.8504C9.51242 7.8504 10.5437 6.80688 10.5437 5.73881C10.5437 5.05131 9.9421 3.3203 9.75795 2.7924L11.0716 2.1049C11.5749 3.45534 11.845 4.69529 11.845 5.73881C11.845 7.86268 10.2122 9.66735 7.72002 9.66735C5.30151 9.66735 3.70553 8.14504 3.87741 5.73881C3.93879 4.69529 4.40531 3.54128 4.7245 2.87834L5.90307 3.41851ZM6.82382 2.12946C7.21667 1.74888 7.58497 1.38058 7.96555 1L9.09501 2.12946C8.71443 2.51003 8.34613 2.89061 7.96555 3.25891C7.58497 2.89061 7.21667 2.51003 6.82382 2.12946Z"></path>
								</svg>
							</p>
							<a class="khanoumi-carousel__item-view-more" href="<?php echo $product['deemaLink']; ?>" target="_blank" rel="sponsored nofollow">
								<button class="khanoumi-carousel__item-button"><?php esc_html_e('View and buy »', KAPP_TEXT_DOMAIN); ?></button>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
	</div>
	<button type="button" class="khanoumi-carousel__control-prev" data-bs-slide="prev">
		<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<polyline points="15 18 9 12 15 6"></polyline>
		</svg>
	</button>
</div>