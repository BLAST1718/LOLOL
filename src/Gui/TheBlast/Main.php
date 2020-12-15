<?php

namespace Gui\TheBlast;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("Transfer Gui Enabled made by TheBlast");
		if(!InvMenuHandler::isRegistered()){
			InvMenuHandler::register($this);
		}
		$command = new PluginCommand("server", $this);
		$command->setDescription("Open games gui");
		$this->getServer()->getCommandMap()->register("server", $command);
	}

	public function onDisable(){
		$this->getLogger()->info("Transfer Gui disabled made by TheBlast");
	}

	public function onCommand(CommandSender $player, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
			case "server":
				if(!$player instanceof Player){
					$player->sendMessage("Select games");
					return true;
				}
				$this->server($player);
				break;
		}
		return true;
	}

	public function server(Player $player){
		$menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
		$menu->readOnly();
		$menu->setListener(\Closure::fromCallable([$this, "GUIListener"]));
		$menu->setName("Games");
		$menu->send($player);
		$inv = $menu->getInventory();
		$quartz = Item::get(Item::QUARTZ_BLOCK)->setCustomName("Main Lobby");
		$bow = Item::get(Item::BOW)->setCustomName("SkyWars");
                $bed = Item::get(Item::BED)->setCustomName("BedWars");
		$red_concrete = Item::get(Item::CONCRETE, 14)->setCustomName("The Bridge");
		$grass = Item::get(Item::GRASS)->setCustomName("SkyBlock");
		$tnt = Item::get(Item::TNT)->setCustomName("TNT Run");
		$snowball = Item::get(Item::SNOWBALL)->setCustomName("Spleef");
		$soul = Item::get(Item::SOUL_SAND)->setCustomName("UHC");
		$trapdoor = Item::get(Item::WOODEN_TRAPDOOR)->setCustomName("Raft Survival");
		$sword = Item::get(Item::DIAMOND_SWORD)->setCustomName("FFA and More");
		$stone = Item::get(Item::STONE)->setCustomName("Skygrid");
		$inv->setItem(27, $quartz);
		$inv->setItem(11, $bow);
                $inv->setItem(12, $bed);
		$inv->setItem(13, $red_concrete);
		$inv->setItem(14, $grass);
		$inv->setItem(15, $tnt);
		$inv->setItem(16, $snowball);
		$inv->setItem(20, $soul);
		$inv->setItem(21, $trapdoor);
		$inv->setItem(22, $sword);
		$inv->setItem(23, $stone);
		
	}

	public function GUIListener(InvMenuTransaction $action) : InvMenuTransactionResult{
		$itemClicked = $action->getOut();
		$player = $action->getPlayer();
		if($itemClicked->getId() == 155){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transferserver dragoncraft.soutarmc.com 4110");
			return $action->discard();
		}
		if($itemClicked->getId() == 261){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transferserver dragoncraft.soutarmc.com 4111");
			return $action->discard();
		}
                if($itemClicked->getId() == 355){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transferserver dragoncraft.soutarmc.com 4113");
			return $action->discard();
		}
		if($itemClicked->getId() == 159 && $itemClicked->getDamage() === 14){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transferserver dragoncraft.soutarmc.com 4112");
			return $action->discard();
		}
		if($itemClicked->getId() == 2){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 46){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == "276"){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 88){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 332){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 96){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 1){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this gamemode is not available yet");
		  return $action->discard();
		}
		return $action->discard();
	}
}
