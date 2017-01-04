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
 * @author erkam2002
 * @link http://www.github.net/H4PM
 * 
 *
*/
namespace pocketmine\block;
use pocketmine\item\Tool;
class PurpurStairs extends Stair{
	protected $id = self::PURPUR_STAIRS;
	public function __construct($meta = 0){
		$this->meta = $meta;
	}
	public function getHardness() {
		return 0.8;
	}
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}
	public function getName(){
		return "Purpur Stairs";
	}
}
