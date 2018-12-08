<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 03/12/2018
 * Time: 12:52
 */

namespace App\forms;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\HttpFoundation\Request;


class signUpForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Adresse')
            ->add('Forfait', ChoiceType::class, array('choices'  => array(
                    'XXTENTATION' => 'XXTENTATION',
                    '6ix9ine' => '6ix9ine',
                    'LaPAPA' => 'LaPAPA',
                    'Accompa' => "Accompa")))
            ->add('Code_postal')
            ->add('Email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('Confirmation', PasswordType::class)
            ->add('Save', SubmitType::class, array('label' => 'Enregistrer'));
    }

}