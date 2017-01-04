<?php

/*
 *
 *  _____   _____   __   _   _   _____  __    __  _____
 * /  ___| | ____| |  \ | | | | /  ___/ \ \  / / /  ___/
 * | |     | |__   |   \| | | | | |___   \ \/ /  | |___
 * | |  _  |  __|  | |\   | | | \___  \   \  /   \___  \
 * | |_| | | |___  | | \  | | |  ___| |   / /     ___| |
 * \_____/ |_____| |_|  \_| |_| /_____/  /_/     /_____/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */
 
namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\Player;

class Slab2 extends Slab{

	const RED_SANDSTONE = 0;
	const PURPUR_BLOCK = 1;

	protected $id = Block::SLAB2;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		static $names = [
				self::RED_SANDSTONE => "Red Sandstone",
				self::PURPUR_BLOCK => "Purpur Block",
		];
		return (($this->meta & 0x08) > 0 ? "Upper " : "") . $names[$this->meta & 0x07] . " Slab";
	}

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null){
		if($face === 0){
			if($target->getId() === self::SLAB2 and ($target->getDamage() & 0x08) === 0x08){
				$this->getLevel()->setBlock($target, Block::get(Item::DOUBLE_SLAB2, $this->meta), true);

				return true;
			}elseif($block->getId() === self::SLAB2){
				$this->getLevel()->setBlock($block, Block::get(Item::DOUBLE_SLAB2, $this->meta), true);

				return true;
			}else{
				$this->meta |= 0x08;
			}
		}elseif($face === 1){
			if($target->getId() === self::SLAB2 and ($target->getDamage() & 0x08) === 0){
				$this->getLevel()->setBlock($target, Block::get(Item::DOUBLE_SLAB2, $this->meta), true);

				return true;
			}elseif($block->getId() === self::SLAB2){
				$this->getLevel()->setBlock($block, Block::get(Item::DOUBLE_SLAB2, $this->meta), true);

				return true;
			}
			//TODO: check for collision
		}else{
			if($block->getId() === self::SLAB2){
				$this->getLevel()->setBlock($block, Block::get(Item::DOUBLE_SLAB2, $this->meta), true);
			}else{
				if($fy > 0.5){
					$this->meta |= 0x08;
				}
			}
		}
		
		if($block->getId() === self::SLAB2 and ($target->getDamage() & 0x07) !== ($this->meta & 0x07)){
			return false;
		}
		$this->getLevel()->setBlock($block, $this, true, true);

		return true;
	}
}