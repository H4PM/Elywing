<?php

namespace pocketmine\item;

use pocketmine\item\Item;

class EnderPearl extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::ENDERPEARL, 0, $count, "Ender Pearl");
	}

	public function getMaxStackSize() : int {
		return 16;
	}
}
