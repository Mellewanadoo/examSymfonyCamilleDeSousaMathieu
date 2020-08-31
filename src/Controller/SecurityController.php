<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordRequestFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/redefine-password", name="app_redefine_password")
     */
    public function redefinePassword(EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class, new User());
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()) {
            $user = $this->getUser();
            $user->setRedefinePassword(true);

            $user->setPassword(
                $passwordEncoder->encodePassword($user, $form->get('plainPassword')->getData()));
            $em->flush();

            return $this->redirectToRoute('default');
        } else {
            return $this->render('security/resetting.html.twig', ['form'=> $form->createView()]);
        }
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return $this->redirectToRoute('app_login');
    }
}
