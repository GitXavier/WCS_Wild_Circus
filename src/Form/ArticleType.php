<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('content')
            ->add('image', ChoiceType::class, [
                'label' => 'Image',
                'choices'  => [
                    'Ticket Enfant' => 'ticket-enfant.jpg',
                    'Ticket Groupe' => 'ticket10.png',
                    'Ticket' => 'ticket.png',
                    'Ticket VIP' => 'ticket-vip.jpg'
            ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
