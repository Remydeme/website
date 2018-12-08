<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21/11/2018
 * Time: 00:29
 */

namespace App\Controller;


use App\Entity\Student;
use App\Entity\Userinfo;
use App\forms\signUpForm;
use App\forms\signUpFormType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        public function contacts(EntityManagerInterface $em, Request $request){
           $form = $this->createForm(signUpForm::class);
           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()){
               $data = $form->getData();
               $user = new Student();
               $user->setAdress($data['Adresse']);
               $user->setFirstname($data['Prenom']);
               $user->setName($data['Nom']);
               $user->setEmail($data['Email']);
               $user->setForfait($data['Forfait']);
               $user->setPassword($data['Password']);
               $em->persist($user);
               $em->flush();
           }
           return $this->render('Contacts.html.twig', [
               'signUpForm' => $form->createView(),
           ]);
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