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
 * @author FunnyBuddys
 * @link http://www.github.net/H4PM
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;

class PurpurBlock extends Solid{

	protected $id = self::PURPUR_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		static $names = [
			0 => "Purpur Block",
			2 => "Purpur Pillar",
		];
		return $names[$this->meta & 0x0f]??"Purpur Block";
	}

	public function getHardness(){
		return 1.5;
	}
	
	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null){
		if($this->meta === 2){
			//Quartz pillar block and chiselled quartz have different orientations
			$faces = [
				0 => 0,
				1 => 0,
				2 => 0b1000,
				3 => 0b1000,
				4 => 0b0100,
				5 => 0b0100,
			];
			$this->meta = ($this->meta & 0x03) | $faces[$face];
		}
		$this->getLevel()->setBlock($block, $this, true, true);
		return true;
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function getDrops(Item $item) : array {
		if($item->isPickaxe() >= Tool::TIER_WOODEN){
			return [
				[$this->id, $this->meta & 0x0f, 1],
			];
		}else{
			return [];
		}
	}
}
