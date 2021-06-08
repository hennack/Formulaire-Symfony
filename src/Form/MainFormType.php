<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;



// Création du formulaire: champs, description et contriantes


class MainFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // Création du champ prénom + contraintes
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom :',
                'required' => true,
                'constraints' => new Length([
                    'min' => 2,
                    'minMessage' => 'Ce champ doit contenir 5 caractères minimum',
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ])
            // Création du champ nom + contraintes
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom :',
                'required' => true,
                'constraints' => new Length([
                    'min' => 2,
                    'minMessage' => 'Ce champ doit contenir 5 caractères minimum',
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom'
                ]
            ])
            // Création du champ email + contraintes
            ->add('email', EmailType::class, [
                'label' => 'Votre Email :', 
                'required' => true,
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email'
                ]
            ])
            // Création du champ téléphone + contraintes
            ->add('phone', TelType::class, [
                'label' => 'Votre téléphone :',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone'
                ]
            ])
            // Création du champ adresse + contraintes
            ->add('address', TextareaType::class, [
                'label' => 'Votre adresse :',
                'required' => true, 
                'attr' => [
                    'placeholder' => 'Entrez votre adresse'
                ]
            ])
            // Création du champ pays + contraintes
            ->add('country', CountryType::class, [
                'label' => 'Choisissez votre pays :',
                'required' => true,
                
                
            ])
            // Création du boutton de validation
            ->add('submit', SubmitType::class, [
                'label' => "Valider",
                'attr' => [
                    'class' => 'btn-block btn btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
