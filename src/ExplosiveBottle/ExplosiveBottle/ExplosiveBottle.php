<?php

namespace ExplosiveBottle\ExplosiveBottle;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\entity\ThrownExpBottle;
use pocketmine\Level;
use pocketmine\level\Explosion;
use pocketmine\level\Position;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitEvent;

class ExplosiveBottle extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::GREEN."ExplosiveBottle Enabled!");
	}
	public function onDisable() {
		$this->getLogger()->info(TextFormat::RED."ExplosiveBottle Disabled!");
	}
	public function onProjectileHit(ProjectileHitEvent $event) {
		$entity = $event->getEntity();
		if ($entity instanceof ThrownExpBottle) {
			$theX = $entity->getX();
			$theY = $entity->getY();
			$theZ = $entity->getZ();
			$level = $entity->getLevel();
			$thePosition = new Position($theX, $theY, $theZ, $level);
			$theExplosion = new Explosion($thePosition, 5, NULL);
			$theExplosion->explode();
            $explosion->explodeB();
			$level->remove($entity);
		}
	}
}
