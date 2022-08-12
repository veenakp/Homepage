<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Vegam\Homepage\Model\SliderImageFactory;
use Vegam\Homepage\Api\Data\SliderImageInterface;
use Vegam\Homepage\Model\ResourceModel\SliderImage;
use Vegam\Homepage\Api\Data\SliderImageInterfaceFactory;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Vegam\Homepage\Model\ResourceModel\SliderImage\CollectionFactory;

class SliderImageRepository implements \Vegam\Homepage\Api\SliderImageRepositoryInterface
{
    /**
     * @var sliderImageFactory
     */
    private $sliderImageFactory;
    /**
     * @var ResourceModel\SliderImage
     */
    private $sliderImageResource;
    /**
     * @var \Vegam\Homepage\Api\Data\SliderImageInterfaceFactory
     */
    private $sliderImageDataFactory;
    /**
     * @var \Magento\Framework\Api\ExtensibleDataObjectConverter
     */
    private $dataObjectConverter;
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;
    /**
     * @var DataObjectProcessor
     */
    private $dataObjectProcessor;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * SliderImageRepository constructor.
     *
     * @param SliderImageFactory $sliderImageFactory
     * @param SliderImage $sliderImageResource
     * @param SliderImageInterfaceFactory $sliderImageDataFactory
     * @param ExtensibleDataObjectConverter $dataObjectConverter
     * @param DataObjectHelper $dataObjectHelper
     * @param SearchResultsInterfaceFactory $searchResultFactory
     * @param DataObjectProcessor $dataObjectProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        SliderImageFactory $sliderImageFactory,
        SliderImage $sliderImageResource,
        SliderImageInterfaceFactory $sliderImageDataFactory,
        ExtensibleDataObjectConverter $dataObjectConverter,
        DataObjectHelper $dataObjectHelper,
        SearchResultsInterfaceFactory $searchResultFactory,
        DataObjectProcessor $dataObjectProcessor,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $collectionFactory
    ) {
        $this->sliderImageFactory = $sliderImageFactory;
        $this->sliderImageResource = $sliderImageResource;
        $this->sliderImageDataFactory = $sliderImageDataFactory;
        $this->dataObjectConverter = $dataObjectConverter;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->searchResultFactory = $searchResultFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Function Get By Id
     *
     * @param  int $image_id
     * @return SliderImageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($image_id)
    {
        $sliderImageObj = $this->sliderImageFactory->create();
        $this->sliderImageResource->load($sliderImageObj, $image_id);
        if (!$sliderImageObj->getId()) {
            throw new NoSuchEntityException(__('Item with id "%1" does not exist.', $image_id));
        }
        $data = $this->sliderImageDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $data,
            $sliderImageObj->getData(),
            SliderImageInterface::class
        );
        $data->setId($sliderImageObj->getId());

        return $data;
    }

    /**
     * Save SliderImage Data
     *
     * @param  String $sliderImage
     * @return SliderImageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SliderImageInterface $sliderImage)
    {
        try {
            /**
             * @var SliderImageInterface|\Magento\Framework\Model\AbstractModel $data
             */
            $this->sliderImageResource ->save($sliderImage);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save the data: %1',
                    $exception->getMessage()
                )
            );
        }
        return $sliderImage;
    }

    /**
     * Delete the SliderImage by SliderImage id
     *
     * @param Int $sliderImageId
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sliderImageId)
    {
        $sliderImageObj = $this->sliderImageFactory->create();
        $this->sliderImageResource->load($sliderImageObj, $sliderImageId);
        $this->sliderImageResource->delete($sliderImageObj);
        if ($sliderImageObj->isDeleted()) {
            return true;
        }
        return false;
    }

    /**
     * Get List
     *
     * @param  SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
