<?php

namespace App\Libs\Patterns\Specification\CompositeAbstract;

use App\Libs\Patterns\Specification\CompositeAbstract\Logical\AndSpecification;
use App\Libs\Patterns\Specification\CompositeAbstract\Logical\OrSpecification;
use App\Libs\Patterns\Specification\CompositeAbstract\Logical\NotSpecification;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
abstract class Specification {

	abstract public  function isSatisfiedBy(SpecificationContext $specificationContext): bool;

	public function and(Specification $otherSpecification): Specification {
		return new AndSpecification($this, $otherSpecification);
	}

	public function or(Specification $otherSpecification): Specification {
		return new OrSpecification($this, $otherSpecification);
	}

	public function not(): Specification {
		return new NotSpecification($this);
	}
}
