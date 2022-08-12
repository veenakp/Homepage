<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\Data;

use Vegam\Homepage\Api\Data\BlockInterface;
use Magento\Framework\Model\AbstractModel;

class Block extends \Vegam\Homepage\Model\Block implements BlockInterface
{
    /**
     * Get the Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::DESIGN_ID);
    }

    /**
     * Set the Id
     *
     * @param  int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::DESIGN_ID, $id);
    }

     /**
      * Get type
      *
      * @return string
      */
    public function getType()
    {
        return $this->getData(BlockInterface::TYPE);
    }

    /**
     * Set type
     *
     * @param  string $type
     * @return $this
     */
    public function setType($type)
    {
        return $this->setData(BlockInterface::TYPE, $type);
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(BlockInterface::NAME);
    }

    /**
     * Set Name
     *
     * @param  string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(BlockInterface::NAME, $name);
    }

     /**
      * Get Description
      *
      * @return string
      */
    public function getDescription()
    {
        return $this->getData(BlockInterface::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param  string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(BlockInterface::DESCRIPTION, $description);
    }

    /**
     * Get Slider Show Title
     *
     * @return string
     */
    public function getShowSliderTitle()
    {
        return $this->getData(BlockInterface::SHOW_SLIDER_TITLE);
    }

    /**
     * Set Slider Show Title
     *
     * @param  string $showSliderTitle
     * @return $this
     */
    public function setShowSliderTitle($showSliderTitle)
    {
        return $this->setData(BlockInterface::SHOW_SLIDER_TITLE, $showSliderTitle);
    }

    /**
     * Get Slider Autoplay
     *
     * @return string
     */
    public function getAutoplay()
    {
        return $this->getData(BlockInterface::AUTOPLAY);
    }

    /**
     * Set Slider Autoplay
     *
     * @param  string $autoplay
     * @return $this
     */
    public function setAutoplay($autoplay)
    {
        return $this->setData(BlockInterface::AUTOPLAY, $autoplay);
    }

    /**
     * Get Slider AutoplayTimeout
     *
     * @return string
     */
    public function getAutoplayTimeout()
    {
        return $this->getData(BlockInterface::AUTOPLAY_TIMEOUT);
    }

    /**
     * Set Slider AutoplayTimeout
     *
     * @param  int $autoplayTimeout
     * @return $this
     */
    public function setAutoplayTimeout($autoplayTimeout)
    {
        return $this->setData(BlockInterface::AUTOPLAY_TIMEOUT, $autoplayTimeout);
    }

    /**
     * Get Slider AutoplayHoverPause
     *
     * @return string
     */
    public function getAutoplayHoverPause()
    {
        return $this->getData(BlockInterface::AUTOPLAY_HOVER_PAUSE);
    }

    /**
     * Set Slider AutoplayHoverPause
     *
     * @param  string $autoplayHoverPause
     * @return $this
     */
    public function setAutoplayHoverPause($autoplayHoverPause)
    {
        return $this->setData(BlockInterface::AUTOPLAY_HOVER_PAUSE, $autoplayHoverPause);
    }

    /**
     * Get Show Dots
     *
     * @return string
     */
    public function getShowDots()
    {
        return $this->getData(BlockInterface::SHOW_DOTS);
    }

    /**
     * Set Show Dots
     *
     * @param  string $showDots
     * @return $this
     */
    public function setShowDots($showDots)
    {
        return $this->setData(BlockInterface::SHOW_DOTS, $showDots);
    }

    /**
     * Get Store
     *
     * @return string
     */
    public function getStore()
    {
        return $this->getData(BlockInterface::STORE);
    }

    /**
     * Set Store
     *
     * @param  int $store
     * @return $this
     */
    public function setStore($store)
    {
        return $this->setData(BlockInterface::STORE, $store);
    }
    
    /**
     * Get linkType
     *
     * @return string
     */
    public function getLinkType()
    {
        return $this->getData(BlockInterface::LINK_TYPE);
    }

    /**
     * Set linkType
     *
     * @param  string $linkType
     * @return $this
     */
    public function setLinkType($linkType)
    {
        return $this->setData(BlockInterface::LINK_TYPE, $linkType);
    }

    /**
     * Get Link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->getData(BlockInterface::LINK);
    }

    /**
     * Set Link
     *
     * @param  string $link
     * @return $this
     */
    public function setLink($link)
    {
        return $this->setData(BlockInterface::LINK, $link);
    }

    /**
     * Get Start Date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->getData(BlockInterface::START_DATE);
    }

    /**
     * Set Start Date
     *
     * @param  string $startDate
     * @return $this
     */
    public function setStartDate($startDate)
    {
        return $this->setData(BlockInterface::START_DATE, $startDate);
    }
    /**
     * Get End Date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->getData(BlockInterface::END_DATE);
    }

    /**
     * Set End Date
     *
     * @param  string $endDate
     * @return $this
     */
    public function setEndDate($endDate)
    {
        return $this->setData(BlockInterface::END_DATE, $endDate);
    }

    /**
     * Get CategoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->getData(BlockInterface::CATEGORY_ID);
    }

    /**
     * Set CategoryId
     *
     * @param  int $categoryId
     * @return int
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(BlockInterface::CATEGORY_ID, $categoryId);
    }

    /**
     * Get ProductCount
     *
     * @return string
     */
    public function getProductCount()
    {
        return $this->getData(BlockInterface::PRODUCT_COUNT);
    }

    /**
     * Set ProductCount
     *
     * @param  int $productCount
     * @return int
     */
    public function setProductCount($productCount)
    {
        return $this->setData(BlockInterface::PRODUCT_COUNT, $productCount);
    }

     /**
      * Get Banner Serialized
      *
      * @return string
      */
    public function getBannerSerialized()
    {
        return $this->getData(BlockInterface::BANNER_SERIALIZE);
    }

    /**
     * Set Banner Serialized
     *
     * @param  string $bannerSerialized
     * @return $this
     */
    public function setBannerSerialized($bannerSerialized)
    {
        return $this->setData(BlockInterface::BANNER_SERIALIZE, $bannerSerialized);
    }

    /**
     * Get Content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(BlockInterface::CONTENT);
    }

    /**
     * Set Content
     *
     * @param  string $content
     * @return $this
     */
    public function setContent($content)
    {
        return $this->setData(BlockInterface::CONTENT, $content);
    }

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(BlockInterface::STATUS);
    }

