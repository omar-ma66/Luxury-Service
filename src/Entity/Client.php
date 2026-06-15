<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSociete = null;

    #[ORM\Column(length: 255)]
    private ?string $typeActivite = null;

    #[ORM\Column(length: 255)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $postContact = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telContact = null;

    #[ORM\Column(length: 255)]
    private ?string $emailContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    /**
     * @var Collection<int, Job>
     */
    #[ORM\ManyToMany(targetEntity: Job::class, inversedBy: 'clients')]
    private Collection $job;

    public function __construct()
    {
        $this->job = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): static
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getTypeActivite(): ?string
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(string $typeActivite): static
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPostContact(): ?string
    {
        return $this->postContact;
    }

    public function setPostContact(string $postContact): static
    {
        $this->postContact = $postContact;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->telContact;
    }

    public function setTelContact(?string $telContact): static
    {
        $this->telContact = $telContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): static
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection<int, Job>
     */
    public function getJob(): Collection
    {
        return $this->job;
    }

    public function addJob(Job $job): static
    {
        if (!$this->job->contains($job)) {
            $this->job->add($job);
        }

        return $this;
    }

    public function removeJob(Job $job): static
    {
        $this->job->removeElement($job);

        return $this;
    }
}
