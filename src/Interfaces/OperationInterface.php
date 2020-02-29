<?php


namespace Evrinoma\RpnBundle\Interfaces;


interface OperationInterface
{
//region SECTION: Fields
    public const LOWEST_LEVEL = 0;
    public const LOW_LEVEL    = 1;
    public const MIDDLE_LEVEL = 2;
    public const HIGH_LEVEL   = 3;
//endregion Fields

//region SECTION: Public
    public function operation(): string;

    public function priority(): int;

    public function isStartGrouping(): bool;

    public function isEndGrouping(): bool;

    /**
     * @param mixed ...$values
     *
     * @return mixed
     * @throws \Exception
     */
    public function calculate(...$values);
//endregion Public
}