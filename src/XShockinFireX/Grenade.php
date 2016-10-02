<?php
namespace XShockinFireX\Grenade;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\entity\ThrownExpBottle;
use pocketmine\Level;
use pocketmine\utils\Config;
use pocketmine\level\Explosion;
use pocketmine\level\Position;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitEvent;

class Grenade extends PluginBase implements Listener {
	
    public function onEnable() {
		    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		    $this->getLogger()->info(TextFormat::GREEN. "ExplosiveBottle has been enabled.");
		    $this->saveDefaultConfig();
	  }
	
	  public function onProjectileHit(ProjectileHitEvent $event) {
		    $entity = $event->getEntity();
		    if($entity instanceof ThrownExpBottle) {
			      $pos = new Position($entity->getX(), $entity->getY(), $entity->getZ(), $entity->getLevel());
			      $explosion = new Explosion($pos, $this->getConfig()->get("explode-radius"), NULL, $this->getConfig->get("drop-items"));
			      if($this->getConfig()->get("explode-blocks")) {
				        $explosion->explodeB();
			      } else {
				        $explosion->explodeA();
            }
        }
    }
}
