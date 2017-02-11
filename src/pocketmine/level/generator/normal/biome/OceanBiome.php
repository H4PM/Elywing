<?php



namespace pocketmine\level\generator\normal\biome;

use pocketmine\level\generator\normal\populator\Mushroom;
use pocketmine\level\generator\normal\populator\SugarCane;
use pocketmine\level\generator\normal\populator\TallGrass;

class OceanBiome extends WateryBiome{

	public function __construct(){
		parent::__construct();

		$sugarcane = new SugarCane();
		$sugarcane->setBaseAmount(6);
		$tallGrass = new TallGrass();
		$tallGrass->setBaseAmount(5);
		$mushroom = new Mushroom();

		$this->addPopulator($mushroom);
		$this->addPopulator($sugarcane);
		$this->addPopulator($tallGrass);

		$this->setElevation(46, 68);

		$this->temperature = 0.5;
		$this->rainfall = 0.5;
	}

	public function getName() : string{
		return "Ocean";
	}
}
