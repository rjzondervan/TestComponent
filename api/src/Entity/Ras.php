<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RasRepository")
 */
class Ras
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "openapi_context"={
     *         	   "description" = "The UUID identifier of this object",
     *             "type"="string",
     *             "format"="uuid",
     *             "example"="e2984465-190a-4562-829e-a8cca81aa35d"
     *         }
     *     }
     * )
     *
     * @Groups({"read"})
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $naam;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read","write"})
     */
    private $beschrijving;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hond", mappedBy="ras", orphanRemoval=true)
     */
    private $honden;

    public function __construct()
    {
        $this->honden = new ArrayCollection();
    }

    public function getId()
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

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(?string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * @return Collection|Hond[]
     */
    public function getHonden(): Collection
    {
        return $this->honden;
    }

    public function addHonden(Hond $honden): self
    {
        if (!$this->honden->contains($honden)) {
            $this->honden[] = $honden;
            $honden->setRas($this);
        }

        return $this;
    }

    public function removeHonden(Hond $honden): self
    {
        if ($this->honden->contains($honden)) {
            $this->honden->removeElement($honden);
            // set the owning side to null (unless already changed)
            if ($honden->getRas() === $this) {
                $honden->setRas(null);
            }
        }

        return $this;
    }
}
