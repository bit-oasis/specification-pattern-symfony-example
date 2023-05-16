<?php

namespace App\Libs\Patterns\Specification\HardCoded;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
interface Specification {

	/**
	 * @return bool
	 */
	public function isSatisfied(): bool;

}
