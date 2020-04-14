<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Form\ProductSearchType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new ProductSearch(); // entity permettant de filtrer les produits
        $form = $this->createForm(ProductSearchType::class, $search); // form rattaché à cette entité
        $form->handleRequest($request); // le form gère la request

        $products = $paginator->paginate($this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('product/index.html.twig', [
            'current_menu' => 'products',
            'products' => $products,
            'form' => $form->createView() // on passe le form de recherche à la vue
        ]);
    }

    /**
     * @Route("/nos-produits/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Product $product
     * @return Response
     */
    public function show(Product $product, string $slug): Response
    {
        if ($product->getSlug() !== $slug) {
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

    /**
     * @Route("/nos-produits/La-maison", name="home/product.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function homeProductsIndex(PaginatorInterface $paginator, Request $request): Response
    {
        $products = $paginator->paginate($this->repository->findAllHomeProducts(),
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('product/home/index.html.twig', [
            'current_menu' => 'products',
            'products' => $products,

        ]);
    }

}