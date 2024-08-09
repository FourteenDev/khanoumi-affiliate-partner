(function($)
{
	/****************************/
	/* Copy to Clipboard Button */
	/****************************/
	let copyText = document.querySelector(".shortcode-generator__shortcode-text");
	if (copyText !== null)
	{
		copyText.querySelector("button").addEventListener("click", function()
		{
			let input = copyText.querySelector(".shortcode-generator__shortcode-text input");
			input.select();
			document.execCommand("copy");
			copyText.classList.add("active");
			window.getSelection().removeAllRanges();
			setTimeout(function () {
				copyText.classList.remove("active");
			}, 2500);
		});
	}

	/*****************/
	/* Color pickers */
	/*****************/
	$('.kapp-color-picker').each(function() { $(this).wpColorPicker(); });
})(jQuery);
