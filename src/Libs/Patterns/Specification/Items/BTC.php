<?php

namespace App\Libs\Patterns\Specification\Items;

class BTC implements Cryptocurrency {

	public function getName(): string {
		return 'BTC';
	}

	public function getNetwork(): string {
		return self::NETWORK_BITCOIN;
	}

	public function getDigits(): int {
		return 8;
	}
}