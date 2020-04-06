<?php

namespace App\Controller;

use App\service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     * @param CartService $CartService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CartService $CartService)
    {
        return $this->render('cart/index.html.twig', [
            'items' => $CartService->getFullCart(),
            'total' => $CartService->getTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     * @param $id
     * @param CartService $CartService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function add($id, CartService $CartService)
    {
        $CartService->add($id);
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     * @param $id
     * @param CartService $CartService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function remove($id, CartService $CartService)
    {
        $CartService->remove($id);
        return $this->redirectToRoute("cart_index");
    }
}
