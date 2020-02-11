<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\OwnerRepository")
 */
class Owner
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
     * @Assert\Uuid
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     * @Assert\length(
     *     min=3,
     *     max=200,
     *     minMessage = "The name must be at least {{ limit }} characters long",
     *     maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read","write"})
     * @Assert\length(
     *     min=18,
     *     max=18,
     *     minMessage = "The iban must be at least {{ limit }} characters long",
     *     maxMessage = "The iban cannot be longer than {{ limit }} characters"
     * )
     * @Assert\Iban
     */
    private $iban;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kat", mappedBy="owner",cascade="persist")
     * @Groups({"read","write"})
     * @MaxDepth(1)
     */
    private $katten;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hond", mappedBy="owner",cascade="persist")
     * @Groups({"read","write"})
     * @MaxDepth(1)
     */
    private $honden;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eend", mappedBy="owner",cascade="persist")
     * @Groups({"read","write"})
     * @MaxDepth(1)
     *
     */
    private $eenden;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Konijn", mappedBy="owner",cascade="persist")
     * @Groups({"read","write"})
     * @MaxDepth(1)
     */
    private $konijnen;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $address;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read","write"})
     * @Assert\NotNull
     * @Assert\Date
     * @var string A "d-m-Y formatted value"
     */
    private $birthdate;

    /**
     * @return mixed
     */


    public function __construct()
    {
        $this->katten = new ArrayCollection();
        $this->honden = new ArrayCollection();
        $this->eenden = new ArrayCollection();
        $this->konijnen = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

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
            $katten->setOwner($this);
        }

        return $this;
    }

    public function removeKatten(Kat $katten): self
    {
        if ($this->katten->contains($katten)) {
            $this->katten->removeElement($katten);
            // set the owning side to null (unless already changed)
            if ($katten->getOwner() === $this) {
                $katten->setOwner(null);
            }
        }

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
            $honden->setOwner($this);
        }

        return $this;
    }

    public function removeHonden(Hond $honden): self
    {
        if ($this->honden->contains($honden)) {
            $this->honden->removeElement($honden);
            // set the owning side to null (unless already changed)
            if ($honden->getOwner() === $this) {
                $honden->setOwner(null);
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
            $eenden->setOwner($this);
        }

        return $this;
    }

    public function removeEenden(Eend $eenden): self
    {
        if ($this->eenden->contains($eenden)) {
            $this->eenden->removeElement($eenden);
            // set the owning side to null (unless already changed)
            if ($eenden->getOwner() === $this) {
                $eenden->setOwner(null);
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
            $konijnen->setOwner($this);
        }

        return $this;
    }

    public function removeKonijnen(Konijn $konijnen): self
    {
        if ($this->konijnen->contains($konijnen)) {
            $this->konijnen->removeElement($konijnen);
            // set the owning side to null (unless already changed)
            if ($konijnen->getOwner() === $this) {
                $konijnen->setOwner(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }
    public function getBirthdate()
    {
        return $this->birthdate;
    }
    public function setBirthdate($birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }
}
