<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;

class Movie
{
    private ?int $id = null;
    private ?string $nameCin = null;
    private ?string $nameMov = null;

    public function getID(): ?int
    {
        return $object->id;
    }

    public function setID(?int $id): void
    {
        $object->id = $id;
    }

    public function getNameCin(): ?string
    {
        return $object->nameCinema;
    }

    public function setNameCin(?string $nameCin): void
    {
        $object->nameCinema = $nameCin;
    }

    public function getNameMov(): ?string
    {
        return $object->nameMovie;
    }

    public function setNameMov(?string $nameMov): void
    {
        $object->nameMovie = $nameMov;
    }
}
