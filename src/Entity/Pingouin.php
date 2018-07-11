<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PingouinRepository")
 */
class Pingouin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min=3, 
     *      max=50, 
     *      minMessage="Le nom du pingouin doit contenir au moins {{limit}} charactères",
     *      minMessage="Le nom du pingouin doit contenir au plus {{limit}} charactères")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     * @Assert\Regex(
     *      pattern = "/^\#([0-9a-f]{6})$/",
     *      message = "La couleur doit être sous la forme hexadecimale #123abc0"
     * )
     */
    private $couleur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min=1,
     *      max=255,
     *      minMessage = "L'url de l'image doit comporter au moins {{limit}} charactères",
     *      maxMessage = "L'url de l'image doit comporter au plus {{limit}} charactères")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tribu", inversedBy="pingouins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tribu;

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

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTribu(): ?Tribu
    {
        return $this->tribu;
    }

    public function setTribu(?Tribu $tribu): self
    {
        $this->tribu = $tribu;

        return $this;
    }
}
