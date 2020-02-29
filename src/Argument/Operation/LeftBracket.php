<?php

namespace Evrinoma\RpnBundle\Argument\Operation;

use Evrinoma\RpnBundle\Interfaces\OperationInterface;

class LeftBracket  extends AbstractOperation
{
    public const OPERATION = '(';

    public function priority(): int
    {
        return OperationInterface::LOWEST_LEVEL;
    }

    /**
     * @param mixed ...$values
     *
     * @return mixed
     * @throws \Exception
     */
    public function calculate(...$values)
    {
        return 0;
    }
}