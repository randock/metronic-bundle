<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\HeaderBuilder\HeaderList\TaskHeaderListItem;

class TaskHeaderListItem
{
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const DANGER = 'danger';
    public const INFO = 'info';
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $url;

    /**
     * @var int
     */
    public $percentage;

    /**
     * @var string
     */
    public $progressBarType;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return TaskHeaderListItem
     */
    public function setTitle(string $title): TaskHeaderListItem
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return TaskHeaderListItem
     */
    public function setUrl(string $url): TaskHeaderListItem
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return int
     */
    public function getPercentage(): int
    {
        return $this->percentage;
    }

    /**
     * @param int $percentage
     *
     * @return TaskHeaderListItem
     */
    public function setPercentage(int $percentage): TaskHeaderListItem
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * @return string
     */
    public function getProgressBarType(): string
    {
        return $this->progressBarType;
    }

    /**
     * @param string $progressBarType
     *
     * @return TaskHeaderListItem
     */
    public function setProgressBarType(string $progressBarType): TaskHeaderListItem
    {
        $this->progressBarType = $progressBarType;

        return $this;
    }
}
