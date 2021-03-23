<?php

namespace App\Form;

use App\Entity\Disque;
use App\Entity\Rayon;
use App\Entity\Realisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,
                ['label'=>'Nom du disque'])
            ->add('nombbreTitres', IntegerType::class,[
                'label'=>'Nombre de titres'
            ])
            ->add('editeur',TextType::class,
                ['label'=>'Nom de l \'éditeur'])
            ->add('dateSorties',DateTimeType::class,[
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],])
            ->add('realisateur', EntityType::class,[
                'choice_label' =>'nom',
                'class'=>Realisateur::class,
                'placeholder'=>'choisir un réalisateur'
            ])
            ->add('rayon', EntityType::class,[
                'choice_label' =>'typeDisque',
                'class'=>Rayon::class,
                'placeholder'=>'choisir un rayon'
            ])
            ->add('description', TextType::class,[
                'label'=>'Description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Disque::class,
        ]);
    }
}
