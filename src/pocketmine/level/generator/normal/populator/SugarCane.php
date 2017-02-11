<?php

/*
 *
 *    _______                                _
 *   |__   __|                              | |
 *      | | ___  ___ ___  ___ _ __ __ _  ___| |_
 *      | |/ _ \/ __/ __|/ _ \  __/ _` |/ __| __|
 *      | |  __/\__ \__ \  __/ | | (_| | (__| |_
 *      |_|\___||___/___/\___|_|  \__,_|\___|\__|
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Tessetact Team
 * @link http://www.github.com/TesseractTeam/Tesseract
 * 
 *
 */


namespace pocketmine\level\generator\normal\populator;

use pocketmine\block\Block;
use pocketmine\level\ChunkManager;
use pocketmine\level\generator\normal\object\SugarCaneStack;
use pocketmine\level\generator\populator\VariableAmountPopulator;
use pocketmine\utils\Random;

class SugarCane extends VariableAmountPopulator{
	/** @var ChunkManager */
	private $level;
	protected $randomAmount = 10;
	protected $baseAmount = 1;

	public function populate(ChunkManager $level, $chunkX, $chunkZ, Random $random){
		$this->level = $level;
		$canes = new SugarCaneStack($random);
		$successfulClusterCount = 0;
		for($count = 0; $count < $this->randomAmount; $count++){
			$x = $random->nextRange($chunkX * 16, $chunkX * 16 + 15);
			$z = $random->nextRange($chunkZ * 16, $chunkZ * 16 + 15);
			$y = $this->getHighestWorkableBlock($x, $z);
			if($y == -1 or !$canes->canPlaceObject($level, $x, $y, $z)){
				continue;
			}
			$successfulClusterCount++;
			$canes->randomize();
			$canes->placeObject($level, $x, $y, $z);
			for($placed = 1; $placed < 4; $placed++){
				$xx = $x - 3 + $random->nextBoundedInt(7);
				$zz = $z - 3 + $random->nextBoundedInt(7);
				$canes->randomize();
				if($canes->canPlaceObject($level, $xx, $y, $zz)){
					$canes->placeObject($level, $xx, $y, $zz);
				}
			}
			if($successfulClusterCount >= $this->baseAmount){
				return;
			}
		}
	}

	private function getHighestWorkableBlock($x, $z){
		for($y = 127; $y >= 0; --$y){
			$b = $this->level->getBlockIdAt($x, $y, $z);
			if($b !== Block::AIR and $b !== Block::LEAVES and $b !== Block::LEAVES2){
				break;
			}
		}

		return $y === 0 ? -1 : ++$y;
	}
}