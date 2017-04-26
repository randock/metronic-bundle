<?php

declare(strict_types=1);

namespace Randock\MetronicBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class RandockMetronicBundle.
 */
class RandockMetronicBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->loadFromExtension('twig', array(
            'paths' => array(
                '%kernel.root_dir%/../vendor/randock/metronic-bundle/src/Resources/views' => 'RandockMetronicBundle',
            ),
        ));
    }
}

