<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Block\Adminhtml\Edit\SliderImage;

use Magento\Framework\UrlInterface;
use Magento\Framework\App\RequestInterface;

abstract class GenericButton
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @param UrlInterface $urlBuilder
     * @param RequestInterface $request
     */
    public function __construct(
        UrlInterface $urlBuilder,
        RequestInterface $request
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->request = $request;
    }

    /**
     * Generate url by route and parameters
     *
     * @param  string $route
     * @param  array  $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    /**
     * Get ImageId
     *
     * @return int|null
     */
    public function getImageId()
    {
        return $this->request->getParam('image_id');
    }
}
