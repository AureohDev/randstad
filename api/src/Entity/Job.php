<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\Column(type="date")
     */
    private $datePosted;

    /**
     * @ORM\Column(type="bigint")
     */
    private $datePostedTmstp;

    /**
     * @ORM\OneToMany(targetEntity=JobApplication::class, mappedBy="job", orphanRemoval=true)
     */
    private $applications;

    /**
     * @ORM\OneToMany(targetEntity=JobSave::class, mappedBy="job", orphanRemoval=true)
     */
    private $jobSaves;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
        $this->jobSaves = new ArrayCollection();
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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDatePosted(): ?\DateTimeInterface
    {
        return $this->datePosted;
    }

    public function setDatePosted(\DateTimeInterface $datePosted): self
    {
        $this->datePosted = $datePosted;

        return $this;
    }

    public function getDatePostedTmstp(): ?string
    {
        return $this->datePostedTmstp;
    }

    public function setDatePostedTmstp(string $datePostedTmstp): self
    {
        $this->datePostedTmstp = $datePostedTmstp;

        return $this;
    }

    /**
     * @return Collection<int, JobApplication>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(JobApplication $application): self
    {
        if (!$this->applications->contains($application)) {
            $this->applications[] = $application;
            $application->setJob($this);
        }

        return $this;
    }

    public function removeApplication(JobApplication $application): self
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getJob() === $this) {
                $application->setJob(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JobSave>
     */
    public function getJobSaves(): Collection
    {
        return $this->jobSaves;
    }

    public function addJobSave(JobSave $jobSave): self
    {
        if (!$this->jobSaves->contains($jobSave)) {
            $this->jobSaves[] = $jobSave;
            $jobSave->setJob($this);
        }

        return $this;
    }

    public function removeJobSave(JobSave $jobSave): self
    {
        if ($this->jobSaves->removeElement($jobSave)) {
            // set the owning side to null (unless already changed)
            if ($jobSave->getJob() === $this) {
                $jobSave->setJob(null);
            }
        }

        return $this;
    }
}
