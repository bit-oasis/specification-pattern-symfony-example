<?php

namespace App\Libs\Patterns\Specification\ParametrizedWithContext;

use App\Libs\Patterns\Specification\Items\Cryptocurrency;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
class SpecificationContext {

	/**
	 * @param Cryptocurrency $cryptocurrency
	 */
	public function __construct(protected Cryptocurrency $cryptocurrency) {}

	/**
	 * @return string
	 */
	public function getCryptocurrencyName(): string {
		return $this->cryptocurrency->getName();
	}

	/**
	 * @return string
	 */
	public function getCryptocurrencyNetwork(): string {
		return $this->cryptocurrency->getNetwork();
	}

	/**
	 * @return int
	 */
	public function getDecimals(): int {
		return $this->cryptocurrency->getDecimals();
	}
}