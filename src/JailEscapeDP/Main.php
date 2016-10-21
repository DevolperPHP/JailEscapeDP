<?php

namespace JailEscapeDP;

use pocketmine\plugin\PluginBase;
use podketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerInteractEvent;
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
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(Color::GREEN."JailEscapeDP By JUZEXMOD is Enabled");
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this),20);
    @mkdir($this->getDataFolder());
    $pos = [
    ];
  }
}
