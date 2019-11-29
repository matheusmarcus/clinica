<?php

namespace App\Form;

use App\Entity\Funcionarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FuncionariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('dataNascimento', BirthdayType::class, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )
            ))
//            ->add('dataAdmissao', DateType::class, array(
//                'widget' => 'single_text',
//                'format' => 'dd/MM/yyyy',
//                'attr' => array(
//                    'class' => 'datepicker'
//                )
//            ))
            ->add('sexo', ChoiceType::class, [
                'label' => 'Sexo:',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'choices' => [
                    'Masculino' => 'm',
                    'Feminino' => 'f',
                    'Não declarar' => 'n'
                ],
                'attr' => array(
                    'class' => 'select2'
                )
            ])
            ->add('telefoneCelular')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Funcionarios::class,
        ]);
    }
}
