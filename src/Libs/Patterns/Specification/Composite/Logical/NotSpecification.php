<?php

namespace App\Libs\Patterns\Specification\Composite\Logical;

use App\Libs\Patterns\Specification\Composite\Specification;
use App\Libs\Patterns\Specification\Composite\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class NotSpecification implements Specification {

	public function __construct(protected Specification $specification) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return !$this->specification->isSatisfiedBy($specificationContext);
	}
}