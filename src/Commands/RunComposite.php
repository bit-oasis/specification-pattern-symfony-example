<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\Composite\HasDigitsSpecification;
use App\Libs\Patterns\Specification\Composite\IsNetworkSpecification;
use App\Libs\Patterns\Specification\Composite\Logical\AllSpecification;
use App\Libs\Patterns\Specification\Composite\Logical\AnySpecification;
use App\Libs\Patterns\Specification\Composite\Logical\NotSpecification;
use App\Libs\Patterns\Specification\Composite\SpecificationContext;
use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\DOT;
use App\Libs\Patterns\Specification\Items\ETC;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\GALA;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:composite', description: 'php bin/console run:composite')]
class RunComposite extends Command {

	protected function configure(): void
	{
		$this->addArgument('type', InputArgument::OPTIONAL, 'Type');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {

		switch ($input->getArgument('type')) {
			case 'any': $this->testAny($output);break;
			case 'all': $this->testAll($output);break;
			case 'not': $this->testNot($output);break;
			case 'combined': $this->testCombined($output);break;
			default: $output->writeln('<error>Please specify the type</error>');
		}

		return Command::SUCCESS;
	}

	protected function testAny(OutputInterface $output) {
		$ethContext = new SpecificationContext(new ETH());
		$galaContext = new SpecificationContext(new GALA());
		$btcContext = new SpecificationContext(new BTC());
		$dotContext = new SpecificationContext(new DOT());

		$compositeSpec = new AnySpecification([
			new IsNetworkSpecification('ERC20'),
			new HasDigitsSpecification(8)
		]);

		$output->writeln('<info>' . $ethContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($ethContext) ? 'is ERC20 or has 8 decimals' : 'is not ERC20 and does not have 8 decimals'));
		$output->writeln('<info>' . $galaContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($galaContext) ? 'is ERC20 or has 8 decimals' : 'is not ERC20 and does not have 8 decimals'));
		$output->writeln('<info>' . $btcContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($btcContext) ? 'is ERC20 or has 8 decimals' : 'is not ERC20 and does not have 8 decimals'));
		$output->writeln('<error>' . $dotContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($dotContext) ? 'is ERC20 or has 8 decimals' : 'is not ERC20 and does not have 8 decimals'));
	}

	protected function testAll(OutputInterface $output) {
		$ethContext = new SpecificationContext(new ETH());
		$galaContext = new SpecificationContext(new GALA());
		$btcContext = new SpecificationContext(new BTC());
		$dotContext = new SpecificationContext(new DOT());

		$compositeSpec = new AllSpecification([
			new IsNetworkSpecification('ERC20'),
			new HasDigitsSpecification(8)
		]);

		$output->writeln('<error>' . $ethContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($ethContext) ? 'is ERC20 and has 8 decimals' : 'is not ERC20 or does not have 8 decimals'));
		$output->writeln('<info>' . $galaContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($galaContext) ? 'is ERC20 and has 8 decimals' : 'is not ERC20 or does not have 8 decimals'));
		$output->writeln('<error>' . $btcContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($btcContext) ? 'is ERC20 and has 8 decimals' : 'is not ERC20 or does not have 8 decimals'));
		$output->writeln('<error>' . $dotContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($dotContext) ? 'is ERC20 and has 8 decimals' : 'is not ERC20 or does not have 8 decimals'));
	}

	protected function testNot(OutputInterface $output) {
		$ethContext = new SpecificationContext(new ETH());
		$galaContext = new SpecificationContext(new GALA());
		$btcContext = new SpecificationContext(new BTC());
		$dotContext = new SpecificationContext(new DOT());

		$compositeSpec = new NotSpecification(new IsNetworkSpecification('ERC20'));

		$output->writeln('<error>' . $ethContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($ethContext) ? 'is not ERC20' : 'is ERC20'));
		$output->writeln('<error>' . $galaContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($galaContext) ? 'is not ERC20' : 'is ERC20'));
		$output->writeln('<info>' . $btcContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($btcContext) ? 'is not ERC20' : 'is ERC20'));
		$output->writeln('<info>' . $dotContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($dotContext) ? 'is not ERC20' : 'is ERC20'));
	}

	protected function testCombined(OutputInterface $output) {
		$ethContext = new SpecificationContext(new ETH());
		$etcContext = new SpecificationContext(new ETC());
		$galaContext = new SpecificationContext(new GALA());
		$btcContext = new SpecificationContext(new BTC());
		$dotContext = new SpecificationContext(new DOT());

		// Currency must be ERC20 AND must not have 8 decimals
		// So expected results are ETH and ETC (which are ERC20 and doesn't have 8 decimals)
		$compositeSpec = new AllSpecification([
			new IsNetworkSpecification('ERC20'),
			new NotSpecification(
				new HasDigitsSpecification(8)
			)
		]);

		$output->writeln('<info>' . $ethContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($ethContext) ? 'is ERC 20 and does not have 8 decimals' : 'is not ERC20 or has 8 decimals'));
		$output->writeln('<info>' . $etcContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($etcContext) ? 'is ERC 20 and does not have 8 decimals' : 'is not ERC20 or has 8 decimals'));
		$output->writeln('<error>' . $galaContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($galaContext) ? 'is ERC 20 and does not have 8 decimals' : 'is not ERC20 or has 8 decimals'));
		$output->writeln('<error>' . $btcContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($btcContext) ? 'is ERC 20 and does not have 8 decimals' : 'is not ERC20 or has 8 decimals'));
		$output->writeln('<error>' . $dotContext->getCryptocurrencyName() . ' - ' . ($compositeSpec->isSatisfiedBy($dotContext) ? 'is ERC 20 and does not have 8 decimals' : 'is not ERC20 or has 8 decimals'));
	}
}
