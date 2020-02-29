<?php


namespace Evrinoma\RpnBundle\Calc;


use Evrinoma\RpnBundle\Interfaces\ArgumentFactoryInterface;
use Evrinoma\RpnBundle\Interfaces\ArgumentInterface;
use Evrinoma\RpnBundle\Interfaces\OperationInterface;
use Evrinoma\RpnBundle\Interfaces\VariableInterface;

class RpnCalc extends AbstractCalc
{
//region SECTION: Fields
    /**
     * @var ArgumentInterface[]|VariableInterface[]|OperationInterface[]
     */
    private $variables = [];
    /**
     * @var OperationInterface[]
     */
    private $operations = [];
    private $factory;
    //endregion Fields

//region SECTION: Constructor
    public function __construct(ArgumentFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

//endregion Constructor

//region SECTION: Public
    /**
     * @return int
     * @throws \Exception
     */
    public function calc(): int
    {
        return $this->toRpn()->calcRpn();
    }
//endregion Public

//region SECTION: Private

    private function calcRpn(): int
    {
        $stack = [];
        if (count($this->variables)) {
            foreach ($this->variables as $argument) {
                if ($argument->isOperation()) {
                    $tail     = array_pop($stack);
                    $head     = array_pop($stack);
                    $stack [] = $argument->calculate($head, $tail);
                } else {
                    $stack [] = $argument->getVariable();
                }
            }

            return array_pop($stack);
        }

        return 0;
    }

    private function toRpn()
    {
        $len = strlen($this->stream);
        $var = '';
        for ($i = 0; $i < $len; $i++) {
            $char = $this->stream[$i];
            if (is_numeric($char)) {
                $var .= $char;
            } else {
                $this->pushVariables($var);
                $var          = '';
                $curOperation = $this->factory->getOperationFactory()->getOperation($char);

                if (!empty($this->operations)) {
                    $prevOperation = $this->operations[count($this->operations) - 1];

                    if (!$curOperation->isStartGrouping()) {
                        if (!$curOperation->isEndGrouping()) {
                            if ($prevOperation->priority() >= $curOperation->priority()) {
                                $this->variables[] = array_pop($this->operations);
                            }
                            $this->operations[] = $curOperation;
                        } else {
                            do {
                                $prevOperation = array_pop($this->operations);
                                if ($prevOperation->isStartGrouping()) {
                                    break;
                                }
                                if (!count($this->operations)) {
                                    throw new \Exception('Unclosed Grouping');
                                }
                                $this->variables[] = $prevOperation;
                            } while (true);
                        }
                    } else {
                        $this->operations[] = $curOperation;
                    }
                } else {
                    $this->operations[] = $curOperation;
                }
            }
        }

        $this->pushVariables($var)->flushOperations();

        return $this;
    }

    private function flushOperations()
    {
        $size = count($this->operations);
        for ($j = 0; $j < $size; $j++) {
            $operation = array_pop($this->operations);
            if ($operation->isStartGrouping() || $operation->isEndGrouping()) {
                throw new \Exception('Uncompleted grouping');
            }
            $this->variables[] = $operation;
        }

        return $this;
    }

    private function pushVariables($var)
    {
        if ($var !== '') {
            $this->variables[] = $this->factory->getVariableFactory()->getVariable($var);
        }

        return $this;
    }
//endregion Private
}