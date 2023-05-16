<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\HardCoded\IsErc20Specification;
use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\XRP;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:hardcoded', description: 'php bin/console run:hardcoded')]
class RunHardcoded extends Command {

	protected function execute(InputInterface $input, OutputInterface $output): int {

		$eth = new ETH();
		$btc = new BTC();
		$xrp = new XRP();

		$ethIsErc20Spec = new IsErc20Specification($eth);
		$btcIsErc20Spec = new IsErc20Specification($btc);
		$xrpIsErc20Spec = new IsErc20Specification($xrp);

		$output->writeln('<info>' . $eth->getName() . ' - ' . ($ethIsErc20Spec->isSatisfied() ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $btc->getName() . ' - ' . ($btcIsErc20Spec->isSatisfied() ? 'is ERC20' : 'is not ERC20'));
		$output->writeln('<error>' . $xrp->getName() . ' - ' . ($xrpIsErc20Spec->isSatisfied() ? 'is ERC20' : 'is not ERC20'));

		return Command::SUCCESS;
	}

}
