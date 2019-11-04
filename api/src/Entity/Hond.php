<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\HondRepository")
 */
class Hond
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read","write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $naam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ras", inversedBy="honden")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read","write"})
     */
    private $ras;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getRas(): ?Ras
    {
        return $this->ras;
    }

    public function setRas(?Ras $ras): self
    {
        $this->ras = $ras;

        return $this;
    }
}
