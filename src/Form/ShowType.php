<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\Program;
use App\Entity\Show;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('content')
            ->add('image', ChoiceType::class, [
                'label' => 'Image',
                'choices'  => [
                    'Clown' => 'clowns.jpg',
                    'Moto' => 'moto.jpg',
                    'Fort' => 'fort.jpg',
                    'Animaux' => 'animaux.jpg',
                    'Tigre' => 'tigre.jpg',
                    'Acrobate' => 'acrobate.jpg',
                    'Illusionniste' => 'illusionniste.jpg',
                    'Magicien' => 'magicien.jpg'
                ]])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'choice_label' => 'firstname',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.firstname', 'ASC');
                },
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Show::class,
        ]);
    }
}
