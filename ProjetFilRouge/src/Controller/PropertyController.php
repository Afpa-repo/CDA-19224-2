<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param PropertyRepository $repository
     * @return Response
     * @Route("/articles",name="articles.index")
     */
    public function index(PropertyRepository $repository): Response
    {
        $property = $this->repository->findAll();
        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/hair", name="hairproperty.index")
     */
    public function hair(PropertyRepository $repository): Response
    {
        $property = $this->repository->findOneBy(['category' => 'hair']);
        dump($property);
        return $this->render('property/hairproperty.index.html.twig');
    }

    /**
     * @Route("/body", name="bodyproperty.index")
     * @return Response
     */
    public function body():Response
    {
        $property = $this->repository->findOneBy(['category' => 'body']);
        dump($property);
        return $this->render('property/bodyproperty.index.html.twig');
    }

    /**
     * @Route("/accessories", name="accessories.index")
     */
        public function accessory():Response
        {
            $property = $this->repository->findOneBy(['category' => 'accessories']);
            dump($property);
            return $this->render('property/accesories.index.html.twig');
        }

    /**
     * @Route("/articles/{slug}{id}",name = "property.show", requirements={"slug":"[a-z0-9\-]*"})
     */
    public function show(Property $property, string $slug):Response
    {
        if($property->getSlug()!==$slug){
            return $this->redirectToRoute('property.show',[
                'id'=>$property->getId(),
                'slug'=>$property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig',[
            'property' => $property,
            'current_menu' => 'properties']);

    }



}