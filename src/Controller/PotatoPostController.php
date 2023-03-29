<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Potato;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PotatoPostController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function post(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $potato = new Potato();
        $potato->setColor($data['color']);
        $potato->setShape($data['shape']);

        $this->entityManager->flush();

        return $this->json(['id' => $potato->getId()]);
    }
}
