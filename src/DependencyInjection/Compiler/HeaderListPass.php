<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Randock\MetronicBundle\Headerbuilder\HeaderList\Definition\HeaderListInterface;
use Randock\MetronicBundle\DependencyInjection\Compiler\Exception\ServiceDoesNotImplementHeaderListInterfaceException;

class HeaderListPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('metronic.header_builder')) {
            return;
        }

        $definition = $container->findDefinition('metronic.header_builder');
        $taggedServices = $container->findTaggedServiceIds('metronic.header_list');
        foreach ($taggedServices as $service => $nothing) {
            $serviceDefinition = $container->findDefinition($service);
            $reflectionClass = new \ReflectionClass($serviceDefinition->getClass());
            if (!$reflectionClass->implementsInterface(HeaderListInterface::class)) {
                throw new ServiceDoesNotImplementHeaderListInterfaceException($serviceDefinition->getClass());
            }
        }
        $definition->addMethodCall('setServices', [array_keys($taggedServices)]);
    }
}
