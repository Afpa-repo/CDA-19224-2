<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserProType;
use App\Form\UserPartType;
use App\Form\RetrievingType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Bridge\Google\Smtp\GmailTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

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
     * @param $status
     * @param AuthenticationUtils $AU
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create_user($status, AuthenticationUtils $AU, EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $encoder) 
    {
        $user = new User();

        $last_username = $AU->getLastUsername();
        $error = $AU->getLastAuthenticationError();

        if($status == "pro")
        {
            $form = $this->createForm(UserProType::class, $user);
            $user->setRole(array("ROLE_PRO"));
        }
        else if($status == "part")
        {
            $form = $this->createForm(UserPartType::class, $user);
            $user->setRole(array("ROLE_PART"));
        }
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user,$user->getPassword());

            if($user->getRole() == array("ROLE_PRO") && $user->getSiren() == null)
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
    public function login(AuthenticationUtils $AU)
    {
        $error = $AU->getLastAuthenticationError();
        dump($error);
        return $this->render("security/login.html.twig",[
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {}

    /**
     * @Route ("/forgot_pass", name="forgot_pass")
     */
    public function forgot_pass(MailerInterface $mailer, UserRepository $repository, EntityManagerInterface $manager, Request $request, TokenGeneratorInterface $tokenGenerator)
    {
        $form = $this->CreateFormBuilder()
                    ->add("email")
                    ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->getData('email');
            // $user = $repository->user_exist($email);
            $user = $repository->findOneBy(['mail' => $email]);
            dump($user);

            if($user == null)
            {
                $this->addFlash('warning', "Cet email n'existe pas.");
                // return $this->render("security/forgot_pass.html.twig",
                // [
                //     'form' => $form->createView()
                // ]);            
            }
            else
            {
                $user->setToken($tokenGenerator->generateToken());
                $manager->persist($user);
                $manager->flush();
                $this->addFlash('success', "Un email vient d'être envoyé !");


                // $email = (new Email())
                //     ->from('greenandcare.filrouge@gmail.com') 
                //     ->to($user->getMail()) 
                //     //->cc('exemple@mail.com') 
                //     //->bcc('exemple@mail.com')
                //     //->replyTo('test42@gmail.com')
                //         ->priority(Email::PRIORITY_HIGH) 
                //         ->subject('Mot de pass oublié ...')
                //     // If you want use text mail only
                //         ->text('Va changer ton mot de passe dépêche toi! ') 
                //     // Raw html
                //         ->html("<a href=\"http://localhost:8000/forgot_pass/". $user->getToken() ."\">Cliquez ici !</a>")
                //     ;
                //     $mailer->send($email);
                //     dump($email);
            }
        }
        return $this->render("security/forgot_pass.html.twig",
        [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/forgot_pass/{token}", name="pass_retrieving")
     */
    public function pass_retrieving( $token, UserPasswordEncoderInterface $encoder, Request $request, UserRepository $repo, EntityManagerInterface $manager)
    {      
        $token_exist = $repo->findOneBy(['Token' => $token]);
        $form = $this->createForm(RetrievingType::class, $token_exist);

        if ($token_exist)
        {   
        
            $form = $this->createForm(RetrievingType::class, $token_exist);
            dump($form);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
            {
                $hash = $encoder->encodePassword($token_exist,$token_exist->getPassword());
                $token_exist->setPassword($hash);

                $manager->persist($token_exist);
                $manager->flush();

                $this->addFlash('success','Votre mot de passe a été changé avec succès');
                return $this->redirectToRoute("login");
            }        
            return $this->render("security/pass_retrieving.html.twig",
            [
                'form' => $form->createView(),
                'token_valid' => true

            ]);
        }   
        else
        {   

            return $this->render("security/pass_retrieving.html.twig",
            [
                'token_valid' => false
            ]);        
        }
    }

}
