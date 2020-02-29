<?php


namespace Evrinoma\RpnBundle\Interfaces;


interface ArgumentFactoryInterface
{
    public function getOperationFactory():OperationFactoryInterface;
    public function getVariableFactory():VariableFactoryInterface;
}