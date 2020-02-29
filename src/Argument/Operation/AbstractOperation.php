<?php


namespace Evrinoma\RpnBundle\Argument\Operation;

use Evrinoma\RpnBundle\Argument\AbstractArgument;
use Evrinoma\RpnBundle\Interfaces\OperationInterface;

abstract class AbstractOperation extends AbstractArgument implements OperationInterface
{
    public const OPERATION = '';

    public function operation(): string
    {
        return self::OPERATION;
    }

    public function isEndGrouping(): bool
    {
        return $this->priority() === self::LOW_LEVEL;
    }

    public function isStartGrouping(): bool
    {
        return $this->priority() === self::LOWEST_LEVEL;
    }
}