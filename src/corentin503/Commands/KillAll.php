<?php

namespace corentin503\Commands;

use corentin503\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class KillAll extends Command
{
    private $plugin;

    public function __construct(Main $main)
    {
        $this->plugin = $main;
        parent::__construct("killall", "Permet de kill tout les joueurs du serveur", "/killall", ["tuerall"]);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $allplayer = $this->plugin->getServer()->getOnlinePlayers();
        if ($sender->hasPermission("killall.use")){
            if ($allplayer >= 0) {
                foreach ($allplayer as $player){
                    $player->kill();
                }
            } else {
                $sender->sendMessage("§cIl n'y a aucun joueur a kill");
            }
        } else {
            $sender->sendMessage("§cVous n'avez pas la permission (kill.use) d'utiliser cette commande ");
        }

    }
}