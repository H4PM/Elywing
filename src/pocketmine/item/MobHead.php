<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

namespace pocketmine\item;

use pocketmine\block\Block;

class MobHead extends Item{
	
	const SLOT_NUMBER = 0;
	
	const SKELETON = 0;
	const WITHER_SKELETON = 1;
	const ZOMBIE = 2;
	const STEVE = 3;
	const CREEPER = 4;
	
	static $names = [
		self::SKELETON => "Skeleton Head",
		self::WITHER_SKELETON => "Wither Skeleton Head",
		self::STEVE => "Steve Head",
		self::CREEPER => "Creeper Head",
	];
	
	public function __construct($meta = 0, $count = 1){
		$this->block = Block::get(Block::MOB_HEAD_BLOCK);
		parent::__construct(self::MOB_HEAD, $meta, $count, self::$names[$meta]);
	}
	
	public function getMaxStackSize(){
		return 64;
	}
}