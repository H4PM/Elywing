<?php

/*
 *       ____          
 * 	|  __|_              _
 * 	| |__| |      _    _(_)_ __   ___
 * 	|  __| |_   _| |  | | | '_ \ / _ \
 * 	| |__| | | | | |/\| | | | | | (_) |
 * 	|____|_|\ \/ \__/\__/_|_| |_|\___ |
 * 	        _|  /		      __| |
 * 	       |___/		     |____/
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
namespace pocketmine\inventory;

use pocketmine\level\Position;
use pocketmine\Player;

class BeaconInventory extends ContainerInventory{
	public function __construct(Position $pos){
		parent::__construct(new FakeBlockMenu($this, $pos), InventoryType::get(InventoryType::BEACON));
	}

	/**
	 * @return FakeBlockMenu
	 */
	public function getHolder(){
		return $this->holder;
	}

	public function onOpen(Player $who){
		parent::onOpen($who);
	}
}
