<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContactRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ContactRequestRepository::class)
 */
class ContactRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="contactRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userSender;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="contactReceives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userReceiver;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSent;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dateSentTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRemote;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAgency;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPhone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserSender(): ?User
    {
        return $this->userSender;
    }

    public function setUserSender(?User $userSender): self
    {
        $this->userSender = $userSender;

        return $this;
    }

    public function getUserReceiver(): ?User
    {
        return $this->userReceiver;
    }

    public function setUserReceiver(?User $userReceiver): self
    {
        $this->userReceiver = $userReceiver;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(\DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateSentTmstp(): ?string
    {
        return $this->dateSentTmstp;
    }

    public function setDateSentTmstp(string $dateSentTmstp): self
    {
        $this->dateSentTmstp = $dateSentTmstp;

        return $this;
    }

    public function getIsRemote(): ?bool
    {
        return $this->isRemote;
    }

    public function setIsRemote(bool $isRemote): self
    {
        $this->isRemote = $isRemote;

        return $this;
    }

    public function getIsAgency(): ?bool
    {
        return $this->isAgency;
    }

    public function setIsAgency(bool $isAgency): self
    {
        $this->isAgency = $isAgency;

        return $this;
    }

    public function getIsPhone(): ?bool
    {
        return $this->isPhone;
    }

    public function setIsPhone(bool $isPhone): self
    {
        $this->isPhone = $isPhone;

        return $this;
    }

    public function getIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;

        return $this;
    }
}
