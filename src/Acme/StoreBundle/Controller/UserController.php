<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Acme\StoreBundle\Entity\User;


class UserController extends Controller
{
    public function indexAction()
    {
        #$user = $this->getDoctrine()->getRepository('StoreBundle:User')->find(2);

        $users = $this->getDoctrine()->getRepository('StoreBundle:User')->findAll();

        #var_dump( array($users) ); exit();

        return $this->render('StoreBundle:User:index.html.twig', array('users' => $users) );
    }



}
