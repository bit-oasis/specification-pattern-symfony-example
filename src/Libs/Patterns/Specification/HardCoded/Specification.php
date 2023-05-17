<?php

namespace App\Libs\Patterns\Specification\HardCoded;

use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
interface Specification {

	/**
	 * @param Cryptocurrency $cryptocurrency
	 * @return bool
	 */
	public function isSatisfiedBy(Cryptocurrency $cryptocurrency): bool;

}
