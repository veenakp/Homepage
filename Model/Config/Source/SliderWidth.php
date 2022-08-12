<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class SliderWidth implements ArrayInterface
{
    /**
     * Option Array
     */
    public function toOptionArray()
    {
        $width = [
            0 => [
                'label' => 'Please select',
                'value' => 0
            ],
            1 => [
                'label' => '2 Column',
                'value' => 2
            ],
            2  => [
                'label' => '4 Column',
                'value' => 4
            ],
        ];
        return $width;
    }
}
