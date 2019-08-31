<?php

namespace Clik\MGCore;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat as TF;

use pocketmine\level\Position;

use pocketmine\inventory\PlayerInventory;
use pocketmine\inventory\ArmorInventory;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;

use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase implements Listener{

public $fts = "§7[§6Orion§7] ";

public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $event->setJoinMessage("§0• §7[§b+§7]§f". $name);
        $player->getInventory()->clearAll();
        $player->getArmorInventory()->clearAll();
        $level = $this->getServer()->getLevelByName("world");
        $x = 24;
        $y = 69;
        $z = -21;
        $pos = new Position($x, $y, $z, $level);
        $player->teleport($pos);
    }
    public function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $event->setQuitMessage("§0• §7[§b-§7]§f" . $name);
        $player->getInventory()->clearAll();
        $player->getArmorInventory()->clearAll();
    }
    public function onDeath(PlayerDeathEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $event->setDeathMessage("§0• §7[§4X§7]§f" . $name);
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if($cmd->getName() == "gmc") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.gmc.use")) {
                    $sender->setGamemode(1);
                    $sender->sendMessage($this->fts . TF::GREEN . "Your gamemode has been set to creative!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");    
                }
            }
        }
        if($cmd->getName() == "gms") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.gms.use")) {
                    $sender->setGamemode(0);
                    $sender->sendMessage($this->fts . TF::GREEN . "Your gamemode has been set to Survival!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
                }
            }
        }
        if($cmd->getName() == "gma") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.gma.use")) {
                    $sender->setGamemode(2);
                    $sender->sendMessage($this->fts . TF::GREEN . "Your gamemode has been set to Adventure!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
                }
            }
        }
        if($cmd->getName() == "gmspc") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.gmspc.use")) {
                    $sender->setGamemode(3);
                    $sender->sendMessage($this->fts . TF::GREEN . "Your gamemode has been set to Spectator!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
                }
            }
        }
        if($cmd->getName() == "day") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.day.use")) {
                    $sender->getLevel()->setTime(6000);
                    $sender->sendMessage($this->fts . TF::GREEN . "Set the time to Day (6000) in your world!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
                }
            }
        }
        if($cmd->getName() == "night") {
            if($sender instanceof Player) {
                if($sender->hasPermission("orioncore.night.use")) {
                    $sender->getLevel()->setTime(16000);
                    $sender->sendMessage($this->fts . TF::GREEN . "Set the time to Night (16000) in your world!");
                } else {
                    $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
                }
            }
        }
        if($cmd->getName() == "hub") {
            if($sender instanceof Player) {
                $sender->getInventory()->clearAll();
                $sender->getArmorInventory()->clearAll();
                $level = $this->getServer()->getLevelByName("world");
                $x = 24;
                $y = 69;
                $z = -21;
                $pos = new Position($x, $y, $z, $level);
                $sender->teleport($pos);
                $sender->sendMessage($this->fts . TF::GOLD . "Teleported to Hub");
                $sender->setGamemode(0);
            } else {
                $sender->sendMessage($this->fts . TF::RED . "An error has occurred. Please contact Jes'kad Ad'aryc#3845 on Discord to report this");
            }
        }
        if($cmd->getName() == "rules") {
            if($sender instanceof Player) {
                $sender->sendMessage("§6§o§lOrion Minigames Rules§r");
                $sender->sendMessage("§f- §eNo Advertising");
                $sender->sendMessage("§f- §eNo NSFW");
                $sender->sendMessage("§f- §eNo cursing. (Censoring words is allowed.)");
                $sender->sendMessage("§f- §eNo asking for OP/Ranks/Perms");
                $sender->sendMessage("§f- §eUse Common Sense. Failure to do so will not exempt you from punishment.");
            }
        }
        if($cmd->getName() == "info") {
            if($sender instanceof Player) {
                $sender->sendMessage("§6§o§lOrion Minigames Info§r");
                $sender->sendMessage("§eOrion Minigames is a holdout server for the remnants");
                $sender->sendMessage("§of JM Pocket Creative, Nebula Games, & FruityMCPE.");
                $sender->sendMessage("§eThe Main Owner is Switchblade304, although Jes'kad Ad'aryc does a lot of the work");
                $sender->sendMessage("§eThe server is technically collectively owned by Jes'kad, Switchblade, Noah, and Celery.");
                $sender->sendMessage("§eDiscord Link: https://discord.gg/ECGhkJc");
            }
        }
    return true;
    }
}
