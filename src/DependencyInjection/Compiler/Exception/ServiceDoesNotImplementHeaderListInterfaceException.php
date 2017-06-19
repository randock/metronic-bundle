<?php

namespace Randock\MetronicBundle\DependencyInjection\Compiler\Exception;

/**
 * Class serviceNotImplementHeaderListInterfaceException
 */
class serviceDoesNotImplementHeaderListInterfaceException extends \Exception
{

    /**
     * serviceNotImplementHeaderListInterfaceException constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
        parent::__construct(sprintf('The %s must implement headerListInterface',$class));
    }

}
