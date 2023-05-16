<?php

namespace App\Libs\Patterns\Specification\Composite;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
interface Specification {

	/**
	 * @param SpecificationContext $specificationContext
	 * @return bool
	 */
	public function isSatisfiedBy(SpecificationContext $specificationContext): bool;

}
