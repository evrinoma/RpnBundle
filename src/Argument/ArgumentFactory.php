<?php


namespace Evrinoma\RpnBundle\Argument;

use Evrinoma\RpnBundle\Interfaces\ArgumentFactoryInterface;
use Evrinoma\RpnBundle\Interfaces\OperationFactoryInterface;
use Evrinoma\RpnBundle\Interfaces\VariableFactoryInterface;

class ArgumentFactory implements ArgumentFactoryInterface
{
//region SECTION: Fields
    private $operation;
    private $variable;

//endregion Fields
//region SECTION: Constructor
    public function __construct(OperationFactoryInterface $operation, VariableFactoryInterface $variable)
    {
        $this->operation = $operation;
        $this->variable  = $variable;
    }
//endregion Constructor

//region SECTION: Getters/Setters
    public function getOperationFactory(): OperationFactoryInterface
    {
        return $this->operation;
    }

    public function getVariableFactory(): VariableFactoryInterface
    {
        return $this->variable;
    }
//endregion Getters/Setters
}