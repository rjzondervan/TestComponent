<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true}
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
     *  @Groups({"read"})
     * @MaxDepth(1)
     */
    private $honden;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kat", mappedBy="ras", orphanRemoval=true)
     */
    private $katten;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eend", mappedBy="ras", orphanRemoval=true)
     */
    private $eenden;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Konijn", mappedBy="ras", orphanRemoval=true)
     */
    private $konijnen;

    public function __construct()
    {
        $this->honden = new ArrayCollection();
        $this->katten = new ArrayCollection();
        $this->eenden = new ArrayCollection();
        $this->konijnen = new ArrayCollection();
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

    /**
     * @return Collection|Kat[]
     */
    public function getKatten(): Collection
    {
        return $this->katten;
    }

    public function addKatten(Kat $katten): self
    {
        if (!$this->katten->contains($katten)) {
            $this->katten[] = $katten;
            $katten->setRas($this);
        }

        return $this;
    }

    public function removeKatten(Kat $katten): self
    {
        if ($this->katten->contains($katten)) {
            $this->katten->removeElement($katten);
            // set the owning side to null (unless already changed)
            if ($katten->getRas() === $this) {
                $katten->setRas(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Eend[]
     */
    public function getEenden(): Collection
    {
        return $this->eenden;
    }

    public function addEenden(Eend $eenden): self
    {
        if (!$this->eenden->contains($eenden)) {
            $this->eenden[] = $eenden;
            $eenden->setRas($this);
        }

        return $this;
    }

    public function removeEenden(Eend $eenden): self
    {
        if ($this->eenden->contains($eenden)) {
            $this->eenden->removeElement($eenden);
            // set the owning side to null (unless already changed)
            if ($eenden->getRas() === $this) {
                $eenden->setRas(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Konijn[]
     */
    public function getKonijnen(): Collection
    {
        return $this->konijnen;
    }

    public function addKonijnen(Konijn $konijnen): self
    {
        if (!$this->konijnen->contains($konijnen)) {
            $this->konijnen[] = $konijnen;
            $konijnen->setRas($this);
        }

        return $this;
    }

    public function removeKonijnen(Konijn $konijnen): self
    {
        if ($this->konijnen->contains($konijnen)) {
            $this->konijnen->removeElement($konijnen);
            // set the owning side to null (unless already changed)
            if ($konijnen->getRas() === $this) {
                $konijnen->setRas(null);
            }
        }

        return $this;
    }
}
