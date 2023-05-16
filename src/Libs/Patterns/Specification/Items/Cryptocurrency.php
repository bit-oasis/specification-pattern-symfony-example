<?php

namespace App\Libs\Patterns\Specification\Items;

/**
 * @author Robert Mkrtchyan <mkrtchyanrobert@gmail.com>
 */
interface Cryptocurrency {

	public const NETWORK_ERC20 = 'ERC20';
	public const NETWORK_BITCOIN  = 'BITCOIN';
	public const NETWORK_RIPPLE  = 'RIPPLE';
	public const NETWORK_DOT  = 'DOT';

	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * @return string
	 */
	public function getNetwork(): string;

	/**
	 * @return int
	 */
	public function getDecimals(): int;
}