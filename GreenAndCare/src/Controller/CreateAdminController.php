<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateAdminController extends AbstractController
{
    /**
     * @Route("/create/{email}-{pass}", name="create_admin")
     */
    public function index($email, $pass, UserPasswordEncoderInterface $encoder, EntityManagerInterface $manager)
    {
        $user = new User();
        $password = $encoder->encodePassword($user,$pass);
        $user->setNom("admin")
        ->setPrenom("admin")
        ->setMail($email)
        ->setTelephone("0505050505")
        ->setAdresse("adresse de l'admin")
        ->setRole(array("ROLE_ADMIN"))
        ->setPassword($password);

        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute("home");
    }
}
