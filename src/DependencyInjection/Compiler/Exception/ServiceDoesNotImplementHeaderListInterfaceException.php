<?php

namespace Randock\MetronicBundle\DependencyInjection\Compiler\Exception;

/**
 * Class ServiceNotImplementHeaderListInterfaceException
 */
class ServiceDoesNotImplementHeaderListInterfaceException extends \Exception
{

    /**
     * ServiceNotImplementHeaderListInterfaceException constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
        parent::__construct(sprintf('The %s must implement headerListInterface',$class));
    }

}
