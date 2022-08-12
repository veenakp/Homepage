<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\Session\SessionManagerInterface;
use Vegam\Homepage\Model\ResourceModel\SliderImage\CollectionFactory;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Store\Model\StoreManagerInterface;

class SliderImageDataProvider extends AbstractDataProvider
{
   /**
    * @var LoadedData
    */
    private $loadedData;

    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var StoreManager
     */
    private $storeManager;
    /**
     * Dataprovider constructor
     *
     * @param string                  $name
     * @param string                  $primaryFieldName
     * @param string                  $requestFieldName
     * @param CollectionFactory       $collectionFactory
     * @param SessionManagerInterface $sessionManager
     * @param SerializerInterface     $serializer
     * @param StoreManagerInterface   $storeManager
     * @param array                   $meta
     * @param array                   $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        SessionManagerInterface $sessionManager,
        SerializerInterface $serializer,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->session = $sessionManager;
        $this->serializer = $serializer;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get the doctor details
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
            $requestData = $data->getData();
            $sliderImage = $basePath.$requestData['slider_image'];
            unset($requestData['slider_image']);
            $requestData['slider_image'][0]['url'] = $sliderImage;
            if ($data->getLink()) {
                $requestData['link'] = $this->serializer->unserialize($data->getLink());
            }
            if ($data->getSliderSerialized()) {
                $requestData['sliderbanner_rows'] = $this->serializer->unserialize($data->getSliderSerialized());
            }
            $this->loadedData[$data->getId()] = $requestData;
        }
        return $this->loadedData;
    }
}
