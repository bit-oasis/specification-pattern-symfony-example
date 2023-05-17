<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class Has8DecimalsSpecificationWithContext implements SpecificationWithContext {

	public function isSatisfiedBy(SpecificationContext $context): bool {
		return $context->getDigits() === 8;
	}

}
