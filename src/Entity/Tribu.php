<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TribuRepository")
 */
class Tribu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pingouin", mappedBy="tribu")
     */
    private $pingouins;

    public function __construct()
    {
        $this->pingouins = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Pingouin[]
     */
    public function getPingouins(): Collection
    {
        return $this->pingouins;
    }

    public function addPingouin(Pingouin $pingouin): self
    {
        if (!$this->pingouins->contains($pingouin)) {
            $this->pingouins[] = $pingouin;
            $pingouin->setTribu($this);
        }

        return $this;
    }

    public function removePingouin(Pingouin $pingouin): self
    {
        if ($this->pingouins->contains($pingouin)) {
            $this->pingouins->removeElement($pingouin);
            // set the owning side to null (unless already changed)
            if ($pingouin->getTribu() === $this) {
                $pingouin->setTribu(null);
            }
        }

        return $this;
    }
}
