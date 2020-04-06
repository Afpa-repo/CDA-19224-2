<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{


    /**
     * @Route("/inscription", name="inscription")
     */
    public function create_user(AuthenticationUtils $AU, EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $last_username = $AU->getLastUsername();
        $error = $AU->getLastAuthenticationError();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user,$user->getPassword());
            if($user->it_is_pro)
            {
                if($user->getSiren() == null)
                {
                    return $this->render("security/create_user.html.twig",[
                        'error_siren' => "Vous êtes un professionnel, entrez votre SIREN !",
                        'last_username' => $last_username,
                        'error' => $error,
                        'form' => $form->createView()
                    ]);
                }
                else{
                    $user->setRole("professionnel");
                }
            }
            else
            {
                $user->setRole("particulier");
            }

            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();
        }
        return $this->render("security/create_user.html.twig",[
            'last_username' => $last_username,
            'error' => $error,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render("security/login.html.twig");
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {}
}