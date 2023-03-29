<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Shape;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShapeGetCollectionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getCollection(Request $request): Response
    {
        $shape = $this->entityManager->getRepository(Shape::class)->findAll();
        $data = [];
        foreach ($shapes as $shape) {
            $data[] = [
                'id' => $shape->getId(),
                'color' => $shape->getColor(),
                'shape' => $shape->getShape(),
            ];
        }
        return $this->json($data);
    }
}
