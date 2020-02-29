<?php


namespace Evrinoma\RpnBundle\Interfaces;


interface VariableInterface
{
    public function setVariable($value):VariableInterface;
    public function getVariable();
}