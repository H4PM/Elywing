<?php

namespace pocketmine\item;

use pocketmine\item\Item;

class EyeOfEnder extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::ENDER_EYE, 0, $count, "Eye of Ender");
	}

	public function getMaxStackSize() : int {
		return 64;
	}
}
