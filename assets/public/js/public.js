(function($)
{
	setProductsSlickCarousel($('#productsCarousel'));
	function setProductsSlickCarousel($parentElement)
	{
		var $slickArgs = {
			autoplay: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: $parentElement.find('.carousel-control-prev'),
			nextArrow: $parentElement.find('.carousel-control-next'),
		};
		$parentElement.find('.carousel__content').slick($slickArgs);
	}
})(jQuery);
