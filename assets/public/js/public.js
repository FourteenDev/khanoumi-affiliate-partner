(function($)
{
	setProductsSlickCarousel($('#khanoumi-carousel'));
	function setProductsSlickCarousel($parentElement)
	{
		var $slickArgs = {
			autoplay: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: $parentElement.find('.khanoumi-carousel__control-prev'),
			nextArrow: $parentElement.find('.khanoumi-carousel__control-next'),
		};
		$parentElement.find('.khanoumi-carousel__content').slick($slickArgs);
	}
})(jQuery);
