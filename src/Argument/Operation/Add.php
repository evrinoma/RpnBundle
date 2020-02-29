<?php

namespace Evrinoma\RpnBundle\Argument\Operation;

use Evrinoma\RpnBundle\Interfaces\OperationInterface;

class Add extends AbstractOperation
{
    public const OPERATION = '+';

    public function priority(): int
    {
        return OperationInterface::MIDDLE_LEVEL;
    }

    /**
     * @param mixed ...$values
     *
     * @return mixed
     * @throws \Exception
     */
    public function calculate(...$values)
    {
        return array_shift($values) + array_shift($values);
    }
}