<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Block\Adminhtml\Edit\SliderImage;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Homeblock Slider Image Edit Cancel Button
 */
class CancelButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @inheritdoc
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Cancel'),
            'on_click' => '',
            'data_attribute' => [
                'mage-init' => [
                    'Magento_Ui/js/form/button-adapter' => [
                        'actions' => [
                            [
                                'targetName' => 'block_sliders_form.areas.items.items.slider.slider_image_update_modal',
                                'actionName' => 'closeModal'
                            ],
                        ],
                    ],
                ],
            ],
            'sort_order' => 20
        ];
    }
}
