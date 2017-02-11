<?php



namespace pocketmine\level\particle;

use pocketmine\math\Vector3;

class BlockForceFieldParticle extends GenericParticle{
	public function __construct(Vector3 $pos, int $data = 0){
		parent::__construct($pos, Particle::TYPE_BLOCK_FORCE_FIELD, $data); //TODO: proper encode/decode of data
	}
}
