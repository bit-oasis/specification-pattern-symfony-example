<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\Cryptocurrency;
use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\XRP;
use App\Libs\Patterns\Specification\Parametrized\IsErc20Specification;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:param', description: 'php bin/console run:param')]
class RunParametrized extends Command {

	protected function execute(InputInterface $input, OutputInterface $output): int {

		$eth = new ETH();
		$btc = new BTC();
		$xrp = new XRP();

		$isErc20Spec = new IsErc20Specification();

		$output->writeln('<info>' . $eth->getName() . ' - ' . ($isErc20Spec->isSatisfiedBy($eth) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $btc->getName() . ' - ' . ($isErc20Spec->isSatisfiedBy($btc) ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $xrp->getName() . ' - ' . ($isErc20Spec->isSatisfiedBy($xrp) ? 'is ERC20' : 'is not ERC20'));

		return Command::SUCCESS;
	}

}
