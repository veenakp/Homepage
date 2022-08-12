<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Ui\Component\Form;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\ComponentVisibilityInterface;

/**
 * Slider Items fieldset class
 */
class ItemFieldset extends \Magento\Ui\Component\Form\Fieldset implements ComponentVisibilityInterface
{
    /**
     * @param ContextInterface $context
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        array $components = [],
        array $data = []
    ) {
        $this->context = $context;

        parent::__construct($context, $components, $data);
    }

    /**
     * Can show items tab in tabs or not
     *
     * @return boolean
     */
    public function isComponentVisible(): bool
    {
        $designId = $this->context->getRequestParam('design_id');
        return (bool)$designId;
    }
}
