<?php

namespace Randock\MetronicBundle\Headerbuilder\HeaderList\NotificationHeaderListItem;

class NotificationHeaderListItem
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $subtitle;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $rightText;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var string
     */
    public $iconType;

    /**
     * @var string
     */
    public $downRightText;

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return NotificationHeaderListItem
     */
    public function setTitle(string $title): NotificationHeaderListItem
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     *
     * @return NotificationHeaderListItem
     */
    public function setSubtitle(string $subtitle): NotificationHeaderListItem
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return NotificationHeaderListItem
     */
    public function setUrl(string $url): NotificationHeaderListItem
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRightText(): ?string
    {
        return $this->rightText;
    }

    /**
     * @param string $rightText
     *
     * @return NotificationHeaderListItem
     */
    public function setRightText(string $rightText)
    {
        $this->rightText = $rightText;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return NotificationHeaderListItem
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getIconType(): string
    {
        return $this->iconType;
    }

    /**
     * @param string $iconType
     *
     * @return NotificationHeaderListItem
     */
    public function setIconType(string $iconType): NotificationHeaderListItem
    {
        $this->iconType = $iconType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDownRightText(): string
    {
        return $this->downRightText;
    }

    /**
     * @param string $downRightText
     *
     * @return NotificationHeaderListItem
     */
    public function setDownRightText(string $downRightText): NotificationHeaderListItem
    {
        $this->downRightText = $downRightText;
        return $this;
    }


}
