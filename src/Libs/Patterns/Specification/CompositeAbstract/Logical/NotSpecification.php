<?php

namespace App\Libs\Patterns\Specification\CompositeAbstract\Logical;

use App\Libs\Patterns\Specification\CompositeAbstract\Specification;
use App\Libs\Patterns\Specification\CompositeAbstract\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class NotSpecification extends Specification {

	public function __construct(protected Specification $specification) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return !$this->specification->isSatisfiedBy($specificationContext);
	}
}