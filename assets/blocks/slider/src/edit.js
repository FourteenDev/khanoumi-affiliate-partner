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
	const { category } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'khanoumi-affiliate-partner')}>
					<SelectControl
						label={__('Category', 'khanoumi-affiliate-partner')}
						value={category}
						options={[
							{ label: __('All', 'khanoumi-affiliate-partner'), value: 0 },
							{ label: __('آرایشی', 'khanoumi-affiliate-partner'), value: 8 },
						]}
						onChange={value => setAttributes({ category: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<h6 {...useBlockProps()}>{__('Selected values:', 'khanoumi-affiliate-partner')}</h6>
			<p {...useBlockProps()}>{__('Category:', 'khanoumi-affiliate-partner')} {category}</p>
		</>
	);
}
