<?php

namespace App\Libs\Patterns\Specification\Composite;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class Has8DecimalsSpecificationWithContext implements Specification {

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getDecimals() === 8;
	}

}
