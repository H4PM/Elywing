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

namespace pocketmine\updater;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\utils\VersionString;

class AutoUpdater{

	/** @var Server */
	protected $server;
	protected $endpoint;
	protected $hasUpdate = false;
	protected $updateInfo = null;

	public function __construct(Server $server, $endpoint){
		$this->server = $server;
		$this->endpoint = "http://$endpoint/api/";

		if($server->getProperty("auto-updater.enabled", true)){
			$this->check();
			if($this->hasUpdate()){
				if($this->server->getProperty("auto-updater.on-update.warn-console", true)){
					$this->showConsoleUpdate();
				}
			}elseif($this->server->getProperty("auto-updater.preferred-channel", true)){
				$version = new VersionString();
				if(!$version->isDev() and $this->getChannel() !== "stable"){
					$this->showChannelSuggestionStable();
				}elseif($version->isDev() and $this->getChannel() === "stable"){
					$this->showChannelSuggestionBeta();
				}
			}
		}
	}

	protected function check(){
		$response = Utils::getURL($this->endpoint . "?channel=" . $this->getChannel(), 4);
		$response = json_decode($response, true);
		if(!is_array($response)){
			return;
		}

		$this->updateInfo = [
			"version" => $response["version"],
			"api_version" => $response["api_version"],
			"build" => $response["build"],
			"date" => $response["date"],
			"details_url" => isset($response["details_url"]) ? $response["details_url"] : null,
			"download_url" => $response["download_url"]
		];

		$this->checkUpdate();
	}

	/**
	 * @return bool
	 */
	public function hasUpdate(){
		return $this->hasUpdate;
	}

	public function showConsoleUpdate(){
		$logger = $this->server->getLogger();
		$newVersion = new VersionString($this->updateInfo["version"]);
		$logger->warning("§3----- §bElywing Auto Updater §3-----§r");
		$logger->warning("§3Your version of PocketMine-MP is out of date. Version §b" . $newVersion->get(false) . " (build #" . $newVersion->getBuild() . ") §3was released on " . date("D M j h:i:s Y", $this->updateInfo["date"]) . "§r");
		if($this->updateInfo["details_url"] !== null){
			$logger->warning("§3Details: §b" . $this->updateInfo["details_url"] . "§r");
		}
		$logger->warning("§3Download: §b" . $this->updateInfo["download_url"] . "§r");
		$logger->warning("§3----- -------------------------- -----§r");
	}

	public function showPlayerUpdate(Player $player){
		$player->sendMessage(TextFormat::DARK_PURPLE . "§3The version of §bElywing §3that this server is running is out of date. Please consider updating to the latest version.§r");
		$player->sendMessage(TextFormat::DARK_PURPLE . "§3Check the console for more details.§r");
	}

	protected function showChannelSuggestionStable(){
		$logger = $this->server->getLogger();
		$logger->info("§3----- §bElywing Auto Updater §3-----§r");
		$logger->info("§3It appears you're running a Stable build, when you've specified that you prefer to run §b" . ucfirst($this->getChannel()) . " §rbuilds.§r");
		$logger->info("§3If you would like to be kept informed about new Stable builds only, it is recommended that you change §b'preferred-channel'§3 in your §bpocketmine.yml to 'stable'.§r");
		$logger->info("§3----- -------------------------- -----§r");
	}

	protected function showChannelSuggestionBeta(){
		$logger = $this->server->getLogger();
		$logger->info("§3----- §bElywing Auto Updater §3-----§r");
		$logger->info("§3It appears you're running a Beta build, when you've specified that you prefer to run Stable builds.");
		$logger->info("§3If you would like to be kept informed about new Beta or Development builds, it is recommended that you change §b'preferred-channel'§3 in your §bpocketmine.yml§3 to 'beta' or 'development'.§r");
		$logger->info("§3----- -------------------------- -----§r");
	}

	public function getUpdateInfo(){
		return $this->updateInfo;
	}

	public function doCheck(){
		$this->check();
	}

	protected function checkUpdate(){
		if($this->updateInfo === null){
			return;
		}
		$currentVersion = new VersionString($this->server->getPocketMineVersion());
		$newVersion = new VersionString($this->updateInfo["version"]);

		if($currentVersion->compare($newVersion) > 0 and ($currentVersion->get() !== $newVersion->get() or $currentVersion->getBuild() > 0)){
			$this->hasUpdate = true;
		}else{
			$this->hasUpdate = false;
		}

	}

	public function getChannel(){
		$channel = strtolower($this->server->getProperty("auto-updater.preferred-channel", "stable"));
		if($channel !== "stable" and $channel !== "beta" and $channel !== "development"){
			$channel = "stable";
		}

		return $channel;
	}
}