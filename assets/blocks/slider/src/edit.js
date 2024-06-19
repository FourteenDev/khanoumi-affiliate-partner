/**
 * Retrieves the translation of text.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';

/**
 * Provides generic WordPress components to be used for creating common UI elements shared between screens and features of the WordPress dashboard.
 *
 * @see	https://wordpress.github.io/gutenberg/?path=/docs/components-introduction--docs
 */
import { PanelBody, SelectControl } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see	https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see	https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes })
{
	const { category, tag, brand } = attributes;

	const categoryOptions = allCategories.map(function(cat)
	{
		return { label: cat.name, value: cat.id }
	});
	const tagOptions = allTags.map(function(tag)
	{
		return { label: tag.name, value: tag.id }
	});
	const brandOptions = allBrands.map(function(brand)
	{
		return { label: brand.name_per, value: brand.id }
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'khanoumi-affiliate-partner')}>
					<SelectControl
						label={__('Category', 'khanoumi-affiliate-partner')}
						value={category}
						options={[{ label: __('All', 'khanoumi-affiliate-partner'), value: 0 }].concat(categoryOptions)}
						onChange={value => setAttributes({ category: parseInt(value) })}
					/>
					<SelectControl
						label={__('Tag', 'khanoumi-affiliate-partner')}
						value={tag}
						options={[{ label: __('All', 'khanoumi-affiliate-partner'), value: 0 }].concat(tagOptions)}
						onChange={value => setAttributes({ tag: parseInt(value) })}
					/>
					<SelectControl
						label={__('Brand', 'khanoumi-affiliate-partner')}
						value={brand}
						options={[{ label: __('All', 'khanoumi-affiliate-partner'), value: 0 }].concat(brandOptions)}
						onChange={value => setAttributes({ brand: parseInt(value) })}
					/>
				</PanelBody>
			</InspectorControls>

			<h6 {...useBlockProps()}>{__('Selected values:', 'khanoumi-affiliate-partner')}</h6>
			<p {...useBlockProps()}>{__('Category:', 'khanoumi-affiliate-partner')} {category}</p>
			<p {...useBlockProps()}>{__('Tag:', 'khanoumi-affiliate-partner')} {tag}</p>
			<p {...useBlockProps()}>{__('Brand:', 'khanoumi-affiliate-partner')} {brand}</p>
		</>
	);
}
