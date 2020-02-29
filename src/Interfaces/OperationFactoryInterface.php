<?php


namespace Evrinoma\RpnBundle\Interfaces;

interface OperationFactoryInterface
{
    public function getOperation(string $operation): OperationInterface;
}