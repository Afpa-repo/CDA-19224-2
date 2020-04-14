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
     */
    //Route avec une variable en get qui permet la transmition d'un formulaire en fonction du statut

    public function create_user($status, 
    //authentication permet l'utilisation de 2 méthode ainsi qu'un message d'erreur (non utuilisé ici)
    AuthenticationUtils $AU, 
    //Entity manager permet l'utilisation de méthode afin d'envoyer les info sur la bdd
    EntityManagerInterface $manager, 
    //Request permet de centraliser toutes les variables contenu dans la requete 
    Request $request, 
    //Permet d'encoder le mot de passe 
    UserPasswordEncoderInterface $encoder) 
    {
        //on crée un nouvel utilisateur afin de l'hydrater, sinon de l'envyer tel quel
        $user = new User();

        $last_username = $AU->getLastUsername();
        $error = $AU->getLastAuthenticationError();

        //en fonction du status on envoyer un formulaire different
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

        //on récupere les variable contenu dans le formulaire via la requete
        $form->handleRequest($request);

        //ici si le form aété validé (au cas de 1er passage) et est valide (reg ok)
        if($form->isSubmitted() && $form->isValid())
        {
            //on hash le password
            $hash = $encoder->encodePassword($user,$user->getPassword());

            //si le siren est vide est que statut est pro alors nous renvoyons une erreur
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
            //sinon nous envoyons les infos en bdd
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
            //on recupere les infos dans la bdd n fonction de l'email inserer dans le formulaire
            $user = $repository->findOneBy(['mail' => $email]);
            dump($user);

            //si l'user n'existe pas en renvoie avec une notification
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
                /*sinon on crée une clé de 44 caractère generé 
                aleatoirement qu'on insére ensuite dans la bdd avec l'email associé
                ainsi qu'une notification*/
                $user->setToken($tokenGenerator->generateToken());
                $manager->persist($user);
                $manager->flush();
                $this->addFlash('success', "Un email vient d'être envoyé !");

                //ici envoie d'un mail ne fonctionnant pas gar google n'accpete que les co sécu

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
    //une fois le mail envoyé l'user est dirigé vers cette page qui en fonction du token accepte de changer le pass
    public function pass_retrieving( $token, UserPasswordEncoderInterface $encoder, Request $request, UserRepository $repo, EntityManagerInterface $manager)
    {      
        //tout d'abord nous trouvons l'email associé au token
        $token_exist = $repo->findOneBy(['Token' => $token]);
        
        //si l'utilisateur lié au token exits ealors
        if ($token_exist)
        {   
             //ensuite form de password et confirm  password
            $form = $this->createForm(RetrievingType::class, $token_exist);
            dump($form);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
            {
                //si les mot de passes font plus de 8 caractères et qu'il sont egaux alors on encode puis enregistre la hash
                $hash = $encoder->encodePassword($token_exist,$token_exist->getPassword());
                $token_exist->setPassword($hash);

                $manager->persist($token_exist);
                $manager->flush();

                //on ajout une notifications
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
            //si le token n'a trouvé aucun user dans la bdd
            return $this->render("security/pass_retrieving.html.twig",
            [
                'token_valid' => false
            ]);        
        }
    }

}
