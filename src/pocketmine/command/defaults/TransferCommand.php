<?php

/*
 *
 *  ____          
 * |  __|_              _
 * | |__| |      _    _(_)_ __   ___
 * |  __| |_   _| |  | | | '_ \ / _ \
 * | |__| | | | | |/\| | | | | | (_) |
 * |____|_|\ \/ \__/\__/_|_| |_|\___ |
 *         _|  /                 __| |
 *        |___/                 |____/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author H4PM Team
 * @link http://www.github.net/H4PM
 * 
 *
*/

namespace pocketmine\command\defaults;

use pocketmine\network\protocol\TransferPacket;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\Player;

class TransferCommand extends VanillaCommand{
	
    public function __construct($name){
        parent::__construct(
        $name,
        "%pocketmine.command.transfer.description",
        "%pocketmine.command.transfer.usage",
        ["transfer"]
        );
        $this->setPermission("pocketmine.command.transfer");
    }

    public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
		
        if(!$sender instanceof Player){
            $sender->sendMessage("Run command in-game");
            return;
        }
		
        if(!isset($args[0]) || !isset($args[1])){
            $sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));
            return false;
        }

        $sender->sendMessage("Transferring you to $args[0]".":".$args[1]);
        $pk = new TransferPacket();
        $pk->address = $args[0];
        $pk->port = $args[1];
        $sender->dataPacket($pk);
	}
}
