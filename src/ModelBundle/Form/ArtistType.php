<?php

namespace ModelBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    "label" => "Prénom"
                ])
            ->add(
                'name',
                TextType::class,
                [
                    "label" => "Nom"
                ])
            ->add(
                'gender',
                ChoiceType::class,
                [
                    "label" => "Sexe",
                    "choices" => [
                        "Homme" => "H",
                        "Femme" => "F",
                        "Neutre" => "N"
                    ]
                ])
            ->add(
                'birthDate',
                DateType::class,
                [
                    "label" => "Date de naissance",
                    "widget" => "single_text"
                ])
            ->add(
                'nationality',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\Nationality",
                    "choice_label" => "nationality",
                    "label" => "Nationalité"
                ])
            ->add(
                'moviesActedIn',
                CollectionType::class,
                [
                    "entry_type" => EntityType::class,
                    "entry_options" =>
                        [
                            "class" => "ModelBundle\Entity\Movie",
                            "label" => " ",
                            "choice_label" => "title",
                            "placeholder" => "Choisissez un film"
                        ],
                    "allow_add" => true,
                    "allow_delete" => true,
                    "label" => "Films"
                ])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Valider',
                    'attr' => [
                        "class" => "btn-primary"
                    ]
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ModelBundle\Entity\Artist'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'modelbundle_artist';
    }


}
