<?php

namespace Randock\MetronicBundle\Headerbuilder;

use Symfony\Component\DependencyInjection\Container;

class HeaderBuilder
{

    private $services;

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function setServices(array $services){
        $this->services = $services;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        $services = [];
        foreach($this->services as $service){
            $services[] = $this->container->get($service);
        }

        return $services;
    }

}
