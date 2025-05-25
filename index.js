import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

registerBlockType('a1tr/myblock', {
    edit: (props) => {
        const { attributes, setAttributes } = props;

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Настройки блока">
                        <SelectControl
                            label="Категория"
                            value={attributes.category}
                            options={[
                                { label: 'Все', value: 'all' },
                                { label: 'Cat1', value: 'cat1' },
                                { label: 'Cat2', value: 'cat2' },
                            ]}
                            onChange={(val) => setAttributes({ category: val })}
                        />
                    </PanelBody>
                </InspectorControls>
                <div {...useBlockProps()}>
                    <p>Категория: {attributes.category}</p>
                </div>
            </>
        );
    },
    save: () => null // т.к. PHP render
});
