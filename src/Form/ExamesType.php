<?php

namespace App\Form;

use App\Entity\Exames;
use App\Entity\Funcionarios;
use App\Entity\Pacientes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('imagens', FileType::class, [
                'required' => false,
                'attr' => [
                    'class' => '',
                ],
                'data_class' => null
            ])
            ->add('funcionarios', EntityType::class, array(
                'label' => 'Funcionário',
                'placeholder' => '-- Selecione --',
                'multiple' => false,
                'class'=> Funcionarios::class,
                'choice_label' => 'nome',
                'attr' => array(
                    'class' => 'select2'
                ),

            ))
            ->add('idpacientes', EntityType::class, array(
                'label' => 'Paciente',
                'placeholder' => '-- Selecione --',
                'multiple' => false,
                'class'=> Pacientes::class,
                'choice_label' => 'nome',
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
