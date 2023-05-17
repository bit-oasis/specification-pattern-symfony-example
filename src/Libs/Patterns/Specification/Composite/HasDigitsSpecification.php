<?php

namespace App\Libs\Patterns\Specification\Composite;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class HasDigitsSpecification implements Specification {

	public function __construct(protected int $digits) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getDigits() === $this->digits;
	}

}
