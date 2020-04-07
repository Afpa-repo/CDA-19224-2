<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserPartType;
use App\Form\UserProType;
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
    public function redirect_inscription() 
    {
        return $this->render("security/redirect_inscription.html.twig");
    }
     /**
     * @Route("/inscription-{status}", name="inscription_form")
     */
    public function create_user($status, AuthenticationUtils $AU, EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $encoder) 
    {
        $user = new User();

        $last_username = $AU->getLastUsername();
        $error = $AU->getLastAuthenticationError();

        if($status == "pro")
        {
            $form = $this->createForm(UserProType::class, $user);
            $user->setRole("professionnel");
        }
        else if($status == "part")
        {
            $form = $this->createForm(UserPartType::class, $user);
            $user->setRole("particulier");
        }
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user,$user->getPassword());

                if($user->getSiren() == null && $user->getRole() == "professionnel")
                {
                    return $this->render("security/create_user.html.twig",[
                        'error_siren' => "Vous êtes un professionnel, entrez votre SIREN !",
                        'last_username' => $last_username,
                        'error' => $error,
                        'form' => $form->createView()
                    ]);
                }
                else
                {
                    $user->setPassword($hash);
            
                    $manager->persist($user);
                    $manager->flush();
                }
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
