<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Show;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('address')
            ->add('cp')
            ->add('city')
            ->add('birthdate')
            ->add('phone')
            ->add('role')

            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices'  => [
                    'Client' => 'Client',
                    'Artiste' => 'Artiste',
                ]])

            ->add('mail')
            ->add('password')
            ->add('spectacle', EntityType::class, [
                'class' => Show::class,
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
