<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEquipe = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    private ?Licencie $licencies = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    private ?Club $equipes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe): static
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    public function getLicencies(): ?Licencie
    {
        return $this->licencies;
    }

    public function setLicencies(?Licencie $licencies): static
    {
        $this->licencies = $licencies;

        return $this;
    }

    public function getEquipes(): ?Club
    {
        return $this->equipes;
    }

    public function setEquipes(?Club $equipes): static
    {
        $this->equipes = $equipes;

        return $this;
    }
}
