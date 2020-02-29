<?php


namespace Evrinoma\RpnBundle\Argument;


use Evrinoma\RpnBundle\Interfaces\ArgumentInterface;
use Evrinoma\RpnBundle\Interfaces\OperationInterface;
use Evrinoma\RpnBundle\Interfaces\VariableInterface;

abstract class AbstractArgument implements ArgumentInterface
{
    public function isOperation():bool
    {
        return $this instanceof OperationInterface;
    }

    public function isVariable():bool
    {
        return $this instanceof VariableInterface;
    }
}