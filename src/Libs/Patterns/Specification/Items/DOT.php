<?php

namespace App\Libs\Patterns\Specification\Items;

class DOT implements Cryptocurrency {

	public function getName(): string {
		return 'DOT';
	}

	public function getNetwork(): string {
		return self::NETWORK_DOT;
	}

	public function getDecimals(): int {
		return 10;
	}
}
