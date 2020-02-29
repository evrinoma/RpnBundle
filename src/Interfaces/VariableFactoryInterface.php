<?php


namespace Evrinoma\RpnBundle\Interfaces;


interface VariableFactoryInterface
{
    public function getVariable(string $value): VariableInterface;
}