<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\XRP;
use App\Libs\Patterns\Specification\ParametrizedWithContext\HasDecimalsSpecificationWithContext;
use App\Libs\Patterns\Specification\ParametrizedWithContext\IsNetworkSpecificationWithContext;
use App\Libs\Patterns\Specification\ParametrizedWithContext\SpecificationContext;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:paramWithContext', description: 'php bin/console run:paramWithContext')]
class RunParametrizedWithContext extends Command {

	protected function execute(InputInterface $input, OutputInterface $output): int {

		$isNetworkSpecWithContext = new IsNetworkSpecificationWithContext('ERC20');
		$hasDecimalsWithContext = new HasDecimalsSpecificationWithContext(8);

		$ethContext = new SpecificationContext(new ETH());
		$btcContext = new SpecificationContext(new BTC());
		$xrpContext = new SpecificationContext(new XRP());

		$output->writeln('<info>' . $ethContext->getCryptocurrencyName() . ' - ' . ($isNetworkSpecWithContext->isSatisfiedBy($ethContext) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $btcContext->getCryptocurrencyName() . ' - ' . ($isNetworkSpecWithContext->isSatisfiedBy($btcContext) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $xrpContext->getCryptocurrencyName() . ' - ' . ($isNetworkSpecWithContext->isSatisfiedBy($xrpContext) ? 'is ERC20' : 'is not ERC20'));

		$output->writeln('<error>' . $ethContext->getCryptocurrencyName() . ' - ' . ($hasDecimalsWithContext->isSatisfiedBy($ethContext) ? 'has 8 decimals' : 'does not have 8 decimals'));
		$output->writeln('<info>' . $btcContext->getCryptocurrencyName() . ' - ' . ($hasDecimalsWithContext->isSatisfiedBy($btcContext) ? 'has 8 decimals' : 'does not have 8 decimals'));
		$output->writeln('<info>' . $xrpContext->getCryptocurrencyName() . ' - ' . ($hasDecimalsWithContext->isSatisfiedBy($xrpContext) ? 'has 8 decimals' : 'does not have 8 decimals'));

		return Command::SUCCESS;
	}

}
