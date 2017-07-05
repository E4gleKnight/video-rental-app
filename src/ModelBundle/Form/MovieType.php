<?php

namespace ModelBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    "label" => "Titre"
                ])
            ->add(
                'duration',
                NumberType::class,
                [
                    "label" => "Durée"
                ])
            ->add(
                'releaseDate',
                DateType::class,
                [
                    "label" => "Date de sortie"
                ])
            ->add(
                'language',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\Language",
                    "choice_label" => "language",
                    "placeholder" => "Choisissez une langue",
                    "label" => "Langue"
                ])
            ->add(
                'nationality',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\Nationality",
                    "choice_label" => "nationality",
                    "placeholder" => "Choisissez une nationalité",
                    "label" => "Nationalité"
                ])
            ->add(
                'category',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\MovieCategory",
                    "choice_label" => "category",
                    "placeholder" => "Choisissez une catégorie",
                    "label" => "Catégorie"
                ])
            ->add(
                'director',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\Artist",
                    "choice_label" => "name",
                    "placeholder" => "Choisissez un réalisateur",
                    "label" => "Réalisateur"
                ])
            ->add(
                'actors',
                EntityType::class,
                [
                    "class" => "ModelBundle\Entity\Artist",
                    "label" => "Acteur",
                    "choice_label" => "name",
                    "multiple" => true
                ])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Valider'
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ModelBundle\Entity\Movie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'modelbundle_movie';
    }


}
