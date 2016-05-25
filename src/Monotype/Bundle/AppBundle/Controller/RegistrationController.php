<?php

namespace Monotype\Bundle\AppBundle\Controller;

use Monotype\Bundle\AppBundle\Entity\User;
use Monotype\Bundle\AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegistrationController
 * @package Monotype\Bundle\AppBundle\Controller
 */
class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('manager_user_index');
        }

        return $this->render(
            '@App/registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
