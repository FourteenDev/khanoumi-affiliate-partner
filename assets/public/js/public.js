(function($)
{
	$('.khanoumi-carousel').each(function() { setProductsSlickCarousel($(this)) });

	function setProductsSlickCarousel($parentElement)
	{
		var $slickArgs = {
			rtl: true,
			autoplay: true,
			infinite: false,
			dots: false,
			autoplaySpeed: $parentElement.data('speed') !== undefined ? $parentElement.data('speed') : 3000,
			slidesToShow: 4,
			slidesToScroll: 4,
			prevArrow: $parentElement.find('.khanoumi-carousel__control-prev'),
			nextArrow: $parentElement.find('.khanoumi-carousel__control-next'),
			cssEase: 'linear',
			lazyLoad: 'anticipated',
			responsive: [
				{
					breakpoint: 780,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: false,
						dots: false,
					}
				},
				{
					breakpoint: 380,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: false,
						dots: false,
					}
				}
			]
		};
		$parentElement.find('.khanoumi-carousel__content').slick($slickArgs);
	}
})(jQuery);
