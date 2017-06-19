<?php

namespace Randock\MetronicBundle\HeaderBuilder\HeaderList\TaskHeaderListItem;

class TaskHeaderListItem
{
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
    public $percent;

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
    public function getPercent(): int
    {
        return $this->percent;
    }

    /**
     * @param int $percent
     *
     * @return TaskHeaderListItem
     */
    public function setPercent(int $percent): TaskHeaderListItem
    {
        $this->percent = $percent;
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
