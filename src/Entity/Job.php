<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 255)]
    private ?string $client = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jobType = null;

    #[ORM\Column(length: 255)]
    private ?string $jobCategory = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $date = null;

    /**
     * @var Collection<int, Candidature>
     */
    #[ORM\ManyToMany(targetEntity: Candidature::class, inversedBy: 'jobs')]
    private Collection $candidature;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'job')]
    private Collection $clients;

    public function __construct()
    {
        $this->candidature = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

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

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(?string $jobType): static
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getJobCategory(): ?string
    {
        return $this->jobCategory;
    }

    public function setJobCategory(string $jobCategory): static
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(?\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidature(): Collection
    {
        return $this->candidature;
    }

    public function addCandidature(Candidature $candidature): static
    {
        if (!$this->candidature->contains($candidature)) {
            $this->candidature->add($candidature);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        $this->candidature->removeElement($candidature);

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->addJob($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            $client->removeJob($this);
        }

        return $this;
    }
}
