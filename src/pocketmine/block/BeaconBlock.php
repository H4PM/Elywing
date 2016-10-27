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

//use pocketmine\inventory\BeaconInventory;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\item\Tool;

class BeaconBlock extends Solid{

	protected $id = self::BEACON_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	/*public function canBeActivated() : bool{
		return true;
	}*/

	public function getLightLevel(){
		return 15;
	}

	public function getHardness(){
		return 3;
	}

	public function getName() : string{
        return "Beacon Block";
	}

	/*public function onActivate(Item $item, Player $player = null){
		if($player instanceof Player){
			$player->addWindow(new BeaconInventory($this));
		}

		return true;
	}*/

}