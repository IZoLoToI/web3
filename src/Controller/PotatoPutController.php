<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Potato;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PotatoPutController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function put(Request $request, $id): Response
    {
        $potato = $this->entityManager->getRepository(Potato::class)->find($id);

        if (!$potato) {
            throw $this->createNotFoundException('Potato not found with id ' . $id);
        }

        $data = json_decode($request->getContent(), true);

        $color = isset($data['color']) ? $data['color'] : null;
        $shape = isset($data['shape']) ? $data['shape'] : null;

        $potato->setColor($color);
        $potato->setShape($shape);

        $this->entityManager->flush();

        return $this->json(['id' => $potato->getId()]);
    }

}
