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
use pocketmine\item\enchantment\enchantment;

class ChorusPlant extends Crops
{

    protected $id = self::CHORUS_PLANT;

    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }

    public function getHardness()
    {
        return 0.4;
    }

    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }

    public function getName()
    {
        return "Chorus Plant";
    }

    public function getDrops(Item $item): array
    {
        $drops = [];
        if ($this->meta >= 0x07) {
            $fortunel = $item->getEnchantmentLevel(Enchantment::TYPE_MINING_FORTUNE);
            $fortunel = $fortunel > 3 ? 3 : $fortunel;
            $drops[] = [Item::CHORUS_FRUIT, 0, 1];
        }
        return $drops;
    }
}
