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
		$command = new PluginCommand("games", $this);
		$command->setDescription("Open games gui");
		$this->getServer()->getCommandMap()->register("games", $command);
	}

	public function onDisable(){
		$this->getLogger()->info("Transfer Gui disabled made by TheBlast");
	}

	public function onCommand(CommandSender $player, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
			case "games":
				if(!$player instanceof Player){
					$player->sendMessage("Select a games");
					return true;
				}
				$this->tgui($player);
				break;
		}
		return true;
	}

	public function tgui(Player $player){
		$menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
		$menu->readOnly();
		$menu->setListener(\Closure::fromCallable([$this, "GUIListener"]));
		$menu->setName("Games");
		$menu->send($player);
		$inv = $menu->getInventory();
		$lobby = Item::get(Item::BOOKSHELF)->setCustomName("Main Lobby");
		$bow = Item::get(Item::BOW)->setCustomName("SkyWars");
    $bed = Item::get(Item::BED)->setCustomName("BedWars");
		$clay = Item::get(Item::CLAY)->setCustomName("The Bridge");
		$grass = Item::get(Item::GRASS)->setCustomName("SkyBlock");
		$tnt = Item::get(Item::TNT)->setCustomName("TNT Run");
		$apple = Item::get(Item::ENCHANTED_GOLDEN_APPLE)->setCustomName("PVP");
		$anvil = Item::get(Item::ANVIL)->setCustomName("UHC");
		$feather = Item::get(Item::FEATHER)->setCustomName("MLG Block");
		$sword = Item::get(Item::DIAMOND_SWORD)->setCustomName("Survival Games");
		$book = Item::get(Item::BOOK)->setCustomName("Munder Mystery");
		$inv->setItem(4, $lobby);
		$inv->setItem(19, $bow);
    $inv->setItem(21, $bed);
		$inv->setItem(23, $clay);
		$inv->setItem(25, $grass);
		$inv->setItem(28, $tnt);
		$inv->setItem(30, $apple);
		$inv->setItem(32, $anvil);
		$inv->setItem(34, $feather);
		$inv->setItem(37, $sword);
		$inv->setItem(39, $book);
		
	}

	public function GUIListener(InvMenuTransaction $action) : InvMenuTransactionResult{
		$itemClicked = $action->getOut();
		$player = $action->getPlayer();
		if($itemClicked->getId() == 47){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transfer main");
			return $action->discard();
		}
		if($itemClicked->getId() == 261){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transfer skywars");
			return $action->discard();
		}
        if($itemClicked->getId() == 355){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transfer bedwars");
			return $action->discard();
		}
		if($itemClicked->getCustomName() == "The Bridge"){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "transfer tb");
			return $action->discard();
		}
		if($itemClicked->getId() == 2){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer skyblock");
		  return $action->discard();
		}
		if($itemClicked->getId() == 46){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer tnt");
		  return $action->discard();
		}
		if($itemClicked->getCustomName() == "PVP"){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer pvp");
		  return $action->discard();
		}
		if($itemClicked->getId() == 145){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer uhc");
		  return $action->discard();
		}
		if($itemClicked->getId() == 288){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer mlg");
		  return $action->discard();
		}
		if($itemClicked->getId() == 276){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer sg");
		  return $action->discard();
		}
		if($itemClicked->getId() == 340){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "transfer munder");
		  return $action->discard();
		}
		return $action->discard();
	}
}