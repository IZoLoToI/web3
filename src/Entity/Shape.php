<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ShapeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: ShapeRepository::class)]
class Potato
{
    private ?int $id = null;
    private ?string $color = null;
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