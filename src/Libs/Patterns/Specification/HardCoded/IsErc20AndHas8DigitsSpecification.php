<?php

namespace App\Libs\Patterns\Specification\HardCoded;

use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsErc20AndHas8DigitsSpecification implements Specification {

	public function isSatisfiedBy(Cryptocurrency $cryptocurrency): bool {
		return $cryptocurrency->getNetwork() === 'ERC20' && $cryptocurrency->getDigits() === 8;
	}

}