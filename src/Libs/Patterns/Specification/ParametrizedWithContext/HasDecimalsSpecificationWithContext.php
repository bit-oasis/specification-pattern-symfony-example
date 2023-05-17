<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class HasDecimalsSpecificationWithContext implements SpecificationWithContext {

	public function __construct(protected int $digits) {}

	public function isSatisfiedBy(SpecificationContext $context): bool {
		return $context->getDigits() === $this->digits;
	}

}
