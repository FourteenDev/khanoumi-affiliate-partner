<?php

/**
 * @see	https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

use KhanoumiAffiliatePartner\Helpers\ProductsHelper;

$category = (!empty($attributes['category'])) ? intval($attributes['category']) : 0;

?>
<div id="khanoumi-carousel-block" <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo ProductsHelper::getProducts('', $category, $tag, $brand, $limit); ?>
</div>