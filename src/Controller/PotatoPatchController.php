<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Potato;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PotatoPatchController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function patch(Request $request, int $id): Response
    {
        $potato = $this->entityManager->getRepository(Potato::class)->find($id);
        if (!$potato) {
            throw $this->createNotFoundException('Potato not found with id ' . $id);
        }
        $data = json_decode($request->getContent(), true);
        if (isset($potato['color'])) {
            $potato->setColor($data['color']);
        }
        if (isset($data['shape'])) {
            $book->setShape($data['shape']);
        }
        $this->entityManager->flush();
        return $this->json(['message' => 'Potatoes updated']);
    }
}
