<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\ResourceModel\SliderImage;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        $this->_init(
            \Vegam\Homepage\Model\SliderImage::class,
            \Vegam\Homepage\Model\ResourceModel\SliderImage::class
        );
        $this->_idFieldName = 'image_id';
    }
}
