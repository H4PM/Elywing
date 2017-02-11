<?php



namespace pocketmine\level\generator\nether\populator;

use pocketmine\block\Block;
use pocketmine\level\ChunkManager;
use pocketmine\level\generator\populator\VariableAmountPopulator;
use pocketmine\utils\Random;

class GroundFire extends VariableAmountPopulator{
	/** @var ChunkManager */
	private $level;
	
	public function populate(ChunkManager $level, $chunkX, $chunkZ, Random $random){
		$this->level = $level;
		$amount = $this->getAmount($random);
		for($i = 0; $i < $amount; ++$i){
			$x = $random->nextRange($chunkX * 16, $chunkX * 16 + 15);
			$z = $random->nextRange($chunkZ * 16, $chunkZ * 16 + 15);
			$y = $this->getHighestWorkableBlock($x, $z);
			if($y !== -1 and $this->canGroundFireStay($x, $y, $z)){
				$this->level->setBlockIdAt($x, $y, $z, Block::FIRE);
				$this->level->updateBlockLight($x, $y, $z);
			}
		}
	}

	private function canGroundFireStay($x, $y, $z){
		$b = $this->level->getBlockIdAt($x, $y, $z);
		return ($b === Block::AIR or $b === Block::SNOW_LAYER) and $this->level->getBlockIdAt($x, $y - 1, $z) === 87;
	}

	private function getHighestWorkableBlock($x, $z){
		for($y = 0; $y <= 127; ++$y){
			$b = $this->level->getBlockIdAt($x, $y, $z);
			if($b == Block::AIR){
				break;
			}
		}

		return $y === 0 ? -1 : $y;
	}
}