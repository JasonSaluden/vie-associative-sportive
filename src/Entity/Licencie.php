<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomLicencie = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomLicencie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoLicencie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    /**
     * @var Collection<int, Equipe>
     */
    #[ORM\OneToMany(targetEntity: Equipe::class, mappedBy: 'licencies')]
    private Collection $equipes;

    /**
     * @var Collection<int, Club>
     */
    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'licencies')]
    private Collection $clubs;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
        $this->clubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLicencie(): ?string
    {
        return $this->nomLicencie;
    }

    public function setNomLicencie(string $nomLicencie): static
    {
        $this->nomLicencie = $nomLicencie;

        return $this;
    }

    public function getPrenomLicencie(): ?string
    {
        return $this->prenomLicencie;
    }

    public function setPrenomLicencie(string $prenomLicencie): static
    {
        $this->prenomLicencie = $prenomLicencie;

        return $this;
    }

    public function getPhotoLicencie(): ?string
    {
        return $this->photoLicencie;
    }

    public function setPhotoLicencie(?string $photoLicencie): static
    {
        $this->photoLicencie = $photoLicencie;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->setLicencies($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getLicencies() === $this) {
                $equipe->setLicencies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClubs(): Collection
    {
        return $this->clubs;
    }

    public function addClub(Club $club): static
    {
        if (!$this->clubs->contains($club)) {
            $this->clubs->add($club);
        }

        return $this;
    }

    public function removeClub(Club $club): static
    {
        $this->clubs->removeElement($club);

        return $this;
    }
}
