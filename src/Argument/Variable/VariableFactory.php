<?php


namespace Evrinoma\RpnBundle\Argument\Variable;


use Evrinoma\RpnBundle\Interfaces\VariableFactoryInterface;
use Evrinoma\RpnBundle\Interfaces\VariableInterface;

class VariableFactory implements VariableFactoryInterface
{
//region SECTION: Getters/Setters
    public function getVariable(string $value): VariableInterface
    {
        if (filter_var($value, FILTER_VALIDATE_INT)) {
            $integer = new Integer();

            return $integer->setVariable($value);
        }

        throw new \Exception('Variable type not found. Variable Factory Error.');
    }
//endregion Getters/Setters
}