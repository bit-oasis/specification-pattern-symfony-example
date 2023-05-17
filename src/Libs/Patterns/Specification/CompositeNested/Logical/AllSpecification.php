<?php

namespace App\Libs\Patterns\Specification\CompositeNested\Logical;

use App\Libs\Patterns\Specification\CompositeNested\Specification;
use App\Libs\Patterns\Specification\CompositeNested\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class AllSpecification extends Specification {

	/**
	 * @param Specification[] $specifications
	 */
	public function __construct(protected array $specifications) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		foreach ($this->specifications as $specification) {
			if (!$specification->isSatisfiedBy($specificationContext)) {
				return false;
			}
		}

		return true;
	}

}
