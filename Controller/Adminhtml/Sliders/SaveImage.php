<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Controller\Adminhtml\Sliders;

use Magento\Backend\App\Action\Context;
use Vegam\Homepage\Model\SliderImageFactory;
use Magento\Framework\App\RequestInterface;
use Vegam\Homepage\Api\Data\SliderImageInterfaceFactory;
use Vegam\Homepage\Api\SliderImageRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Vegam\Homepage\Model\ResourceModel\SliderImage\CollectionFactory as SliderImageItemFactory;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Stdlib\DateTime;
use Vegam\Homepage\Model\ImageUploader;

class SaveImage extends \Magento\Backend\App\Action
{
    /**
     * @var SliderImageRepositoryInterface
     */
    private $sliderImageRepository;
    /**
     * @var SliderImageInterfaceFactory
     */
    private $sliderImageInterfaceFactory;
    /**
     * @var SliderImageData
     */
    private $sliderImageFactory;
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var SliderImageFactory
     */
    private $sliderImageItem;
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;
    /**
     * @var DataObjectHelper
     */
    private $serializer;
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;
    /**
     * @var DateTime
     */
    private $dateTime;
    
    /**
     * Constructor Parameters
     *
     * @param Context                              $context
     * @param RequestInterface                     $request
     * @param SliderImageFactory                   $sliderImageItem
     * @param SliderImageInterfaceFactory          $sliderImageInterfaceFactory
     * @param DataObjectHelper                     $dataObjectHelper
     * @param SliderImageRepositoryInterface       $sliderImageRepository
     * @param SerializerInterface                  $serializer
     * @param JsonFactory                          $resultJsonFactory
     * @param DateTime                             $dateTime
     * @param ImageUploader                        $imageUploader
     */
    public function __construct(
        Context $context,
        RequestInterface $request,
        SliderImageFactory $sliderImageItem,
        SliderImageInterfaceFactory $sliderImageInterfaceFactory,
        DataObjectHelper $dataObjectHelper,
        SliderImageRepositoryInterface $sliderImageRepository,
        SerializerInterface $serializer,
        JsonFactory $resultJsonFactory,
        DateTime $dateTime,
        ImageUploader $imageUploader
    ) {
        $this->request = $request;
        $this->sliderImageItem = $sliderImageItem;
        $this->sliderImageRepository = $sliderImageRepository;
        $this->sliderImageInterfaceFactory = $sliderImageInterfaceFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->serializer = $serializer;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->dateTime = $dateTime;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * Execute Function
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        $error = false;
        $imageId = $this->getRequest()->getParam('image_id', false);
        try {
            if (array_key_exists('slider_image', $data)) {
                $image =  isset($data['slider_image'][0]['name']) ? $data['slider_image'][0]['name']: null ;
                if ($image) {
                    $this->imageUploader->resize($image, 640, 350);
                    $this->imageUploader->resize($image, 1000, 730);
                }
                $expolode = explode('media/', $data['slider_image'][0]['url']);
                $data['slider_image'] = ($expolode[1]);
            }
            $sliderSaveData = $this->sliderImageInterfaceFactory->create();
            if (isset($data['link'])) {
                $data['link']['default'] ?: $data['link']['default'] = '#';
                $data['link'] = $this->serializer->serialize($data['link']);
            }
            if (isset($data['image_id']) && ($data['image_id'] != '')) {
                $sliderSaveData->setId($data['image_id']);
            }
            if (!$data['start_date']) {
                $data['start_date'] = $this->dateTime->formatDate(time());
            }
            $this->dataObjectHelper->populateWithArray(
                $sliderSaveData,
                $data,
                \Vegam\Homepage\Api\Data\SliderImageInterface::class
            );
            if ($imageId) {
                $message = __('Slider image has been updated.');
            } else {
                $message = __('New slider image has been added.');
            }
            $this->sliderImageRepository->save($sliderSaveData);
        } catch (\Magento\Framework\Exception\ LocalizedException $e) {
            $error = true;
            $message = __($e->getMessage());
        }
        $imageId = empty($imageId) ? null : $imageId;
        $resultJson = $this->resultJsonFactory->create();
        $resultJson->setData(
            [
                'messages' => $message,
                'error' => $error,
                'data' => [
                    'image_id' => $imageId
                ]
            ]
        );
        return $resultJson;
    }
}
