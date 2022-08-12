<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SliderImage extends AbstractDb
{
    /**
     * Define the table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('vegam_slider_images', 'image_id');
    }
}
