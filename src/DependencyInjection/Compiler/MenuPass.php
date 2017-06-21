<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Randock\MetronicBundle\Menu\Item\MenuItemProviderInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Randock\MetronicBundle\DependencyInjection\Compiler\Exception\ServiceDoesNotImplementMenuItemProviderInterfaceException;

class MenuPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $taggedServices = $container->findTaggedServiceIds('metronic.menu_add_items');

        $definition = $container->getDefinition('metronic.menu_builder');

        $sortedServices = [];

        foreach ($taggedServices as $service => $tags) {
            $serviceDefinition = $container->findDefinition($service);
            $reflectionClass = new \ReflectionClass($serviceDefinition->getClass());
            if (!$reflectionClass->implementsInterface(MenuItemProviderInterface::class)) {
                throw new ServiceDoesNotImplementMenuItemProviderInterfaceException($serviceDefinition->getClass());
            }
            $sortedServices[$service] = $tags[0]['priority'] ?? INF;
        }

        asort($sortedServices);

        $definition->addMethodCall('setServices', [array_keys($sortedServices)]);
    }
}
