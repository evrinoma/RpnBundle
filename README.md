## Description
Reverse Polish notation (RPN)

This bundle implements RPN logic.

Install the bundle by following command <br><b>composer require evrinoma/rpn-bundle</b>

If you'd like to add new operation that you should create new factory and describe new operation. 
That factory should implement <b>OperationFactory</b> interface.
The opearation should inherit AbstractOperation class.

<br>for example, try to create a mode operation

        class Mode extends AbstractOperation
        {
            public const OPERATION = '%';
        
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
        
                return $nominator % $denominator;
            }
        }

the new factory look likes
    
    class MyOperationFactory extends OperationFactory
    {
    
        protected $pool = [];
        private $mode;
    
        public function __construct()
        {
            $this->pool[Mode::OPERATION] = $this->operationMode();
        }
    
        private function &operationMode()
        {
            if (!$this->mode) {
                $this->mode = new Mode();
            }
    
            return $this->mode;
        }
    
        /**
         * @param string $operation
         *
         * @return OperationInterface
         * @throws \Exception
         */
        public function getOperation(string $operation): OperationInterface
        {
            if (array_key_exists($operation, $this->pool)) {
                return $this->pool[$operation];
            } else {
                return parent::getOperation($operation);
            }
        }
    
    }

and you should override a basic <b>OperationFactory</b> by setting DI params operation_factory

    rpn:
      operation_factory: App\Argument\Operation\MyOperationFactory

and little TestCase

first one it's a factory

    class FactoryUnitTest extends TestCase
    {
        /**
         * @var MyOperationFactory
         */
        private $factory;
    
        public function setUp():void
        {
            $this->factory = new MyOperationFactory();
        }
    
        public function testMyOperationFactorySimple()
        {
            $operation = '%';
            $mode = $this->factory->getOperation($operation);
            $this->assertEquals($operation,$mode->operation());
        }
    }

second one it's operation 'mode'

    class ModeUnitTest extends TestCase
    {
        public function testModeSimple()
        {
            $mode = new Mode();
    
            $this->assertEquals(1, $mode->calculate(4,3));
        }
    }

## Notice


## Thanks


## Done
