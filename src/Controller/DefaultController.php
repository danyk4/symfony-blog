<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(EntityManagerInterface $em): Response
    {
        $posts = $em->getRepository(Post::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('default/about.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('default/contact.html.twig');
    }

    #[Route('/test', name: 'test')]
    public function test(EntityManagerInterface $em): void
    {
        // $user = $em->getRepository(User::class)->find(1);
        //
        // $em->remove($user);
        // $em->flush();
        //
        // dd($user);
    }
}
