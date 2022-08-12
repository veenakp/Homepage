<?php
/**
 * @package Vegam_Homepage
 */
declare(strict_types=1);

namespace Vegam\Homepage\Model\Data;

use Vegam\Homepage\Model\SliderImage as SliderImageModel;
use Vegam\Homepage\Api\Data\SliderImageInterface;

class SliderImage extends SliderImageModel implements SliderImageInterface
{
    /**
     * Get image id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(SliderImageInterface::IMAGE_ID);
    }

    /**
     * Set image id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(SliderImageInterface::IMAGE_ID, $id);
    }
    /**
     * Get design id
     *
     * @return int|null
     */
    public function getDesignId()
    {
        return $this->getData(SliderImageInterface::DESIGN_ID);
    }

    /**
     * Set design id
     *
     * @param int $designId
     * @return $this
     */
    public function setDesignId($designId)
    {
        return $this->setData(SliderImageInterface::DESIGN_ID, $designId);
    }
    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(SliderImageInterface::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param  String $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(SliderImageInterface::DESCRIPTION, $description);
    }

    /**
     * Get Slider Image
     *
     * @return string
     */
    public function getSliderImage()
    {
        return $this->getData(SliderImageInterface::SLIDER_IMAGE);
    }

    /**
     * Set Slider Image
     *
     * @param  String $slider_image
     * @return $this
     */
    public function setSliderImage($slider_image)
    {
        return $this->setData(SliderImageInterface::SLIDER_IMAGE, $slider_image);
    }

    /**
     * Get link_type
     *
     * @return string
     */
    public function getLinkType()
    {
        return $this->getData(SliderImageInterface::LINK_TYPE);
    }

    /**
     * Set link_type
     *
     * @param  String $linkType
     * @return $this
     */
    public function setLinkType($linkType)
    {
        return $this->setData(SliderImageInterface::LINK_TYPE, $linkType);
    }

    /**
     * Get Link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->getData(SliderImageInterface::LINK);
    }

    /**
     * Set Link
     *
     * @param  String $link
     * @return $this
     */
    public function setLink($link)
    {
        return $this->setData(SliderImageInterface::LINK, $link);
    }

    /**
     * Get Start Date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->getData(SliderImageInterface::START_DATE);
    }

    /**
     * Set Start Date
     *
     * @param  String $start_date
     * @return $this
     */
    public function setStartDate($start_date)
    {
        return $this->setData(SliderImageInterface::START_DATE, $start_date);
    }
    /**
     * Get End Date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->getData(SliderImageInterface::END_DATE);
    }

    /**
     * Set End Date
     *
     * @param  String $end_date
     * @return $this
     */
    public function setEndDate($end_date)
    {
        return $this->setData(SliderImageInterface::END_DATE, $end_date);
    }

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->getData(SliderImageInterface::POSITION);
    }

    /**
     * Set Position
     *
     * @param  String $position
     * @return $this
     */
    public function setPosition($position)
    {
        return $this->setData(SliderImageInterface::POSITION, $position);
    }
}
