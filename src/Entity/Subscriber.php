<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use NormaUy\Bundle\NormaDispatchBundle\Repository\SubscriberRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
#[ORM\Entity(repositoryClass: SubscriberRepository::class)]
abstract class Subscriber implements SubscriberInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    protected ?string $primaryEmail = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    protected bool $subscribed = false;

    #[ORM\OneToMany(mappedBy: 'subscriber', targetEntity: Address::class, orphanRemoval: true)]
    private Collection $addressList;

    public function __construct()
    {
        $this->subscribed = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimaryEmail(): ?string
    {
        return $this->primaryEmail;
    }

    public function setPrimaryEmail(string $email): self
    {
        $this->primaryEmail = $email;

        return $this;
    }

    public function isSubscribed(): bool
    {
        return $this->subscribed;
    }

    public function setSubscribed(bool $subscribed): self
    {
        $this->subscribed = $subscribed;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddressList(): Collection
    {
        return $this->addressList;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addressList->contains($address)) {
            $this->addressList->add($address);
            $address->setSubscriber($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addressList->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getSubscriber() === $this) {
                $address->setSubscriber(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->primaryEmail;
    }
}
