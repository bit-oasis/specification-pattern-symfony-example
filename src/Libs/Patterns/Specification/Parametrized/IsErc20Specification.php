<?php

namespace App\Libs\Patterns\Specification\Parametrized;


use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsErc20Specification implements Specification {

	public function isSatisfiedBy(Cryptocurrency $cryptocurrency): bool {
		return $cryptocurrency->getNetwork() === 'ERC20';
	}

}