<?php

namespace App\Commands;

use App\Libs\Patterns\Specification\Items\BTC;
use App\Libs\Patterns\Specification\Items\ETH;
use App\Libs\Patterns\Specification\Items\GALA;
use App\Libs\Patterns\Specification\Items\XRP;
use App\Libs\Patterns\Specification\Parametrized\IsNetworkAndHasDigitsSpecification;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'run:param', description: 'php bin/console run:param')]
class RunParametrized extends Command {

	protected function execute(InputInterface $input, OutputInterface $output): int {

		$eth = new ETH();
		$gala = new GALA();
		$btc = new BTC();
		$xrp = new XRP();

		$spec = new IsNetworkAndHasDigitsSpecification('ERC20', 8);

		$output->writeln('<error>' . $eth->getName() . ' - ' . ($spec->isSatisfiedBy($eth) ? 'is ERC20 and has 8 digits' : 'is not ERC20 or does not have 8 digits'));
		$output->writeln('<info>' . $gala->getName() . ' - ' . ($spec->isSatisfiedBy($gala) ? 'is ERC20 and has 8 digits' : 'is not ERC20 or does not have 8 digits'));
		$output->writeln('<error>' . $btc->getName() . ' - ' . ($spec->isSatisfiedBy($btc) ? 'is ERC20 and has 8 digits' : 'is not ERC20 or does not have 8 digits'));
		$output->writeln('<error>' . $xrp->getName() . ' - ' . ($spec->isSatisfiedBy($xrp) ? 'is ERC20 and has 8 digits' : 'is not ERC20 or does not have 8 digits'));

		return Command::SUCCESS;
	}

}
