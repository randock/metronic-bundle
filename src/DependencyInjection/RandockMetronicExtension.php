<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\DependencyInjection;

use Randock\MetronicBundle\Menu\MenuBuilder;
use Randock\MetronicBundle\Menu\MenuBuilder1;
use Randock\MetronicBundle\Menu\MenuBuilder3;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class RandockMetronicExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('metronic.menu_builder');
        if ($config['layout'] == 1) {
            $def->setClass(MenuBuilder1::class);
        } elseif ($config['layout'] == 3) {
            $def->setClass(MenuBuilder3::class);
        }

    }
}