<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsErc20SpecificationWithContext implements SpecificationWithContext {

	public function isSatisfiedBy(SpecificationContext $context): bool {
		return $context->getCryptocurrencyNetwork() === 'ERC20';
	}

}
