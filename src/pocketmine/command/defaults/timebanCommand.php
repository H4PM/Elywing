<?php
/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/
namespace pocketmine\command\defaults;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
class TimebanCommand extends VanillaCommand{
	public function __construct($name){
		parent::__construct(
			$name,
			"%pocketmine.command.timeban.description",
			"%pocketmine.command.timeban.usage"
		);
		$this->setPermission("pocketmine.command.timeban.use");
	}
	public function execute(CommandSender $sender, $currentAlias, array $args){
	  //WARNING: THIS CODE IS NOT ENDED!
		
		if(!$this->testPermission($sender)){
			return true;
		}
		if(count($args) != 3){
			$sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));
			return false;
		} else {
		
		$player = $sender->getServer()->getPlayer($args[0]);
		$reason = $args[1];
		$time = $args[2];
			//TODO: Verify if user exist and added ban with time ;)
		$sender->getServer()->broadcastMessage(new TranslationContainer(TextFormat::RED . "%commands.generic.timeban.success"));
		}
			
		return true;
	}
}
