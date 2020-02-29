<?php

namespace Evrinoma\RpnBundle\Argument\Operation;

use Evrinoma\RpnBundle\Interfaces\OperationInterface;

class Divide extends AbstractOperation
{
//region SECTION: Fields
    public const OPERATION = '/';
//endregion Fields

//region SECTION: Public
    public function priority(): int
    {
        return OperationInterface::HIGH_LEVEL;
    }

    /**
     * @param mixed ...$values
     *
     * @return mixed
     * @throws \Exception
     */
    public function calculate(...$values)
    {
        $nominator   = array_shift($values);
        $denominator = array_shift($values);
        if ($denominator === 0) {
            throw new \Exception('Division by zero');;
        }

        return $nominator / $denominator;
    }
//endregion Public
}