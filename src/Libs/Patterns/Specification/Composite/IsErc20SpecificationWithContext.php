<?php

namespace App\Libs\Patterns\Specification\Composite;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class IsErc20SpecificationWithContext implements Specification {

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getCryptocurrencyNetwork() === 'ERC20';
	}

}
