<?php

namespace Drupal\events_demo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

class EntityViewSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
                HookEventDispatcherInterface::ENTITY_VIEW => 'entityView'
        ];
    }

    public function entityView($event) {
        $build = &$event->getBuild();
        $build['alter_render'] = [
                '#type' => 'markup',
                '#markup' => 'This node view is altered by an  Entity View Hook Event Dispatcher!'
        ];
        $build = $event->setBuild($build);
    }
}
