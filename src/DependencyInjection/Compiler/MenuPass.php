<?php


namespace Randock\MetronicBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MenuPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $taggedServices = $container->findTaggedServiceIds('metronic.menu_add_items');

        $definition =$container->getDefinition('metronic.menu_builder');

        $definition->addMethodCall('setServices', [array_keys($taggedServices)]);

    }

}
