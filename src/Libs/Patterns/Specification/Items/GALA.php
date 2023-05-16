<?php

namespace App\Libs\Patterns\Specification\Items;

class GALA implements Cryptocurrency {

	public function getName(): string {
		return 'GALA';
	}

	public function getNetwork(): string {
		return self::NETWORK_ERC20;
	}

	public function getDecimals(): int {
		return 8;
	}
}