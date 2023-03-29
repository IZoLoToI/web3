<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Potato;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PotatoController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getItem(int $id): Response
    {
        $potato = $this->entityManager->getRepository(Potato::class)->find($id);

        if (!$potato) {
            throw $this->createNotFoundException('Potato not found');
        }

        $data = [
            'id' => $potato->getId(),
            'color' => $potato->getColor(),
            'shape' => $potato->getShape(),
        ];
        return $this->json($data);
    }
}
