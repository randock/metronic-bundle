<?php

namespace Randock\MetronicBundle\DependencyInjection\Compiler;

use Randock\MetronicBundle\DependencyInjection\Compiler\Exception\ServiceDoesNotImplementHeaderListInterfaceException;
use Randock\MetronicBundle\Headerbuilder\HeaderList\Definition\HeaderListInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HeaderListPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if(!$container->has('metronic.header_builder')){
            return;
        }

        $definition = $container->findDefinition('metronic.header_builder');
        $taggedServices = $container->findTaggedServiceIds('metronic.header_list');
        foreach ($taggedServices as $service => $nothing ){
            $serviceDefinition = $container->findDefinition($service);
            $reflectionClass = new \ReflectionClass($serviceDefinition->getClass());
            if(!$reflectionClass->implementsInterface(HeaderListInterface::class)){
                throw new ServiceDoesNotImplementHeaderListInterfaceException($serviceDefinition->getClass());
            }
        }
        $definition->addMethodCall('setServices', [array_keys($taggedServices)]);
    }
}
