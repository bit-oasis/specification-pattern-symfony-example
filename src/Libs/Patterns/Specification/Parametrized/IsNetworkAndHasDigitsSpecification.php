<?php

namespace App\Libs\Patterns\Specification\Parametrized;

use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsNetworkAndHasDigitsSpecification implements Specification {

	public function __construct(protected string $network, protected int $digits) {}

	public function isSatisfiedBy(Cryptocurrency $cryptocurrency): bool {
		return $cryptocurrency->getNetwork() === $this->network && $cryptocurrency->getDigits() === $this->digits;
	}

}