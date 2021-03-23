<?php

namespace App\Form;

use App\Entity\Realisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RealisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,
                ['label'=>'Nom du Réalisateur'])
            ->add('prenom',TextType::class,
                ['label'=>'Prenom du Réalisateur'])
            ->add('ville',TextType::class,
                ['label'=>'Ville'])
            ->add('codepostale',TextType::class,
                ['label'=>'Code Postal'])
            ->add('pays',TextType::class,
                ['label'=>'Pays'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Realisateur::class,
        ]);
    }
}
