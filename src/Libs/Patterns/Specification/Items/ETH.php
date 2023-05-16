<?php

namespace App\Libs\Patterns\Specification\Items;

class ETH implements Cryptocurrency {

	public function getName(): string {
		return 'ETH';
	}

	public function getNetwork(): string {
		return self::NETWORK_ERC20;
	}

	public function getDecimals(): int {
		return 18;
	}
}