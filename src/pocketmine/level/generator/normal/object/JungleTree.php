<?php



namespace pocketmine\level\generator\normal\object;

use pocketmine\block\Block;
use pocketmine\block\Leaves;
use pocketmine\block\Wood;

class JungleTree extends Tree{

	public function __construct(){
		$this->trunkBlock = Block::LOG;
		$this->leafBlock = Block::LEAVES;
		$this->leafType = Leaves::JUNGLE;
		$this->type = Wood::JUNGLE;
		$this->treeHeight = 8;
	}
}