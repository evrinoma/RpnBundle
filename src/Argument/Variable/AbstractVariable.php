<?php


namespace Evrinoma\RpnBundle\Argument\Variable;

use Evrinoma\RpnBundle\Argument\AbstractArgument;
use Evrinoma\RpnBundle\Interfaces\VariableInterface;

/**
 * Class AbstractValue
 *
 * @package App\Argument
 */
abstract class AbstractVariable extends AbstractArgument implements VariableInterface
{
    protected $variable;

    public function getVariable()
    {
        return $this->variable;
    }
}
