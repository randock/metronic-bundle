<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\Headerbuilder\Twig;

use Randock\MetronicBundle\Headerbuilder\HeaderBuilder;

class MetronicHeaderBuilderExtension extends \Twig_Extension
{
    /**
     * @var HeaderBuilder
     */
    private $headerBuilder;

    public function __construct(HeaderBuilder $headerBuilder)
    {
        $this->headerBuilder = $headerBuilder;
    }

    public function getFunctions()
    {
        return [
            new \Twig_Function('getHeaderLists', [$this->headerBuilder, 'getServices']),
        ];
    }
}
