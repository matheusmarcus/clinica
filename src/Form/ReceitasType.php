<?php

namespace App\Form;

use App\Entity\Receitas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReceitasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dsReceita', DateType::class, array(
                'label' => 'Data da Receita',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )
            ))
            ->add('pacientespacientes', null, array(
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
