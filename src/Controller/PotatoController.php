<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Shape;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShapeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getItem(int $id): Response
    {
        $shape = $this->entityManager->getRepository(Shape::class)->find($id);

        if (!$shape) {
            throw $this->createNotFoundException('Shape not found');
        }

        $data = [
            'id' => $shape->getId(),
            'color' => $shape->getColor(),
            'shape' => $shape->getShape(),
        ];
        return $this->json($data);
    }
}
