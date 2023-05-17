<?php

namespace App\Libs\Patterns\Specification\Items;

class ETC implements Cryptocurrency {

	public function getName(): string {
		return 'ETC';
	}

	public function getNetwork(): string {
		return self::NETWORK_ERC20;
	}

	public function getDigits(): int {
		return 18;
	}
}