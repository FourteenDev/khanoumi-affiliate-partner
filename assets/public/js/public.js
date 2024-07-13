(function($)
{
	$('.khanoumi-carousel').each(function() { setProductsSlickCarousel($(this)) });

	function setProductsSlickCarousel($parentElement)
	{
		var $slickArgs = {
			autoplay: true,
			infinite: true,
			autoplaySpeed: $parentElement.data('speed') !== undefined ? $parentElement.data('speed') : 3000,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: $parentElement.find('.khanoumi-carousel__control-prev'),
			nextArrow: $parentElement.find('.khanoumi-carousel__control-next'),
		};
		$parentElement.find('.khanoumi-carousel__content').slick($slickArgs);
	}
})(jQuery);
