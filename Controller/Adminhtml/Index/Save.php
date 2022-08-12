<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Vegam\Homepage\Model\BlockFactory;
use Magento\Framework\App\RequestInterface;
use Vegam\Homepage\Api\Data\BlockInterfaceFactory;
use Vegam\Homepage\Api\BlockRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Serialize\SerializerInterface;
use Vegam\Homepage\Model\ResourceModel\Block\CollectionFactory as BlockItemFactory;
use Vegam\Homepage\Model\ImageUploader;

class Save extends \Magento\Backend\App\Action
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
        $data = $this->request->getPostValue();
        try {
            $images = []; 
            $data['banner_serialized'] = null;
            if (isset($data['banner_rows'])) {
                $images = $data['banner_rows'];
                $data['banner_serialized'] = $this->serializer->serialize($data['banner_rows']);
            } else if (isset($data['banner_title'])){
                $images = $data['banner_title'];
                $data['banner_serialized'] = $this->serializer->serialize($data['banner_title']);
            }
            if (! empty($images)) {
                $sum = 0;
                foreach ($images as $img) {
                    $sum = $sum + $img['layout'];
                    $image = $img['image'][0]['name'];
                    $this->imageUploader->resize($image, 640, 350);
                    $this->imageUploader->resize($image, 1000, 730);
                }
                if ($sum != 6) {
                    $this->messageManager->addError(__('Select proper width for image, max min 6 only allowed'));
                    if (isset($data['design_id'])) {
                        return $resultRedirect->setPath('*/index/addnew', ['design_id' => $data['design_id']]);
                    } else {
                        return $resultRedirect->setPath('*/index/addnew');
                    }
                }
            }
            unset($data['banner_rows']);
            unset($data['banner_title']);
            if (array_key_exists('custom_image', $data)) {
                $image =  isset($data['custom_image'][0]['name']) ? $data['custom_image'][0]['name']: null ;
                if ($image) {
                    $this->imageUploader->resize($image, 640, 350);
                    $this->imageUploader->resize($image, 1000, 730);
                }
                $expolode = explode('media/', $data['custom_image'][0]['url']);
                $data['custom_image'] = ($expolode[1]);
            }
            $data['category_id'] = isset($data['category_id']) ? implode(',', $data['category_id']): null;
            $data['product_ids'] = $data['rh_products'] ?? null;
            if (in_array(0, $data['store'])) {
                $data['store'] = 0;
            } else {
                $data['store'] = implode(',', $data['store']);
            }
            $blockSaveData = $this->blockInterfaceFactory->create();
            if (isset($data['design_id'])) {
                    $blockSaveData = $this->blockRepository->getById($data['design_id']);
            }
            $item = $this->dataObjectHelper->populateWithArray(
                $blockSaveData,
                $data,
                \Vegam\Homepage\Api\Data\BlockInterface::class
            );
            $this->blockRepository->save($blockSaveData);
            if ($this->getRequest()->getParam('back')) {
                $url = '*/index/index';
                if ($data['type'] == 'ContentBlock') {
                    $url = '*/content/addnew';
                } elseif ($data['type'] == 'ProductBlock') {
                    $url = '*/product/addnew';
                } elseif ($data['type'] == 'CustomBlock') {
                    $url = '*/custom/addnew';
                } else {
                    $url = '*/index/addnew';
                }
                return $resultRedirect->setPath($url, ['design_id' =>
                    $blockSaveData->getId(), '_current' => true]);
            } else {
                return $resultRedirect->setPath('*/index/index');
            }
        } catch (\Magento\Framework\Exception\ LocalizedException $e) {
            $this->messageManager->addError(__($e->getMessage()));
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
