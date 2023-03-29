<?php

namespace App\Controller;

use App\Entity\Potato;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PotatoDeleteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function delete(int $id): Response
    {
        $potato = $this->entityManager->getRepository(Potato::class)->find($id);

        if (!$potato) {
            throw $this->createNotFoundException('Potato not found');
        }

        $this->entityManager->remove($potato);
        $this->entityManager->flush();

        return $this->json(['message' => 'Potato deleted']);
    }
}
