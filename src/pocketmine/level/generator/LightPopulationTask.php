<?php



namespace pocketmine\level\generator;

use pocketmine\level\format\Chunk;
use pocketmine\level\Level;

use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;


class LightPopulationTask extends AsyncTask{

	public $levelId;
	public $chunk;

	public function __construct(Level $level, Chunk $chunk){
		$this->levelId = $level->getId();
		$this->chunk = $chunk->fastSerialize();
	}

	public function onRun(){
		/** @var Chunk $chunk */
		$chunk = Chunk::fastDeserialize($this->chunk);
		if($chunk === null){
			//TODO error
			return;
		}

		$chunk->recalculateHeightMap();
		$chunk->populateSkyLight();
		$chunk->setLightPopulated();

		$this->chunk = $chunk->fastSerialize();
	}

	public function onCompletion(Server $server){
		$level = $server->getLevel($this->levelId);
		if($level !== null){
			/** @var Chunk $chunk */
			$chunk = Chunk::fastDeserialize($this->chunk, $level->getProvider());
			if($chunk === null){
				//TODO error
				return;
			}
			$level->generateChunkCallback($chunk->getX(), $chunk->getZ(), $chunk);
		}
	}
}
