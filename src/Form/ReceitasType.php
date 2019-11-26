<?php

namespace App\Form;

use App\Entity\Receitas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReceitasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dsReceita', null, array(
                'label' => 'Descrição',
            ))
            ->add('pacientespacientes', ChoiceType::class, array(
                'label' => 'Paciente',
                'attr' => array(
                    'class' => 'select2'
                ),
                'multiple' => false,
                'placeholder' => '-- Selecione --',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Receitas::class,
        ]);
    }
}
