<?php



namespace pocketmine\level\generator\normal\biome;

use pocketmine\block\Block;
use pocketmine\block\Flower as FlowerBlock;
use pocketmine\level\generator\normal\populator\Flower;
use pocketmine\level\generator\normal\populator\LilyPad;
use pocketmine\level\generator\normal\populator\Mushroom;
use pocketmine\level\generator\normal\populator\SugarCane;
use pocketmine\level\generator\normal\populator\TallGrass;

class SwampBiome extends GrassyBiome{

	public function __construct(){
		parent::__construct();

		$flower = new Flower();
		$flower->setBaseAmount(8);
		$flower->addType([Block::RED_FLOWER, FlowerBlock::TYPE_BLUE_ORCHID]);

		$lilyPad = new LilyPad();
		$lilyPad->setBaseAmount(4);

		$tallGrass = new TallGrass();
		$tallGrass->setBaseAmount(1);

		$mushroom = new Mushroom();
		$sugarCane = new SugarCane();
		$sugarCane->setBaseAmount(2);
		$sugarCane->setRandomAmount(15);

		$this->addPopulator($mushroom);
		$this->addPopulator($lilyPad);
		$this->addPopulator($flower);
		$this->addPopulator($tallGrass);
		$this->addPopulator($sugarCane);
		$this->setElevation(60, 66);

		$this->temperature = 0.8;
		$this->rainfall = 0.9;
	}

	public function getName() : string{
		return "Swamp";
	}
}