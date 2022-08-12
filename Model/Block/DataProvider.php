<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\Block;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Vegam\Homepage\Model\ResourceModel\Block\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Serialize\SerializerInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var CollectionFactory
     */
    private $blockFactory;
    /**
     * @var StoreManager
     */
    private $storeManager;
    /**
     * @var LoadedData
     */
    private $loadedData;
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * Constructor parameters
     *
     * @param string                $name
     * @param string                $primaryFieldName
     * @param string                $requestFieldName
     * @param CollectionFactory     $blockFactory
     * @param StoreManagerInterface $storeManager
     * @param SerializerInterface   $serializer
     * @param array                 $meta
     * @param array                 $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blockFactory,
        StoreManagerInterface $storeManager,
        SerializerInterface $serializer,
        array $meta = [],
        array $data = []
    ) {
        $this->blockFactory = $blockFactory;
        $this->collection = $this->blockFactory->create();
        $this->storeManager = $storeManager;
        $this->serializer = $serializer;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $basePath = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        foreach ($items as $data) {
            $blockType = $data->getType();
            if ($blockType == 'SliderBlock') {
                $requestData['general'] = $data->getData();
                $requestData['general']['store'] = ($data->getStore()) ? explode(',', $data->getStore()) : null;
                if ($data->getBannerSerialized()) {
                    $requestData['items']['banner']['banner_rows']['banner_rows'] =
                        $this->serializer->unserialize($data->getBannerSerialized());
                }
                $requestData['design_id'] = $data->getData('design_id');
            } else {
                $requestData = $data->getData();
                $customImage = $basePath . $requestData['custom_image'];
                unset($requestData['custom_image']);
                $requestData['custom_image'][0]['url'] = $customImage;
                $bannerSerialized = $this->serializer->unserialize($data->getBannerSerialized());
                if ($data->getBannerTemplate() == 'without_title') {
                    $requestData['banner_rows'] = $bannerSerialized;
                } else {
                    $requestData['banner_title'] = $bannerSerialized;
                }
                $requestData['store'] = ($data->getStore()) ? explode(',', $data->getStore()) : null;
                $requestData['category_id'] = ($data->getCategoryId()) ? explode(',', $data->getCategoryId()) : null;
            }
            $this->loadedData[$data->getId()] = $requestData;
        }
        return $this->loadedData;
    }
}
