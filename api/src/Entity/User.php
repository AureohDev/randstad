<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar_path;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isConnected;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="userSender", orphanRemoval=true)
     */
    private $sendMessages;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="userReceiver", orphanRemoval=true)
     */
    private $receiveMessages;

    /**
     * @ORM\OneToMany(targetEntity=JobApplication::class, mappedBy="userId", orphanRemoval=true)
     */
    private $applications;

    /**
     * @ORM\OneToMany(targetEntity=JobSave::class, mappedBy="userId", orphanRemoval=true)
     */
    private $jobSaves;

    /**
     * @ORM\OneToMany(targetEntity=UserImprovment::class, mappedBy="userId", orphanRemoval=true)
     */
    private $userImprovments;

    /**
     * @ORM\OneToMany(targetEntity=ContactRequest::class, mappedBy="userSender", orphanRemoval=true)
     */
    private $contactRequests;

    /**
     * @ORM\OneToMany(targetEntity=ContactRequest::class, mappedBy="userReceiver", orphanRemoval=true)
     */
    private $contactReceives;

    /**
     * @ORM\OneToMany(targetEntity=JobSuggestion::class, mappedBy="userId", orphanRemoval=true)
     */
    private $jobSuggestions;

    public function __construct()
    {
        $this->sendMessages = new ArrayCollection();
        $this->receiveMessages = new ArrayCollection();
        $this->applications = new ArrayCollection();
        $this->jobSaves = new ArrayCollection();
        $this->userImprovments = new ArrayCollection();
        $this->contactRequests = new ArrayCollection();
        $this->contactReceives = new ArrayCollection();
        $this->jobSuggestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAvatarPath(): ?string
    {
        return $this->avatar_path;
    }

    public function setAvatarPath(?string $avatar_path): self
    {
        $this->avatar_path = $avatar_path;

        return $this;
    }

    public function getIsConnected(): ?bool
    {
        return $this->isConnected;
    }

    public function setIsConnected(bool $isConnected): self
    {
        $this->isConnected = $isConnected;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getSendMessages(): Collection
    {
        return $this->sendMessages;
    }

    public function addSendMessage(Message $sendMessage): self
    {
        if (!$this->sendMessages->contains($sendMessage)) {
            $this->sendMessages[] = $sendMessage;
            $sendMessage->setUserSender($this);
        }

        return $this;
    }

    public function removeSendMessage(Message $sendMessage): self
    {
        if ($this->sendMessages->removeElement($sendMessage)) {
            // set the owning side to null (unless already changed)
            if ($sendMessage->getUserSender() === $this) {
                $sendMessage->setUserSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getReceiveMessages(): Collection
    {
        return $this->receiveMessages;
    }

    public function addReceiveMessage(Message $receiveMessage): self
    {
        if (!$this->receiveMessages->contains($receiveMessage)) {
            $this->receiveMessages[] = $receiveMessage;
            $receiveMessage->setUserReceiver($this);
        }

        return $this;
    }

    public function removeReceiveMessage(Message $receiveMessage): self
    {
        if ($this->receiveMessages->removeElement($receiveMessage)) {
            // set the owning side to null (unless already changed)
            if ($receiveMessage->getUserReceiver() === $this) {
                $receiveMessage->setUserReceiver(null);
            }
        }

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
            $application->setUserId($this);
        }

        return $this;
    }

    public function removeApplication(JobApplication $application): self
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getUserId() === $this) {
                $application->setUserId(null);
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
            $jobSave->setUserId($this);
        }

        return $this;
    }

    public function removeJobSave(JobSave $jobSave): self
    {
        if ($this->jobSaves->removeElement($jobSave)) {
            // set the owning side to null (unless already changed)
            if ($jobSave->getUserId() === $this) {
                $jobSave->setUserId(null);
            }
        }

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
            $userImprovment->setUserId($this);
        }

        return $this;
    }

    public function removeUserImprovment(UserImprovment $userImprovment): self
    {
        if ($this->userImprovments->removeElement($userImprovment)) {
            // set the owning side to null (unless already changed)
            if ($userImprovment->getUserId() === $this) {
                $userImprovment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ContactRequest>
     */
    public function getContactRequests(): Collection
    {
        return $this->contactRequests;
    }

    public function addContactRequest(ContactRequest $contactRequest): self
    {
        if (!$this->contactRequests->contains($contactRequest)) {
            $this->contactRequests[] = $contactRequest;
            $contactRequest->setUserSender($this);
        }

        return $this;
    }

    public function removeContactRequest(ContactRequest $contactRequest): self
    {
        if ($this->contactRequests->removeElement($contactRequest)) {
            // set the owning side to null (unless already changed)
            if ($contactRequest->getUserSender() === $this) {
                $contactRequest->setUserSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ContactRequest>
     */
    public function getContactReceives(): Collection
    {
        return $this->contactReceives;
    }

    public function addContactReceife(ContactRequest $contactReceife): self
    {
        if (!$this->contactReceives->contains($contactReceife)) {
            $this->contactReceives[] = $contactReceife;
            $contactReceife->setUserReceiver($this);
        }

        return $this;
    }

    public function removeContactReceife(ContactRequest $contactReceife): self
    {
        if ($this->contactReceives->removeElement($contactReceife)) {
            // set the owning side to null (unless already changed)
            if ($contactReceife->getUserReceiver() === $this) {
                $contactReceife->setUserReceiver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JobSuggestion>
     */
    public function getJobSuggestions(): Collection
    {
        return $this->jobSuggestions;
    }

    public function addJobSuggestion(JobSuggestion $jobSuggestion): self
    {
        if (!$this->jobSuggestions->contains($jobSuggestion)) {
            $this->jobSuggestions[] = $jobSuggestion;
            $jobSuggestion->setUserId($this);
        }

        return $this;
    }

    public function removeJobSuggestion(JobSuggestion $jobSuggestion): self
    {
        if ($this->jobSuggestions->removeElement($jobSuggestion)) {
            // set the owning side to null (unless already changed)
            if ($jobSuggestion->getUserId() === $this) {
                $jobSuggestion->setUserId(null);
            }
        }

        return $this;
    }
}
