<?php

namespace corentin503;

use corentin503\Commands\Kickall;
use corentin503\Commands\KillAll;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable(): void
    {
        $this->getLogger()->info("Le plugin c'est bien activé avec succes");
        $this->getServer()->getCommandMap()->register("", new Kickall($this));
        $this->getServer()->getCommandMap()->register("", new KillAll($this));
    }
}