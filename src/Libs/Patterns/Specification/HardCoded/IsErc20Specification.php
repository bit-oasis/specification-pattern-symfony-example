<?php

namespace App\Libs\Patterns\Specification\HardCoded;

use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsErc20Specification implements Specification {

	public function __construct(protected Cryptocurrency $cryptocurrency) {}

	public function isSatisfied(): bool {
		return $this->cryptocurrency->getNetwork() === 'ERC20';
	}

}