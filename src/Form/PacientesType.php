<?php

namespace App\Form;

use App\Entity\Pacientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacientesType extends AbstractType
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
            ->add('dataCadastro', HiddenType::class, array(
//                'widget' => 'single_text',
//                'format' => 'dd/MM/yyyy',
//                'attr' => array(
//                    'class' => 'datepicker'
//                )
            ))
            ->add('sexo', ChoiceType::class, [
                'label' => 'Sexo',
                'multiple' => false,
                'choices' => [
                    'Masculino' => 'm',
                    'Feminino' => 'f',
                    'Não declarar' => 'n'
                ],
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2'
                )
            ])
            ->add('estadoCivil', ChoiceType::class, array(
                'label' => 'Estado Civil',
                'multiple' => false,
                'choices' => array(
                    'Solteiro(a)' => 'Solteiro(a)',
                    'Casado(a)' => 'Casado(a)',
                    'Divorciado(a)' => 'Divorciado(a)',
                    'Viúvo(a)' => 'Viúvo(a)',
                    'Separado(a)' => 'Separado(a)',
                ),
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('profissao', null, array(
                'label' => 'Profissão'
            ))
            ->add('telefoneCelular', null, array())
            ->add('email', EmailType::class)
            ->add('endereco', null, array(
                'label' => 'Endereço'
            ))
            ->add('uf', ChoiceType::class, array(
                'label' => 'UF',
                'choices' => \App\Form\Constantes\Estados::getArraySiglas(),
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('cidade', null, array())
            ->add('cep', null, array('label' => 'CEP'))
            ->add('bairro', null, array());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pacientes::class,
        ]);
    }
}
