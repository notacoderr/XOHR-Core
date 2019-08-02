<?php

namespace Clik\MGCore;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\level\Position;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\Server;
use pocketmine\Player;
//add more later if necessary.... i think this is all for rn tho

class Main extends PluginBase implements Listener{

public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
