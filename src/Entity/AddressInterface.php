<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Entity;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
interface AddressInterface
{
    public function getId(): ?int;

    public function getEmail(): ?string;

    public function setEmail(string $email): self;

    public function isAvailable(): bool;

    public function setAvailable(bool $available): self;

    public function getSubscriber(): ?Subscriber;

    public function setSubscriber(?Subscriber $subscriber): self;
}
