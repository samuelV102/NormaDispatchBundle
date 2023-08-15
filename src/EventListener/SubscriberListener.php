<?php

namespace NormaUy\Bundle\NormaDispatchBundle\EventListener;

use NormaUy\Bundle\NormaDispatchBundle\Entity\Subscriber;
use NormaUy\Bundle\NormaDispatchBundle\Entity\Address;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SubscriberListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event)
    {
        /**
         * @var Subscriber
         */
        $entity = $event->getForm()->getData();

        if ($entity) {
            $entity->addAddress(new Address($entity->getPrimaryEmail()));
        }
    }
}
