<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21/11/2018
 * Time: 00:29
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
    class AutoEcole extends AbstractController
    {
        /**
         * @route("/")
         */
        public function index(){
               return  $this->render('home.html.twig', []);
        }

        /**
         * @route("/permis-b")
         */
        public function permisb(){
            return  $this->render('permisb.html.twig', []);
        }

        /**
         * @route("/contacts")
         */
        public function contacts(){
            return  $this->render('Contacts.html.twig', []);
        }

        /**
         * @route("/permis-accompagne")
         */
        public function permisaccompagne(){
            return  $this->render('permisaccompagne.html.twig', []);
        }

        /**
         * @route("/permis-accompagne")
         */
        public function userSpace(){
            return  $this->render('userSpace.html.twig', []);
        }

        /**
         * @route("/login")
         */
        public function login(AuthenticationUtils $authenticationUtils) : Response {
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('login.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error
            ]);
        }
    }