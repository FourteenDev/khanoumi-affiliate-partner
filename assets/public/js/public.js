(function($)
{
	$(document).ready(function($)
	{
		let isRtl = false;

		if (typeof kappPublicScriptObject != 'undefined')
		{
			if (typeof kappPublicScriptObject.isRtl != 'undefined')
				isRtl = kappPublicScriptObject.isRtl == 1;
		}

		$('.khanoumi-carousel').each(function() { setProductsSlickCarousel($(this)) });

		// Elementor preview mode
		if (typeof elementorFrontend != 'undefined' && typeof elementorFrontend.hooks != 'undefined')
		{
			elementorFrontend.hooks.addAction('frontend/element_ready/kapp_products_carousel.default', function($scope)
			{
				$scope.find('.khanoumi-carousel').each(function() { setProductsSlickCarousel($(this)) });
			});
		}

		function setProductsSlickCarousel($parentElement)
		{
			var $slickArgs = {
				rtl: isRtl,
				autoplay: true,
				infinite: true,
				dots: false,
				autoplaySpeed: $parentElement.data('speed') !== undefined ? $parentElement.data('speed') : 3000,
				slidesToShow: 4,
				slidesToScroll: 4,
				prevArrow: isRtl ? $parentElement.find('.khanoumi-carousel__control-prev') : $parentElement.find('.khanoumi-carousel__control-next'),
				nextArrow: isRtl ? $parentElement.find('.khanoumi-carousel__control-next') : $parentElement.find('.khanoumi-carousel__control-prev'),
				cssEase: 'linear',
				lazyLoad: 'anticipated',
				responsive: [
					{
						breakpoint: 780,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
							dots: false,
						}
					},
					{
						breakpoint: 380,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							infinite: true,
							dots: false,
						}
					}
				]
			};
			$parentElement.find('.khanoumi-carousel__content').slick($slickArgs);
		}
	});
})(jQuery);
