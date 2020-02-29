<?php


namespace Evrinoma\RpnBundle\Argument\Operation;

use Evrinoma\RpnBundle\Interfaces\OperationFactoryInterface;
use Evrinoma\RpnBundle\Interfaces\OperationInterface;


class OperationFactory implements OperationFactoryInterface
{
//region SECTION: Fields
    private $add;
    private $subtract;
    private $multiply;
    private $divide;
    private $leftBracket;
    private $rightBracket;
//endregion Fields

//region SECTION: Getters/Setters
    public function getOperation(string $operation): OperationInterface
    {
        switch ($operation) {
            case Add::OPERATION:
                if (!$this->add) {
                    $this->add = new Add();
                }

                return $this->add;
            case Subtract::OPERATION:
                if (!$this->subtract) {
                    $this->subtract = new Subtract();
                }

                return $this->subtract;
            case Multiply::OPERATION:
                if (!$this->multiply) {
                    $this->multiply = new Multiply();
                }

                return $this->multiply;
            case Divide::OPERATION:
                if (!$this->divide) {
                    $this->divide = new Divide();
                }

                return $this->divide;
            case LeftBracket::OPERATION:
                if (!$this->leftBracket) {
                    $this->leftBracket = new LeftBracket();
                }

                return $this->leftBracket;
            case RightBracket::OPERATION:
                if (!$this->rightBracket) {
                    $this->rightBracket = new RightBracket();
                }

                return $this->rightBracket;
            default:
                throw new \Exception('Operation not found. Operation Factory Error.');
        }
    }
//endregion Getters/Setters
}