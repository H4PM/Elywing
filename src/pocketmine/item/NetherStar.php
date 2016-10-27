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

namespace pocketmine\item;


class NetherStar extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::NETHER_STAR, $meta, $count, "Nether Star");
	}
}