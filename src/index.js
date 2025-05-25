import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { Fragment } from '@wordpress/element';

registerBlockType('a1tr/myblock', {
    attributes: {
        selectedCategory: {
            type: 'string',
            default: 'all'
        }
    },
    edit({ attributes, setAttributes }) {
        const { selectedCategory } = attributes;

        const categories = useSelect((select) => {
            return select('core').getEntityRecords('taxonomy', 'category', { per_page: -1 });
        }, []);

        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody title="Настройки блока">
                        <SelectControl
                            label="Категория"
                            value={selectedCategory}
                            options={[
                                { label: 'Все', value: 'all' },
                                ...(categories || []).map(cat => ({
                                    label: cat.name,
                                    value: cat.slug
                                }))
                            ]}
                            onChange={(value) => setAttributes({ selectedCategory: value })}
                        />
                    </PanelBody>
                </InspectorControls>
                <div {...useBlockProps()}>
                    <p>Блок: {selectedCategory === 'all' ? 'Все категории' : selectedCategory}</p>
                    <p>Вывод будет на фронте.</p>
                </div>
            </Fragment>
        );
    },
    save() {
        return null; // Серверный рендеринг
    }
});
