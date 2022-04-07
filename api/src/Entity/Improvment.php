<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImprovmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ImprovmentRepository::class)
 */
class Improvment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=UserImprovment::class, mappedBy="improvment", orphanRemoval=true)
     */
    private $userImprovments;

    public function __construct()
    {
        $this->userImprovments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, UserImprovment>
     */
    public function getUserImprovments(): Collection
    {
        return $this->userImprovments;
    }

    public function addUserImprovment(UserImprovment $userImprovment): self
    {
        if (!$this->userImprovments->contains($userImprovment)) {
            $this->userImprovments[] = $userImprovment;
            $userImprovment->setImprovment($this);
        }

        return $this;
    }

    public function removeUserImprovment(UserImprovment $userImprovment): self
    {
        if ($this->userImprovments->removeElement($userImprovment)) {
            // set the owning side to null (unless already changed)
            if ($userImprovment->getImprovment() === $this) {
                $userImprovment->setImprovment(null);
            }
        }

        return $this;
    }
}
