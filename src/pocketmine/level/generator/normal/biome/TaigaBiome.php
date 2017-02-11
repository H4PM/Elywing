<?php



namespace pocketmine\level\generator\normal\biome;

use pocketmine\block\Sapling;
use pocketmine\block\Block;
use pocketmine\level\generator\normal\populator\MossStone;
use pocketmine\level\generator\normal\populator\Mushroom;
use pocketmine\level\generator\normal\populator\Tree;

class TaigaBiome extends SnowyBiome{

	public function __construct(){
		parent::__construct();

		$trees = new Tree(Sapling::SPRUCE);
		$trees->setBaseAmount(10);
		$this->addPopulator($trees);
		$mossStone = new MossStone();
		$mossStone->setBaseAmount(1);

		$this->addPopulator($mossStone);

		$mushroom = new Mushroom();
		$this->addPopulator($mushroom);

		$this->setElevation(63, 83);

		$this->temperature = 0.05;
		$this->rainfall = 0.8;

		$this->setGroundCover([
			Block::get(Block::PODZOL, 0),
			Block::get(Block::DIRT, 0),
			Block::get(Block::DIRT, 0),
			Block::get(Block::DIRT, 0)
		]);
	}

	public function getName() : string{
		return "Taiga";
	}
}
