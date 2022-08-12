<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Controller\Adminhtml\Sliders;

use Magento\Backend\App\Action\Context;
use Vegam\Homepage\Model\BlockFactory;
use Magento\Framework\App\RequestInterface;
use Vegam\Homepage\Api\Data\BlockInterfaceFactory;
use Vegam\Homepage\Api\BlockRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Serialize\SerializerInterface;
use Vegam\Homepage\Model\ResourceModel\Block\CollectionFactory as BlockItemFactory;
use Vegam\Homepage\Model\ImageUploader;

class SaveSlider extends \Magento\Backend\App\Action
{
    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * @var BlockInterfaceFactory
     */
    private $BlockInterfaceFactory;
    /**
     * @var BlockData
     */
    private $blockFactory;
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var BlockFactory
     */
    private $blockItem;
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;
    
    /**
     * @var SerializerInterface
     */
    private $serializer;
    
    /**
     * Constructor parameters
     *
     * @param Context                  $context
     * @param RequestInterface         $request
     * @param BlockFactory             $blockItem
     * @param BlockInterfaceFactory    $blockInterfaceFactory
     * @param DataObjectHelper         $dataObjectHelper
     * @param BlockRepositoryInterface $blockRepository
     * @param SerializerInterface      $serializer
     * @param ImageUploader            $imageUploader
     */
    public function __construct(
        Context $context,
        RequestInterface $request,
        BlockFactory $blockItem,
        BlockInterfaceFactory $blockInterfaceFactory,
        DataObjectHelper $dataObjectHelper,
        BlockRepositoryInterface $blockRepository,
        SerializerInterface $serializer,
        ImageUploader $imageUploader
    ) {
        $this->request = $request;
        $this->blockItem = $blockItem;
        $this->blockRepository = $blockRepository;
        $this->blockInterfaceFactory = $blockInterfaceFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->serializer = $serializer;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }
    /**
     * Execute Function
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $postData = $this->request->getPostValue();
        $data = $postData['general'];
        if (isset($postData['items']['banner']['banner_rows']['banner_rows'])) {
            $bannerSerialized = $this->serializer->serialize($postData['items']
                ['banner']['banner_rows']['banner_rows']);
            $data['banner_serialized'] = $bannerSerialized;
        }
        if (array_key_exists('items', $postData)) {
            $images = $postData['items']['banner']['banner_rows']['banner_rows'];
            foreach ($images as $img) {
                $image = $img['image'][0]['name'];
                $this->imageUploader->resize($image, 640, 350);
                $this->imageUploader->resize($image, 1000, 730);
            }
        }
        $data['type'] = 'SliderBlock';
        try {
            if (in_array(0, $data['store'])) {
                $data['store'] = 0;
            } else {
                $data['store'] = implode(',', $data['store']);
            }
            $blockSaveData = $this->blockInterfaceFactory->create();
            if (isset($data['design_id'])) {
                    $blockSaveData = $this->blockRepository->getById($data['design_id']);
            }
            $this->dataObjectHelper->populateWithArray(
                $blockSaveData,
                $data,
                \Vegam\Homepage\Api\Data\BlockInterface::class
            );
            $this->blockRepository->save($blockSaveData);
            $this->messageManager->addSuccess(__('You have saved block.'));
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/sliders/addnew', ['design_id' =>
                    $blockSaveData->getId(), '_current' => true]);
            } else {
                return $resultRedirect->setPath('*/index/index');
            }
            
        } catch (\Magento\Framework\Exception\ LocalizedException $e) {
            $this->messageManager->addError(__($e->getMessage()));
            return $resultRedirect->setPath('*/index/index');
        }
    }
}
