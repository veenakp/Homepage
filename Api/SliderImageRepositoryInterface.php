<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Vegam\Homepage\Api\Data\SliderImageInterface;

interface SliderImageRepositoryInterface
{
    /**
     * Save Image Data
     *
     * @param SliderImageInterface $data
     */
    public function save(SliderImageInterface $data);

    /**
     * Get By Id
     *
     * @param Int $imageId
     * @return mixed
     */
    public function getById($imageId);

    /**
     * Get List
     *
     * @param  SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete By Id
     *
     * @param  Int $imageId
     * @return mixed
     */
    public function deleteById($imageId);
}
