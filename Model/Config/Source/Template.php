<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Asset\Repository;

class Template implements OptionSourceInterface
{
    /**
     * @var Repository
     */
    private $assetRepo;
    /**
     * Template constructor.
     *
     * @param Repository $assetRepo
     */
    public function __construct(Repository $assetRepo)
    {
        $this->assetRepo = $assetRepo;
    }
    /**
     * Retrieve option array with empty value
     *
     * @return string[]
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => '',
                'label' => __('Select Template')
            ],
            [
                'value' => 'singleslider',
                'label' => __('Single Slider')
            ],
            [
                'value' => 'sliderbanner_right',
                'label' => __('SliderBanner Right')
            ],
            [
                'value' => 'sliderbanner_left',
                'label' => __('SliderBanner Left')
            ],
            [
                'value' => 'multibanner_right',
                'label' => __('MultiBanner Right')
            ],
            [
                'value' => 'multibanner_left',
                'label' => __('MultiBanner Left')
            ],
        ];
        return $options;
    }
}
