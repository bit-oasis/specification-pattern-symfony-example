<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\Cryptocurrency;
use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\DOT;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\GALA;
use App\Libs\Patterns\Specification\Items\XRP;
use App\Libs\Patterns\Specification\ParametrizedWithContext\Has8DecimalsSpecificationWithContext;
use App\Libs\Patterns\Specification\ParametrizedWithContext\IsErc20SpecificationWithContext;
use App\Libs\Patterns\Specification\ParametrizedWithContext\SpecificationContext;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:paramWithContext', description: 'php bin/console run:paramWithContext')]
class RunParametrizedWithContext extends Command {

	protected function execute(InputInterface $input, OutputInterface $output): int {

		$isErc20SpecWithContext = new IsErc20SpecificationWithContext();
		$has8DecimalsWithContext = new Has8DecimalsSpecificationWithContext();

		$ethContext = new SpecificationContext(new ETH());
		$btcContext = new SpecificationContext(new BTC());
		$xrpContext = new SpecificationContext(new XRP());

		$output->writeln('<info>' . $ethContext->getCryptocurrencyName() . ' - ' . ($isErc20SpecWithContext->isSatisfiedBy($ethContext) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $btcContext->getCryptocurrencyName() . ' - ' . ($isErc20SpecWithContext->isSatisfiedBy($btcContext) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $xrpContext->getCryptocurrencyName() . ' - ' . ($isErc20SpecWithContext->isSatisfiedBy($xrpContext) ? 'is ERC20' : 'is not ERC20'));

		$output->writeln('<error>' . $ethContext->getCryptocurrencyName() . ' - ' . ($has8DecimalsWithContext->isSatisfiedBy($ethContext) ? 'has 8 decimals' : 'does not have 8 decimals'));
		$output->writeln('<info>' . $btcContext->getCryptocurrencyName() . ' - ' . ($has8DecimalsWithContext->isSatisfiedBy($btcContext) ? 'has 8 decimals' : 'does not have 8 decimals'));
		$output->writeln('<info>' . $xrpContext->getCryptocurrencyName() . ' - ' . ($has8DecimalsWithContext->isSatisfiedBy($xrpContext) ? 'has 8 decimals' : 'does not have 8 decimals'));

		return Command::SUCCESS;
	}

}
