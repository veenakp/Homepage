<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Controller\Adminhtml\Custom;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Vegam\Homepage\Model\ImageUploader;

class UploadImage extends Action
{
    /**
     * @var ImageUploaders
     */
    private $imageUploader;

    /**
     * Upload constructor.
     *
     * @param Context        $context
     * @param ImageUploaders $imageUploader
     */
    public function __construct(
        Context $context,
        ImageUploader $imageUploader
    ) {
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }
    /**
     * Execute Function
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        try {
            if (isset($data['param_name'])) {
                $result = $this->imageUploader->saveFileToTmpDir($data['param_name']);
                $result['cookie'] = [
                    'name' => $this->_getSession()->getName(),
                    'value' => $this->_getSession()->getSessionId(),
                    'lifetime' => $this->_getSession()->getCookieLifetime(),
                    'path' => $this->_getSession()->getCookiePath(),
                    'domain' => $this->_getSession()->getCookieDomain(),
                ];
            }
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
