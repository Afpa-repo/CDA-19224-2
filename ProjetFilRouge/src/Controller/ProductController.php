<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

class ProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ProductRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/nos-produits/accueil", name="product.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'current_menu' => 'products'
        ]);
    }

    /**
     * @Route("/nos-produits/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Product $product
     * @return Response
     */
    public function show(Product $product, string $slug): Response
    {
        if($product->getSlug() !== $slug) {
            $this->redirectToRoute('product.show', [
                'id' => $product->getId(),
                'slug' => $product->getSlug()
            ], 301);
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'current_menu' => 'products'
        ]);
    }

}