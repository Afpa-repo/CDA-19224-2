<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
=======
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
>>>>>>> c014c8c2a5ddff0a54800e95aa480d439d3ee775

class HomeController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/", name="home")
     * @param ProductRepository $repository
     * @return Response
     */
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'current_menu' => 'home',
            'products' => $products
        ]);
    }
}
=======
     * @var Environment
     */
    private $twig;
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(PropertyRepository $repository):Response
    {
        $properties = $repository->findLatest();
        return $this->render('pages/home.html.twig',
    ['properties' => $properties
    ]);
    return $this->render('pages/home.html.twig');
    }
}
>>>>>>> c014c8c2a5ddff0a54800e95aa480d439d3ee775
