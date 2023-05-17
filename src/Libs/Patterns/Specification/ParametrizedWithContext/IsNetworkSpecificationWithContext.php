<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsNetworkSpecificationWithContext implements SpecificationWithContext {

	public function __construct(protected string $network) {}

	public function isSatisfiedBy(SpecificationContext $context): bool {
		return $context->getCryptocurrencyNetwork() === $this->network;
	}

}
