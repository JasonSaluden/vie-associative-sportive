<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClub = null;

    #[ORM\Column(length: 255)]
    private ?string $sportClub = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseClub = null;

    /**
     * @var Collection<int, Licencie>
     */
    #[ORM\ManyToMany(targetEntity: Licencie::class, mappedBy: 'clubs')]
    private Collection $licencies;

    /**
     * @var Collection<int, Equipe>
     */
    #[ORM\OneToMany(targetEntity: Equipe::class, mappedBy: 'equipes')]
    private Collection $equipes;

    public function __construct()
    {
        $this->licencies = new ArrayCollection();
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClub(): ?string
    {
        return $this->nomClub;
    }

    public function setNomClub(string $nomClub): static
    {
        $this->nomClub = $nomClub;

        return $this;
    }

    public function getSportClub(): ?string
    {
        return $this->sportClub;
    }

    public function setSportClub(string $sportClub): static
    {
        $this->sportClub = $sportClub;

        return $this;
    }

    public function getAdresseClub(): ?string
    {
        return $this->adresseClub;
    }

    public function setAdresseClub(string $adresseClub): static
    {
        $this->adresseClub = $adresseClub;

        return $this;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencies(): Collection
    {
        return $this->licencies;
    }

    public function addLicency(Licencie $licency): static
    {
        if (!$this->licencies->contains($licency)) {
            $this->licencies->add($licency);
            $licency->addClub($this);
        }

        return $this;
    }

    public function removeLicency(Licencie $licency): static
    {
        if ($this->licencies->removeElement($licency)) {
            $licency->removeClub($this);
        }

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
            $equipe->setEquipes($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getEquipes() === $this) {
                $equipe->setEquipes(null);
            }
        }

        return $this;
    }
}
