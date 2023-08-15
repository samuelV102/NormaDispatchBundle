<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Entity;

use Doctrine\DBAL\Types\Types;
use NormaUy\Bundle\NormaDispatchBundle\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
#[ORM\Entity(repositoryClass: AddressRepository::class)]
abstract class Address implements AddressInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    protected ?string $email = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    protected bool $available = false;

    #[ORM\ManyToOne(inversedBy: 'addressList')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subscriber $subscriber = null;

    public function __construct(?string $email = null)
    {
        $this->available = true;
        $this->email = $email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getSubscriber(): ?Subscriber
    {
        return $this->subscriber;
    }

    public function setSubscriber(?Subscriber $subscriber): self
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
