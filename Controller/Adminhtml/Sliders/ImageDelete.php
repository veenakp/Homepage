<?php
/**
 * @package Vegam_Homepage
 */
namespace Vegam\Homepage\Controller\Adminhtml\Sliders;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Vegam\Homepage\Model\SliderImageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class ImageDelete extends \Magento\Backend\App\Action
{
   /**
    * @var \Magento\Framework\View\Result\PageFactory
    */
    private $resultPageFactory;
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    /**
     * Constructor parameter
     *
     * @param Context              $context
     * @param PageFactory          $resultPageFactory
     * @param SliderImageFactory   $sliderImageFactory
     * @param JsonFactory          $resultJsonFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        SliderImageFactory $sliderImageFactory,
        JsonFactory $resultJsonFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->sliderImageFactory = $sliderImageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
    /**
     * Execute
     */
    public function execute()
    {
        
        $error = false;
        $imageId = $this->getRequest()->getParam('image_id');
        
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($imageId) {
            try {
                
                $model = $this->sliderImageFactory->create();
                $model->load($imageId);
                $model->delete();
                $message = 'Deleted Successfully';
            } catch (Exception $e) {
                $error = true;
                $message = __($e->getMessage());
            }
            $imageId = empty($imageId) ? null : $imageId;
            $resultJson = $this->resultJsonFactory->create();
            $resultJson->setData(
                [
                  'message' => $message,
                  'error' => $error,
                ]
            );
            return $resultJson;
        }
    }
}
