<?php

namespace App\Form;

use App\Entity\Exames;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )
            ))
            ->add('imagens')
            ->add('funcionarios', ChoiceType::class, array(
                'label' => 'Funcionário',
                'placeholder' => '-- Selecione --',
                'multiple' => false,
                'attr' => array(
                    'class' => 'select2'
                ),

            ))
            ->add('idpacientes', ChoiceType::class, array(
                'label' => 'Paciente',
                'placeholder' => '-- Selecione --',
                'multiple' => false,
                'attr' => array(
                    'class' => 'select2'
                ),

            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exames::class,
        ]);
    }
}
