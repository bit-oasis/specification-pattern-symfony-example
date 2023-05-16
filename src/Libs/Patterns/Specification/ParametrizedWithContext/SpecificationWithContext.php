<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
interface SpecificationWithContext {

	/**
	 * @param SpecificationContext $context
	 * @return bool
	 */
	public function isSatisfiedBy(SpecificationContext $context): bool;

}