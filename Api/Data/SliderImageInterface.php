<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Api\Data;

interface SliderImageInterface
{
    public const IMAGE_ID      = 'image_id';
    public const DESIGN_ID     = 'design_id';
    public const DESCRIPTION   = 'description';
    public const SLIDER_IMAGE  = 'slider_image';
    public const LINK_TYPE     = 'link_type';
    public const LINK          = 'link';
    public const START_DATE    = 'start_date';
    public const END_DATE      = 'end_date';
    public const POSITION      = 'position';
    
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Design ID
     *
     * @return int|null
     */
    public function getDesignId();

    /**
     * Set Design ID
     *
     * @param int $designId
     * @return $this
     */
    public function setDesignId($designId);

    /**
     * Get Image Decription
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Image Description
     *
     * @param  string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get Slider Image
     *
     * @return $this
     */
    public function getSliderImage();

    /**
     * Set Slider Image
     *
     * @param  string $sliderImage
     * @return $this
     */
    public function setSliderImage($sliderImage);

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
     * Get Image Start Date
     *
     * @return $this
     */
    public function getStartDate();

    /**
     * Set Image Start Date
     *
     * @param  string $startDate
     * @return $this
     */
    public function setStartDate($startDate);

    /**
     * Get Image End Date
     *
     * @return $this
     */
    public function getEndDate();

    /**
     * Set Image End Date
     *
     * @param  string $endDate
     * @return $this
     */
    public function setEndDate($endDate);

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
}
