<?php

namespace App\Libs\Patterns\Specification\CompositeAbstract;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class HasDigitsSpecification extends Specification {

	public function __construct(protected int $digits) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $specificationContext->getDigits() === $this->digits;
	}

}
