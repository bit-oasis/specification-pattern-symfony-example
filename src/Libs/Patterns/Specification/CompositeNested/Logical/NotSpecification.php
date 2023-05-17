<?php

namespace App\Libs\Patterns\Specification\CompositeNested\Logical;

use App\Libs\Patterns\Specification\CompositeNested\Specification;
use App\Libs\Patterns\Specification\CompositeNested\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class NotSpecification extends Specification {

	public function __construct(protected Specification $specification) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return !$this->specification->isSatisfiedBy($specificationContext);
	}
}