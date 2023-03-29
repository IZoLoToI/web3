<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Potato;
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
        $potato = $this->entityManager->getRepository(Potato::class)->findAll();
        $data = [];
        foreach ($potatoes as $potato) {
            $data[] = [
                'id' => $potato->getId(),
                'color' => $potato->getColor(),
                'shape' => $potato->getShape(),
            ];
        }
        return $this->json($data);
    }
}
