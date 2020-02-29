<?php

namespace Evrinoma\RpnBundle\Argument\Variable;

use Evrinoma\RpnBundle\Interfaces\VariableInterface;

class Integer extends AbstractVariable
{
    public function setVariable($value):VariableInterface
    {
        $this->variable = (int) $value;

        return $this;
    }
}