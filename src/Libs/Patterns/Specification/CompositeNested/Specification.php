<?php

namespace App\Libs\Patterns\Specification\CompositeNested;

use App\Libs\Patterns\Specification\CompositeNested\Logical\AllSpecification;
use App\Libs\Patterns\Specification\CompositeNested\Logical\AnySpecification;
use App\Libs\Patterns\Specification\CompositeNested\Logical\NotSpecification;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
abstract class Specification {

	abstract public  function isSatisfiedBy(SpecificationContext $specificationContext): bool;

	public function and(Specification $otherSpecification): Specification {
		return new AllSpecification([$this, $otherSpecification]);
	}

	public function or(Specification $otherSpecification): Specification {
		return new AnySpecification([$this, $otherSpecification]);
	}

	public function not(): Specification {
		return new NotSpecification($this);
	}
}
