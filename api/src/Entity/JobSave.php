<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobSaveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JobSaveRepository::class)
 */
class JobSave
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="jobSaves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobSaves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSaved;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dateSavedTmstp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getDateSaved(): ?\DateTimeInterface
    {
        return $this->dateSaved;
    }

    public function setDateSaved(\DateTimeInterface $dateSaved): self
    {
        $this->dateSaved = $dateSaved;

        return $this;
    }

    public function getDateSavedTmstp(): ?string
    {
        return $this->dateSavedTmstp;
    }

    public function setDateSavedTmstp(string $dateSavedTmstp): self
    {
        $this->dateSavedTmstp = $dateSavedTmstp;

        return $this;
    }
}
