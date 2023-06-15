<?php

namespace TheZero;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Event;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByChildEntityEvent;
use pocketmine\entity\projectile\Snowball;
use pocketmine\entity\projectile\Projectile;
use pocketmine\utils\TextFormat as TE;

class Main extends PluginBase implements Listener{
  
  public function onEnable() : void {
    $this->getLogger()->info("Snowballs");
    $this->getServer()->getInstance()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onDisable() : void {
    
  }
  
  public function Snowball(EntityDamageEvent $event) {
    if($event instanceof EntityDamageByChildEntityEvent) {
      $child = $event->getChild();
      $entity = $event->getEntity();
      $damager = $event->getDamager();
            if($child instanceof Snowball) {
              $damager->sendMessage(TE::GREY."You Debuffed The Snowball ". TE::RED."to" . $entity->getName());
              $entity->getEffects()->add(new EffectInstance(VanillaEffects::BLINDNESS(), 4 * 4, 2));
              $entity->getEffects()->add(new EffectInstance(VanillaEffects::SLOWNESS(), 4 * 4, 2));

      }
    }
  }
}
?>
