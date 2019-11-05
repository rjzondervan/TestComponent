<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
 * @ORM\Entity(repositoryClass="App\Repository\KonijnRepository")
 */
class Konijn
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
     * @Assert\NotBlank
     * @Assert\Length(
     *     min=3,
     *     max=50,
     *     minMessage = "The name must be at least {{ limit }} characters long",
     *     maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     * @Groups({"read","write"})
     */
    private $naam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ras", inversedBy="konijnen", cascade="persist")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read","write"})
     * @MaxDepth(1)
     */
    private $ras;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner", inversedBy="konijnen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read","write"})
     * @MaxDepth(1)
     */
    private $owner;

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

    public function getRas(): ?Ras
    {
        return $this->ras;
    }

    public function setRas(?Ras $ras): self
    {
        $this->ras = $ras;

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
