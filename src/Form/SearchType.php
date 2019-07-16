<?php

namespace App\Form;

use App\Entity\Domain;
use App\Entity\Skill;
use App\Entity\Style;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add(
                'program',
                null,
                [
                    'label' => 'Rechercher une représentation par ville',
                    'required' => false
                ]
            )
            ->add('Rechercher', SubmitType::class);
    }
}