<?php

namespace App\Libs\Patterns\Specification\Composite\Logical;

use App\Libs\Patterns\Specification\Composite\Specification;
use App\Libs\Patterns\Specification\Composite\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class AnySpecification implements Specification {

	/**
	 * @param Specification[] $specifications
	 */
	public function __construct(protected array $specifications) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		foreach ($this->specifications as $specification) {
			if ($specification->isSatisfiedBy($specificationContext)) {
				return true;
			}
		}

		return false;
	}

}
