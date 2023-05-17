<?php

namespace App\Libs\Patterns\Specification\Composite;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsNetworkSpecification implements Specification {

	public function __construct(protected string $network) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getCryptocurrencyNetwork() === $this->network;
	}

}
