<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model;

use Magento\Framework\Model\AbstractModel;

class SliderImage extends AbstractModel
{
    /**
     * SliderImage constructor
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Vegam\Homepage\Model\ResourceModel\SliderImage::class);
    }
}
