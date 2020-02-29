<?php


namespace Evrinoma\RpnBundle\Command;


use Evrinoma\RpnBundle\Interfaces\CalcInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CalcCommand
 *
 * @package App\Command
 */
class CalcCommand extends Command
{
//region SECTION: Fields
    protected static $defaultName = 'evrinoma:calc';
    private          $calc;
//endregion Fields

//region SECTION: Constructor
    /**
     * CalcCommand constructor.
     */
    public function __construct(CalcInterface $calc)
    {
        $this->calc = $calc;

        parent::__construct();
    }
//endregion Constructor

//region SECTION: Protected
    protected function configure()
    {
        $this->addOption(
            'formula',
            null,
            InputOption::VALUE_REQUIRED,
            'Formula to calc',
            '(5*4-4+10-10)/(2+2*3-4)+1'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $option = $input->getOption('formula');

        try {
            $result = 'Formula: ['.$option.' = '.$this->calc->set($option)->calc().']';
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        $output->writeln(['============', $result, '============',]);

        return 0;
    }
//endregion Protected
}