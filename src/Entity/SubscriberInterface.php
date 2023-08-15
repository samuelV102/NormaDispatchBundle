<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Entity;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
interface SubscriberInterface
{
    public function getId(): ?int;

    public function isSubscribed(): bool;

    public function setSubscribed(bool $subscribed): self;
}
