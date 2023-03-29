<?php

namespace App\Potato;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PotatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: PotatoRepository::class)]
class Potato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shape = null;

    public function getID(): ?int
    {
        return $this->id;
    }

    public function setID(?int $id): void
    {
        $this->id = $id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getShape(): ?string
    {
        return $this->shape;
    }

    public function setShape(?string $shape): void
    {
        $this->shape = $shape;
    }
}
