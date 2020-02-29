<?php


namespace Evrinoma\RpnBundle\Interfaces;

interface CalcInterface
{
    public const INT_CONST = 100;
//region SECTION: Public

    /**
     * @return int
     * @throws \Exception
     */
    public function calc(): int;
//endregion Public

//region SECTION: Getters/Setters
    public function set(string $value): CalcInterface;
//endregion Getters/Setters
}