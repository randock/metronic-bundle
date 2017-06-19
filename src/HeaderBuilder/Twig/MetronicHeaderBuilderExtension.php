<?php

namespace Randock\MetronicBundle\Headerbuilder\Twig;

use Randock\MetronicBundle\Headerbuilder\HeaderBuilder;
use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;

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
        return array(
            new \Twig_Function('getHeaderLists',array($this->headerBuilder, 'getServices'))
        );
    }

}
