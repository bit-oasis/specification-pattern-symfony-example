<?php

namespace App\Libs\Patterns\Specification\CompositeAbstract;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsNetworkSpecification extends Specification {

	public function __construct(protected string $network) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getCryptocurrencyNetwork() === $this->network;
	}

}
