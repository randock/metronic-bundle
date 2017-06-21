<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\Headerbuilder\HeaderList\Definition;

interface HeaderListInterface
{
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
