<?php


namespace Evrinoma\RpnBundle\Calc;


use Evrinoma\RpnBundle\Interfaces\CalcInterface;
use Evrinoma\RpnBundle\Interfaces\OperationInterface;

abstract class AbstractCalc implements CalcInterface
{
//region SECTION: Fields
    protected $stream;
    protected $float;
    protected $int;
//endregion Fields

//region SECTION: Getters/Setters
    public function set(string $value): CalcInterface
    {
        $this->stream = $value;

        return $this;
    }
//endregion Getters/Setters
}