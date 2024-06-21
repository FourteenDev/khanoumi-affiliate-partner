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
import { PanelBody, SelectControl, __experimentalNumberControl as NumberControl } from '@wordpress/components';

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
	const { category, tag, brand, limit } = attributes;

	const firstSelectOption = [{ label: __('All', 'khanoumi-affiliate-partner'), value: 0 }];
	const categoryOptions   = firstSelectOption.concat(allCategories.map(function (cat) { return { label: cat.name, value: cat.id } }));
	const tagOptions        = firstSelectOption.concat(allTags.map(function (tag) { return { label: tag.name, value: tag.id } }));
	const brandOptions      = firstSelectOption.concat(allBrands.map(function (brand) { return { label: brand.name_per, value: brand.id } }));

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'khanoumi-affiliate-partner')}>
					<SelectControl
						label={__('Category', 'khanoumi-affiliate-partner')}
						value={category}
						options={categoryOptions}
						onChange={value => setAttributes({ category: parseInt(value) })}
					/>
					<SelectControl
						label={__('Tag', 'khanoumi-affiliate-partner')}
						value={tag}
						options={tagOptions}
						onChange={value => setAttributes({ tag: parseInt(value) })}
					/>
					<SelectControl
						label={__('Brand', 'khanoumi-affiliate-partner')}
						value={brand}
						options={brandOptions}
						onChange={value => setAttributes({ brand: parseInt(value) })}
					/>
					<NumberControl
						label={__('Limit', 'khanoumi-affiliate-partner')}
						value={limit}
						min={1}
						max={50}
						onChange={value => setAttributes({ limit: parseInt(value) })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...useBlockProps()}>
				{__('A Khanoumi slider with these values will be shown here:', 'khanoumi-affiliate-partner')} <br />
				{__('Category:', 'khanoumi-affiliate-partner')} {categoryOptions.find(option => option.value == category).label} <br />
				{__('Tag:', 'khanoumi-affiliate-partner')} {tagOptions.find(option => option.value == tag).label} <br />
				{__('Brand:', 'khanoumi-affiliate-partner')} {brandOptions.find(option => option.value == brand).label} <br />
				{__('Limit:', 'khanoumi-affiliate-partner')} {limit}
			</div>
		</>
	);
}
