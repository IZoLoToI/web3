<?php

namespace App\Controller;

use App\Entity\Shape;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShapeDeleteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function delete(int $id): Response
    {
        $shape = $this->entityManager->getRepository(Shape::class)->find($id);

        if (!$shape) {
            throw $this->createNotFoundException('Shape not found');
        }

        $this->entityManager->remove($shape);
        $this->entityManager->flush();

        return $this->json(['message' => 'Shape deleted']);
    }
}
