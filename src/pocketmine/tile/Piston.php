<?php
namespace pocketmine\tile;

use pocketmine\level\format\FullChunk;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntArrayTag;

class Piston extends Spawnable{

	public function __construct(FullChunk $chunk, CompoundTag $nbt){
		parent::__construct($chunk, $nbt);
	}

	public function saveNBT(){
		parent::saveNBT();
	}

	public function getName(){
		return 'Piston';
	}

	private function setChanged(){
		$this->spawnToAll();
		if($this->chunk instanceof FullChunk){
			$this->chunk->setChanged();
			$this->level->clearChunkCache($this->chunk->getX(), $this->chunk->getZ());
		}
	}

	public function getSpawnCompound(){
		return new CompoundTag("", [
			new StringTag("id", Tile::PISTON),
			new IntTag("x", (int) $this->x),
			new IntTag("y", (int) $this->y),
			new IntTag("z", (int) $this->z),
			new IntTag("pistonPosX", (int) $this->x),
			new IntTag("pistonPosY", (int) $this->y),
			new IntTag("pistonPosZ", (int) $this->z),
			new IntTag("movingEntity", 0),
			new IntTag("IsInitialized", 0),
			new ByteTag("HasFinished", 0),
			new IntTag("movingBlockId", 0),
			new FloatTag("LastProgress", 0.0),
			new FloatTag("NewState", 0.0),
			new ByteTag("Sticky", 0),
			new IntArrayTag("AttachedBlocks", [0]),
			new ByteTag("BreakBlocks", 0),
		]);
	}
}