<?php

/*
 *
 *  ____          
 * |  __|_              _
 * | |__| |      _    _(_)_ __   ___
 * |  __| |_   _| |  | | | '_ \ / _ \
 * | |__| | | | | |/\| | | | | | (_) |
 * |____|_|\ \/ \__/\__/_|_| |_|\___ |
 *         _|  /                 __| |
 *        |___/                 |____/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author H4PM Team
 * @link http://www.github.net/H4PM
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\item\Item;


class SeaLanternBlock extends Solid{

	protected $id = self::SEA_LANTERN_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getLightLevel(){
		return 15;
	}

	public function getName() : string{
        return "Sea Lantern Block";
	}

	public function getHardness(){
		return 0.3;
	}

	public function getDrops(Item $item) : array {
		return [
			[Item::PRISMARINE_CRYSTALS, 0, 3],
		];
	}

}