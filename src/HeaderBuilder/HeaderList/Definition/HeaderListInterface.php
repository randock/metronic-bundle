<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\Headerbuilder\HeaderList\Definition;

interface HeaderListInterface
{
    public const NOTIFICATION = 'notification';
    public const TASK = 'task';

    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @return string
     */
    public function getType(): string;
}
