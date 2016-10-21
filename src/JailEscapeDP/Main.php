<?php

namespace JailEscapeDP;

use pocketmine\plugin\PluginBase;
use podketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\block\Block;
use pocketmine\inventory\InventoryBase;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as Color;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener{
	
	public $minute = 0;
	public $second = 40;
	public $counttype = "down";
	public $time = "on";
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(Color::GREEN."JailEscapeDP By JUZEXMOD is Enabled");
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this),20);
		@mkdir($this->getDataFolder());
		$pos = [
				
				'xp1' => 0,
				'yp1' => 0,
				'zp1' => 0,
				'pworld1' => 'world',
				'xp2' => 0,
				'yp2' => 0,
				'zp2' => 0,
				'pworld2' => 'world',
				'xp3' => 0,
				'yp3' => 0,
				'zp3' => 0,
				'pworld3' => 'world',
				'xc1' => 0,
				'yc1' => 0,
				'zc1' => 0,
				'cworld1' => 'world',
				'xc2' => 0,
				'yc2' => 0,
				'zc2' => 0,
				'cworld2' => 'world',
				'xc3' => 0,
				'yc3' => 0,
				'zc3' => 0,
				'cworld3' => 'world',
				'xc4' => 0,
				'yc4' => 0,
				'zc4' => 0,
				'cworld4' => 'world',
				'xlobby' => 0,
				'ylobby' => 0,
				'zlobby' => 0,
				'lobbyworld' => 'world',
				'xleave' => 0,
				'yleave' => 0,
				'zleave' => 0,
				'leaveworld' => 'world',
		];
		$cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, $pos);
		$cfg->save();
	}
	
	public function onDisable(){
		$this->getConfig()->save();
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case 'jed':
				
				if(isset($args[0])){
					switch($args[0]){
						
						case 'setspawn':
							
							if(isset($args[1])){
								switch($args[1]){
									
									case 'p1':
										$pworld1 = $sender->getLevel()->getName();
										$xp1 = $sender->getFloorX();
										$yp1 = $sender->getFloorY();
										$zp1 = $sender->getFloorZ();
										
										$this->getConfig()->set("xp1", $xp1);
										$this->getConfig()->set("yp1", $yp1);
										$this->getConfig()->set("zp1", $zp1);
										$this->getConfig()->set("pworld1", $pworld1);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Police 1 Spawn Now in [$xp1, $yp1, $zp1]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$pworld1]");
										return true;
										
									case 'p2':
										$pworld2 = $sender->getLevel()->getName();
										$xp2 = $sender->getFloorX();
										$yp2 = $sender->getFloorY();
										$zp2 = $sender->getFloorZ();
										
										$this->getConfig()->set("xp2", $xp2);
										$this->getConfig()->set("yp2", $yp2);
										$this->getConfig()->set("zp2", $zp2);
										$this->getConfig()->set("pworld2", $pworld2);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Police 2 Spawn Now in [$xp2, $yp2, $zp2]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$pworld2]");
										return true;
										
									case 'p3':
										$pworld1 = $sender->getLevel()->getName();
										$xp3 = $sender->getFloorX();
										$yp3 = $sender->getFloorY();
										$zp3 = $sender->getFloorZ();
										
										$this->getConfig()->set("xp3", $xp3);
										$this->getConfig()->set("yp3", $yp3);
										$this->getConfig()->set("zp3", $zp3);
										$this->getConfig()->set("pworld3", $pworld3);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Police 3 Spawn Now in [$xp3, $yp3, $zp3]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$pworld3]");
										return true;
										
									case 'c1':
										$cworld1 = $sender->getLevel()->getName();
										$xc1 = $sender->getFloorX();
										$yc1 = $sender->getFloorY();
										$zc1 = $sender->getFloorZ();
										
										$this->getConfig()->set("xc1", $xc1);
										$this->getConfig()->set("yc1", $yc1);
										$this->getConfig()->set("zc1", $zc1);
										$this->getConfig()->set("cworld1", $cworld1);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Player 1 Spawn Now in [$xc1, $yc1, $zc1]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$cworld1]");
										return true;
										
									case 'c2':
										$cworld2 = $sender->getLevel()->getName();
										$xc2 = $sender->getFloorX();
										$yc2 = $sender->getFloorY();
										$zc2 = $sender->getFloorZ();
										
										$this->getConfig()->set("xc2", $xc2);
										$this->getConfig()->set("yc2", $yc2);
										$this->getConfig()->set("zc2", $zc2);
										$this->getConfig()->set("cworld2", $cworld2);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Player 2 Spawn Now in [$xc2, $yc2, $zc2]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$cworld2]");
										return true;
										
									case 'c3':
										$cworld3 = $sender->getLevel()->getName();
										$xc3 = $sender->getFloorX();
										$yc3 = $sender->getFloorY();
										$zc3 = $sender->getFloorZ();
										
										$this->getConfig()->set("xc3", $xc3);
										$this->getConfig()->set("yc3", $yc3);
										$this->getConfig()->set("zc3", $zc3);
										$this->getConfig()->set("cworld3", $cworld3);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Player 3 Spawn Now in [$xc3, $yc3, $zc3]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$cworld3]");
										return true;
										
									case 'c4':
										$cworld4 = $sender->getLevel()->getName();
										$xc4 = $sender->getFloorX();
										$yc4 = $sender->getFloorY();
										$zc4 = $sender->getFloorZ();
										
										$this->getConfig()->set("xc4", $xc4);
										$this->getConfig()->set("yc4", $yc4);
										$this->getConfig()->set("zc4", $zc4);
										$this->getConfig()->set("cworld4", $cworld4);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Player 4 Spawn Now in [$xc4, $yc4, $zc4]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$cworld4]");
										return true;
								}
							}
							
						case 'set':
							
							if(isset($args[1])){
								switch($args[0]){
									
									case 'lobby':
										$lobbyworld = $sender->getLevel()->getName();
										$xlobby = $sender->getFloorX();
										$ylobby = $sender->getFloorY();
										$zlobby = $sender->getFloorZ();
										
										$this->getConfig()->set("xlobby", $xlobby);
										$this->getConfig()->set("ylobby", $ylobby);
										$this->getConfig()->set("zlobby", $zlobby);
										$this->getConfig()->set("lobbyworld", $lobbyworld);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Lobby Game Now in [$xlobby, $ylobby, $zlobby]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$lobbyworld]");
										return true;
										
									case 'leave':
										$leaveworld = $sender->getLevel()->getName();
										$xleave = $sender->getFloorX();
										$yleave = $sender->getFloorY();
										$zleave = $sender->getFloorZ();
										
										$this->getConfig()->set("xleave", $xleave);
										$this->getConfig()->set("yleave", $yleave);
										$this->getConfig()->set("zleave", $zleave);
										$this->getConfig()->set("leaveworld", $leaveworld);
										
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] Leave Game Now in [$xleave, $yleave, $zleave]");
										$sender->sendMessage(Color::GREEN."[JailEscapeDP] World [$leaveworld]");
										return true;
								}
							}
					}
				}
		}
	}
	
	public function tick(){
		$lobbyworld = $this->getConfig()->get("lobbyworld");
		$all = $this->getServer()->getLevelByName("$lobbyworld")->getPlayers();
		if($this->time == "on"){
			$this->second--;
		}
		
		foreach($all as $p){
			
			if($this->second > 60 && $this->second < 9){
				$p->sendTip($this->minute.":0".$this->second);
			}
			
			if($this->time == "on"){
				if($this->second == 0){
					$this->second = 60;
					$this->minute--;
				}
			}
		}
	}
	
	public function onTouch(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$block = $event->getBlock()->getId();
		$name = $player->getName();
		$ctag = " ";
		$ptag = "[Police]";
		$xp1 = $this->getConfig()->get("xp1");
		$yp1 = $this->getConfig()->get("yp1");
		$zp1 = $this->getConfig()->get("zp1");
		$pworld1 = $this->getConfig()->get("cworld1");
		$xp2 = $this->getConfig()->get("xp2");
		$yp2 = $this->getConfig()->get("yp2");
		$zp2 = $this->getConfig()->get("zp2");
		$pworld2 = $this->getConfig()->get("pworld2");
		$xp3 = $this->getConfig()->get("xp3");
		$yp3 = $this->getConfig()->get("yp3");
		$zp3 = $this->getConfig()->get("zp3");
		$pworld3 = $this->getConfig()->get("pworld3");
		$xc1 = $this->getConfig()->get("xc1");
		$yc1 = $this->getConfig()->get("yc1");
		$zc1 = $this->getConfig()->get("zc1");
		$cworld1 = $this->getConfig()->get("cworld1");
		$xc2 = $this->getConfig()->get("xc2");
		$yc2 = $this->getConfig()->get("yc2");
		$zc2 = $this->getConfig()->get("zc2");
		$cworld2 = $this->getConfig()->get("cworld2");
		$xc3 = $this->getConfig()->get("xc3");
		$yc3 = $this->getConfig()->get("yc3");
		$zc3 = $this->getConfig()->get("zc3");
		$cworld3 = $this->getConfig()->get("cworld3");
		$xc4 = $this->getConfig()->get("xc4");
		$yc4 = $this->getConfig()->get("yc4");
		$zc4 = $this->getConfig()->get("zc4");
		$cworld4 = $this->getConfig()->get("cworld4");
		$xlobby = $this->getConfig()->get("xlobby");
		$ylobby = $this->getConfig()->get("ylobby");
		$zlobby = $this->getConfig()->get("zlobby");
		$worldlobby = $this->getConfig()->get("lobbyworld");
		$xleave = $this->getConfig()->get("xleave");
		$yleave = $this->getConfig()->get("yleave");
		$zleave = $this->getConfig()->get("zleave");
		$worldleave = $this->getConfig()->get("leaveworld");
		
		if($block == 47){
			switch(mt_rand(1,7)){
				case 1:
					$player->teleport($this->getServer()->getLevelbyName("$pworld1")->getSafeSpawn());
					$player->teleport(new position($xp1, $yp1, $zp1));
					$player->setNameTag("$ptag" . $name);
					$player->getInventory()->setHelmet(item::get(306, 0, 1));
					$player->getInventory()->setHelmet(item::get(307, 0, 1));
					$player->getInventory()->setHelmet(item::get(308, 0, 1));
					$player->getInventory()->setHelmet(item::get(309, 0, 1));
					$player->getInventory()->addItem(item::get(267, 0, 1));
					break;
				case 2:
					$player->teleport($this->getServer()->getLevelbyName("$cworld1")->getSafeSpawn());
					$player->teleport(new position($xc1, $yc1, $zc1));
					$player->setNameTag("$ctag");
					$player->getInventory()->addItem(item::get(268, 0, 1));
					break;
				case 3:
					$player->teleport($this->getServer()->getLevelbyName("$pworld2")->getSafeSpawn());
					$player->teleport(new position($xp2, $yp2, $zp2));
					$player->setNameTag("$ptag" . $name);
					$player->getInventory()->setHelmet(item::get(306, 0, 1));
					$player->getInventory()->setHelmet(item::get(307, 0, 1));
					$player->getInventory()->setHelmet(item::get(308, 0, 1));
					$player->getInventory()->setHelmet(item::get(309, 0, 1));
					$player->getInventory()->addItem(item::get(267, 0, 1));
					break;
				case 4:
					$player->teleport($this->getServer()->getLevelbyName("$cworld2")->getSafeSpawn());
					$player->teleport(new position($xc2, $yc2, $zc2));
					$player->setNameTag("$ctag");
					$player->getInventory()->addItem(item::get(268, 0, 1));
					break;
				case 5:
					$player->teleport($this->getServer()->getLevelbyName("$pworld3")->getSafeSpawn());
					$player->teleport(new position($xp3, $yp3, $zp3));
					$player->setNameTag("$ptag" . $name);
					$player->getInventory()->setHelmet(item::get(306, 0, 1));
					$player->getInventory()->setHelmet(item::get(307, 0, 1));
					$player->getInventory()->setHelmet(item::get(308, 0, 1));
					$player->getInventory()->setHelmet(item::get(309, 0, 1));
					$player->getInventory()->addItem(item::get(267, 0, 1));
					break;
				case 6:
					$player->teleport($this->getServer()->getLevelbyName("$cworld3")->getSafeSpawn());
					$player->teleport(new position($xc3, $yc3, $zc3));
					$player->setNameTag("$ctag");
					$player->getInventory()->addItem(item::get(268, 0, 1));
					break;
				case 7:
					$player->teleport($this->getServer()->getLevelbyName("$cworld4")->getSafeSpawn());
					$player->teleport(new position($xc4, $yc4, $zc4));
					$player->setNameTag("$ctag");
					$player->getInventory()->addItem(item::get(268, 0, 1));
					break;
			}
		}
	}
	
	public function onKill(PlayerDeathEvent $event){
		$cause = $event->getEntity()->getLastDamageCause();
		if($cause instanceof EntityDamageByEntityEvent){
			$killer = $cause->getDamager();
			$pworld1 = $this->getConfig()->get("pworld1");
			$xleave = $this->getConfig()->get("xleave");
			$yleave = $this->getConfig()->get("yleave");
			$zleave = $this->getConfig()->get("zleave");
			$leaveworld = $this->getConfig()->get("leaveworld");
			$all = $this->getServer()->getLevelByName("$pworld1")->getPlayers();
			
			foreach($all as $player){
				$player->teleport($this->getServer()->getLevelbyName("$leaveworld")->getSafeSpawn());
				$player->teleport(new position($xleave, $yleave, $zleave));
			}
		}
	}
	
	public function onEntityDamage(EntityDamageEvent $event){
		if ($event instanceof EntityDamageByEntityEvent) {
			if ($event->getEntity() instanceof Player && $event->getDamager() instanceof Player) {
				$golpeado = $event->getEntity()->getNameTag();
				$golpeador = $event->getDamager()->getNameTag();
				if ((strpos($golpeado, " ") !== false) && (strpos($golpeador, " ") !== false)) {
					$event->setCancelled();
				}
	
				else if ((strpos($golpeado, "[Police]") !== false) && (strpos($golpeador, "[Police]") !== false)) {
	
					$event->setCancelled();
				}
			}
	
		}
	}
	
}
