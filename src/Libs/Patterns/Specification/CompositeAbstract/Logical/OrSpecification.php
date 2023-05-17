<?php

namespace App\Libs\Patterns\Specification\CompositeAbstract\Logical;

use App\Libs\Patterns\Specification\CompositeAbstract\Specification;
use App\Libs\Patterns\Specification\CompositeAbstract\SpecificationContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class OrSpecification extends Specification {

	/**
	 * @param Specification $left
	 * @param Specification $right
	 */
	public function __construct(protected Specification $left, protected Specification $right) {}

	public function isSatisfiedBy(SpecificationContext $specificationContext): bool {
		return $this->left->isSatisfiedBy($specificationContext) || $this->right->isSatisfiedBy($specificationContext);
	}

}
