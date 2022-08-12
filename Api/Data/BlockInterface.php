<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Api\Data;

interface BlockInterface
{
    public const DESIGN_ID = 'design_id';
    public const TYPE      = 'type';
    public const NAME      = 'name';
    public const DESCRIPTION   = 'description';
    public const SHOW_SLIDER_TITLE = 'show_slider_title';
    public const AUTOPLAY      = 'autoplay';
    public const AUTOPLAY_TIMEOUT = 'autoplay_timeout';
    public const AUTOPLAY_HOVER_PAUSE = 'autoplay_hover_pause';
    public const SHOW_DOTS     = 'show_dots';
    public const STORE         = 'store';
    public const LINK_TYPE     = 'link_type';
    public const LINK          = 'link';
    public const START_DATE    = 'start_date';
    public const END_DATE      = 'end_date';
    public const BANNER_TEMPLATE = 'banner_template';
    public const BANNER_SERIALIZE = 'banner_serialized';
    public const CONTENT       = 'content';
    public const CATEGORY_ID   = 'category_id';
    public const PRODUCT_COUNT = 'product_count';
    public const PRODUCT_TYPE  = 'product_type';
    public const PRODUCT_IDS   = 'product_ids';
    public const STATUS   = 'status';
    public const MOBILE_STATUS   = 'mobile_status';
    public const POSITION = 'position';
    public const CUSTOM_IMAGE     = 'custom_image';
    public const SLIDER_WIDTH     = 'slider_width';
    public const SLIDER_BANNER = 'slider_serialized';
    public const TEMPLATE      = 'template_type';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param  int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Block Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Block Name
     *
     * @param  string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Block type
     *
     * @return string
     */
    public function getType();

    /**
     * Set Block Type
     *
     * @param  string $type
     * @return $this
     */
    public function setType($type);

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Description
     *
     * @param  string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get Slider Show Title
     *
     * @return $this
     */
    public function getShowSliderTitle();

    /**
     * Set Slider Show Title
     *
     * @param  int $showSliderTitle
     * @return $this
     */
    public function setShowSliderTitle($showSliderTitle);

    /**
     * Get Slider Autoplay
     *
     * @return $this
     */
    public function getAutoplay();

    /**
     * Set Slider Autoplay
     *
     * @param  int $autoplay
     * @return $this
     */
    public function setAutoplay($autoplay);

    /**
     * Get Slider AutoplayTimeout
     *
     * @return $this
     */
    public function getAutoplayTimeout();

    /**
     * Set Slider AutoplayTimeout
     *
     * @param  string $autoplayTimeout
     * @return $this
     */
    public function setAutoplayTimeout($autoplayTimeout);

    /**
     * Get Slider AutoplayHoverpause
     *
     * @return $this
     */
    public function getAutoplayHoverPause();

    /**
     * Set Slider Show AutoplayHoverause
     *
     * @param  int $autoplayHoverPause
     * @return $this
     */
    public function setAutoplayHoverPause($autoplayHoverPause);

    /**
     * Get Slider Show Dots
     *
     * @return $this
     */
    public function getShowDots();

    /**
     * Set Slider Show Dots
     *
     * @param  int $showDots
     * @return $this
     */
    public function setShowdots($showDots);

    /**
     * Get Store
     *
     * @return $this
     */
    public function getStore();

    /**
     * Set Store
     *
     * @param  int $store
     * @return $this
     */
    public function setStore($store);

    /**
     * Get Link Type
     *
     * @return string
     */
    public function getLinkType();

    /**
     * Set Link Type
     *
     * @param  string $linkType
     * @return $this
     */
    public function setLinkType($linkType);

    /**
     * Get Link
     *
     * @return $this
     */
    public function getLink();

    /**
     * Set Link
     *
     * @param  string $link
     * @return $this
     */
    public function setLink($link);

    /**
     * Get Banner Start Date
     *
     * @return $this
     */
    public function getStartDate();

    /**
     * Set Start Date
     *
     * @param  string $startDate
     * @return $this
     */
    public function setStartDate($startDate);

    /**
     * Get End Date
     *
     * @return $this
     */
    public function getEndDate();

    /**
     * Set End Date
     *
     * @param  string $endDate
     * @return $this
     */
    public function setEndDate($endDate);

    /**
     * Get Banner Serialized
     *
     * @return mixed
     */
    public function getBannerSerialized();

    /**
     * Set Banner Serialized
     *
     * @param  string $bannerSerialized
     * @return mixed
     */
    public function setBannerSerialized($bannerSerialized);

    /**
     * Get CategoryId
     *
     * @return int
     */
    public function getCategoryId();

    /**
     * Set CategoryId
     *
     * @param  int $categoryId
     * @return int
     */
    public function setCategoryId($categoryId);

    /**
     * Get ProductCount
     *
     * @return $this
     */
    public function getProductCount();

    /**
     * Set ProductCount
     *
     * @param  int $productCount
     * @return int
     */
    public function setProductCount($productCount);

    /**
     * Get Content
     *
     * @return string
     */
    public function getContent();

    /**
     * Set Content
     *
     * @param  string $content
     * @return string
     */
    public function setContent($content);

    /**
     * Get ProductType
     *
     * @return int
     */
    public function getProductType();

    /**
     * Set ProductType
     *
     * @param  int $productType
     * @return int
     */
    public function setProductType($productType);

    /**
     * Get Product Ids
     *
     * @return string
     */
    public function getProductIds();

    /**
     * Set Product Ids
     *
     * @param  string $productIds
     * @return $this
     */
    public function setProductIds($productIds);

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param  int $status
     * @return int
     */
    public function setStatus($status);

    /**
     * Get MobileStatus
     *
     * @return int
     */
    public function getMobileStatus();

    /**
     * Set MobileStatus
     *
     * @param  int $mobileStatus
     * @return int
     */
    public function setMobileStatus($mobileStatus);

    /**
     * Get Position
     *
     * @return int
     */
    public function getPosition();

    /**
     * Set Position
     *
     * @param  int $position
     * @return int
     */
    public function setPosition($position);
    /**
     * Get Custom Image
     *
     * @return int
     */
    public function getCustomImage();

    /**
     * Set Custom Image
     *
     * @param  int $customImage
     * @return int
     */
    public function setCustomImage($customImage);
    /**
     * Get Slider Width
     *
     * @return int
     */
    public function getSliderWidth();

    /**
     * Set Slider Width
     *
     * @param  int $sliderWidth
     * @return int
     */
    public function setSliderWidth($sliderWidth);
    
    /**
     * Get Slider Banner Serialized
     *
     * @return mixed
     */
    public function getSliderSerialized();

    /**
     * Set Banner Slider Serialized
     *
     * @param  string $bannerSlider
     * @return mixed
     */
    public function setSliderSerialized($bannerSlider);
    /**
     * Get Template Type
     *
     * @return int
     */
    public function getTemplateType();

    /**
     * Set Template Type
     *
     * @param  int $templateType
     * @return int
     */
    public function setTemplateType($templateType);

    /**
     * Get Banner Template
     *
     * @return int
     */
    public function getBannerTemplate();

    /**
     * Set Banner Template
     *
     * @param  int $bannerTemplate
     * @return int
     */
    public function setBannerTemplate($bannerTemplate);
}
