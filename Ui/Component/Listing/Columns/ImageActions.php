<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class ImageActions extends Column
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * Constructor
     *
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source
     *
     * @param  array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['image_id'])) {
                    $item[$name]['edit'] = [
                        'callback' => [
                            [
                                'provider' => 'block_sliders_form.areas.items.items.slider'
                                    . '.slider_image_update_modal.update_slider_image_form_loader',
                                'target' => 'destroyInserted',
                            ],
                            [
                                'provider' => 'block_sliders_form.areas.items.items.slider'
                                    . '.slider_image_update_modal',
                                'target' => 'openModal',
                            ],
                            [
                                'provider' => 'block_sliders_form.areas.items.items.slider'
                                    . '.slider_image_update_modal.update_slider_image_form_loader',
                                'target' => 'render',
                                'params' => [
                                    'image_id' => $item['image_id'],
                                ],
                            ]
                        ],
                        'href' => '#',
                        'label' => __('Edit'),
                        'hidden' => false,
                    ];

                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            'homeblock/sliders/imageDelete',
                            ['design_id' => $item['design_id'], 'image_id' => $item['image_id']]
                        ),
                        'label' => __('Delete'),
                        'isAjax' => true,
                        'confirm' => [
                            'title' => __('Delete image'),
                            'message' => __('Are you sure you want to delete the image?')
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
