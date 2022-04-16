<?php

namespace corentin503\Commands;

use corentin503\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Kickall extends Command
{
    private $plugin;

    public function __construct(Main $main)
    {
        $this->plugin = $main;
        parent::__construct("kickall", "Permet de kick tout les joueurs du serveur", "/kickall", ["degageall"]);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $allplayer = $this->plugin->getServer()->getOnlinePlayers();
        if ($sender->hasPermission("kickall.use")){
            if ($allplayer >= 0) {
                foreach ($allplayer as $player){
                    $player->kick(implode(" ", $args), true);
                }
            } else {
                $sender->sendMessage("§cIl n'y a aucun joueur a kick");
            }
        } else {
            $sender->sendMessage("§cVous n'avez pas la permission (kickall.use) d'utiliser cette commande ");
        }

    }
}