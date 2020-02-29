<?php


namespace Evrinoma\RpnBundle\Interfaces;


interface ArgumentInterface
{
    public function isOperation():bool;
    public function isVariable():bool;
}