    /**
     * Set Status
     *
     * @param  int $status
     * @return int
     */
    public function setStatus($status)
    {
        return $this->setData(BlockInterface::STATUS, $status);
    }

    /**
     * Get Mobile Status
     *
     * @return int
     */
    public function getMobileStatus()
    {
        return $this->getData(BlockInterface::MOBILE_STATUS);
    }

    /**
     * Set Mobile Status
     *
     * @param  int $mobileStatus
     * @return int
     */
    public function setMobileStatus($mobileStatus)
    {
        return $this->setData(BlockInterface::MOBILE_STATUS, $mobileStatus);
    }

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->getData(BlockInterface::POSITION);
    }

    /**
     * Set Position
     *
     * @param  string $position
     * @return $this
     */
    public function setPosition($position)
    {
        return $this->setData(BlockInterface::POSITION, $position);
    }
    /**
     * Get ProductType
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->getData(BlockInterface::PRODUCT_TYPE);
    }
    /**
     * Set ProductType
     *
     * @param  string $productType
     * @return $this
     */
    public function setProductType($productType)
    {
        return $this->setData(BlockInterface::PRODUCT_TYPE, $productType);
    }

    /**
     * Get Product Ids
     *
     * @return Int
     */
    public function getProductIds()
    {
        return $this->getData(BlockInterface::PRODUCT_IDS);
    }

    /**
     * Set Product Ids
     *
     * @param  int $productIds
     * @return $this
     */
    public function setProductIds($productIds)
    {
        return $this->setData(BlockInterface::PRODUCT_IDS, $productIds);
    }
    /**
     * Get Custom Image
     *
     * @return string
     */
    public function getCustomImage()
    {
        return $this->getData(BlockInterface::CUSTOM_IMAGE);
    }

    /**
     * Set Custom Image
     *
     * @param  string $customImage
     * @return $this
     */
    public function setCustomImage($customImage)
    {
        return $this->setData(BlockInterface::CUSTOM_IMAGE, $customImage);
    }
    /**
     * Get Slider Width
     *
     * @return string
     */
    public function getSliderWidth()
    {
        return $this->getData(BlockInterface::SLIDER_WIDTH);
    }

    /**
     * Set Slider Width
     *
     * @param  string $sliderWidth
     * @return $this
     */
    public function setSliderWidth($sliderWidth)
    {
        return $this->setData(BlockInterface::SLIDER_WIDTH, $sliderWidth);
    }
    /**
     * Get Banner Slider Serialized
     *
     * @return string
     */
    public function getSliderSerialized()
    {
        return $this->getData(BlockInterface::SLIDER_BANNER);
    }
    /**
     * Set Banner Slider Serialized
     *
     * @param  string $bannerSlider
     * @return $this
     */
    public function setSliderSerialized($bannerSlider)
    {
        return $this->setData(BlockInterface::SLIDER_BANNER, $bannerSlider);
    }
    /**
     * Get Template Type
     *
     * @return string
     */
    public function getTemplateType()
    {
        return $this->getData(BlockInterface::TEMPLATE);
    }

    /**
     * Set Template Type
     *
     * @param  String $templateType
     * @return $this
     */
    public function setTemplateType($templateType)
    {
        return $this->setData(BlockInterface::TEMPLATE, $templateType);
    }
    
    /**
     * Get Banner Template
     *
     * @return string
     */
    public function getBannerTemplate()
    {
        return $this->getData(BlockInterface::BANNER_TEMPLATE);
    }

    /**
     * Set Banner Template
     *
     * @param  String $bannerTemplate
     * @return $this
     */
    public function setBannerTemplate($bannerTemplate)
    {
        return $this->setData(BlockInterface::BANNER_TEMPLATE, $bannerTemplate);
    }
}
