<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JobApplicationRepository::class)
 */
class JobApplication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isApplied;

    /**
     * @ORM\Column(type="date")
     */
    private $dateApplied;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dateAppliedTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isConsulted;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateConsulted;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $dateConsultedTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAccepted;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateAccepted;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $dateAcceptedTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTryPeriod;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateTryPeriod;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $dateTryPeriodTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFinished;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinished;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $dateFinishedTmstp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isInProgress;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateInProgress;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $dateInProgressTmstp;

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

    public function getIsApplied(): ?bool
    {
        return $this->isApplied;
    }

    public function setIsApplied(?bool $isApplied): self
    {
        $this->isApplied = $isApplied;

        return $this;
    }

    public function getDateApplied(): ?\DateTimeInterface
    {
        return $this->dateApplied;
    }

    public function setDateApplied(\DateTimeInterface $dateApplied): self
    {
        $this->dateApplied = $dateApplied;

        return $this;
    }

    public function getDateAppliedTmstp(): ?string
    {
        return $this->dateAppliedTmstp;
    }

    public function setDateAppliedTmstp(string $dateAppliedTmstp): self
    {
        $this->dateAppliedTmstp = $dateAppliedTmstp;

        return $this;
    }

    public function getIsConsulted(): ?bool
    {
        return $this->isConsulted;
    }

    public function setIsConsulted(bool $isConsulted): self
    {
        $this->isConsulted = $isConsulted;

        return $this;
    }

    public function getDateConsulted(): ?\DateTimeInterface
    {
        return $this->dateConsulted;
    }

    public function setDateConsulted(?\DateTimeInterface $dateConsulted): self
    {
        $this->dateConsulted = $dateConsulted;

        return $this;
    }

    public function getDateConsultedTmstp(): ?string
    {
        return $this->dateConsultedTmstp;
    }

    public function setDateConsultedTmstp(?string $dateConsultedTmstp): self
    {
        $this->dateConsultedTmstp = $dateConsultedTmstp;

        return $this;
    }

    public function getIsAccepted(): ?bool
    {
        return $this->isAccepted;
    }

    public function setIsAccepted(bool $isAccepted): self
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    public function getDateAccepted(): ?\DateTimeInterface
    {
        return $this->dateAccepted;
    }

    public function setDateAccepted(?\DateTimeInterface $dateAccepted): self
    {
        $this->dateAccepted = $dateAccepted;

        return $this;
    }

    public function getDateAcceptedTmstp(): ?string
    {
        return $this->dateAcceptedTmstp;
    }

    public function setDateAcceptedTmstp(?string $dateAcceptedTmstp): self
    {
        $this->dateAcceptedTmstp = $dateAcceptedTmstp;

        return $this;
    }

    public function getIsTryPeriod(): ?bool
    {
        return $this->isTryPeriod;
    }

    public function setIsTryPeriod(bool $isTryPeriod): self
    {
        $this->isTryPeriod = $isTryPeriod;

        return $this;
    }

    public function getDateTryPeriod(): ?\DateTimeInterface
    {
        return $this->dateTryPeriod;
    }

    public function setDateTryPeriod(?\DateTimeInterface $dateTryPeriod): self
    {
        $this->dateTryPeriod = $dateTryPeriod;

        return $this;
    }

    public function getDateTryPeriodTmstp(): ?\DateTimeInterface
    {
        return $this->dateTryPeriodTmstp;
    }

    public function setDateTryPeriodTmstp(?\DateTimeInterface $dateTryPeriodTmstp): self
    {
        $this->dateTryPeriodTmstp = $dateTryPeriodTmstp;

        return $this;
    }

    public function getIsFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function setIsFinished(bool $isFinished): self
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    public function getDateFinished(): ?\DateTimeInterface
    {
        return $this->dateFinished;
    }

    public function setDateFinished(?\DateTimeInterface $dateFinished): self
    {
        $this->dateFinished = $dateFinished;

        return $this;
    }

    public function getDateFinishedTmstp(): ?string
    {
        return $this->dateFinishedTmstp;
    }

    public function setDateFinishedTmstp(?string $dateFinishedTmstp): self
    {
        $this->dateFinishedTmstp = $dateFinishedTmstp;

        return $this;
    }

    public function getIsInProgress(): ?bool
    {
        return $this->isInProgress;
    }

    public function setIsInProgress(bool $isInProgress): self
    {
        $this->isInProgress = $isInProgress;

        return $this;
    }

    public function getDateInProgress(): ?\DateTimeInterface
    {
        return $this->dateInProgress;
    }

    public function setDateInProgress(?\DateTimeInterface $dateInProgress): self
    {
        $this->dateInProgress = $dateInProgress;

        return $this;
    }

    public function getDateInProgressTmstp(): ?string
    {
        return $this->dateInProgressTmstp;
    }

    public function setDateInProgressTmstp(?string $dateInProgressTmstp): self
    {
        $this->dateInProgressTmstp = $dateInProgressTmstp;

        return $this;
    }
}
