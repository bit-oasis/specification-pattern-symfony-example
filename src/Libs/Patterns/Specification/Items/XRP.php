<?php

namespace App\Libs\Patterns\Specification\Items;

class XRP implements Cryptocurrency {

	public function getName(): string {
		return 'XRP';
	}

	public function getNetwork(): string {
		return self::NETWORK_RIPPLE;
	}

	public function getDecimals(): int {
		return 8;
	}
}