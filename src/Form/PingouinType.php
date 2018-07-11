<?php

namespace App\Form;

use App\Entity\Tribu;
use App\Entity\Pingouin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PingouinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('couleur')
            ->add('image')
            ->add('tribu', EntityType::class, [
                'class' => Tribu::class,
                'choice_label' => 'nom', // nom: le champs de la bdd à afficher dans la liste déroulante
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pingouin::class,
        ]);
    }
}
