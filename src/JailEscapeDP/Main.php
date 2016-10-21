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
	    
	    'xp1' => 0,
	    'yp1' => 0,
	    'zp1' => 0,
	    'xp2' => 0,
	    'yp2' => 0,
	    'zp2' => 0,
	    'xp3' => 0,
	    'yp3' => 0,
	    'zp3' => 0,
	    'xc1' => 0,
	    'yc1' => 0,
	    'zc1' => 0,
	    'xc2' => 0,
	    'yc2' => 0,
	    'zc2' => 0,
	    'xc3' => 0,
	    'yc3' => 0,
	    'zc3' => 0,
	    'xc4' => 0,
	    'yc4' => 0,
	    'zc4' => 0,
    ];
    $cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, $pos);
    $cfg->save();
  }
}
