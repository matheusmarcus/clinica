<?php

namespace App\Form;

use App\Entity\Funcionarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FuncionariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('dataNascimento', BirthdayType::class)
            ->add('dataAdmissao')
            ->add('sexo', ChoiceType::class,[
                'label' => 'Sexo:',
                'multiple' => false,
                'choices' => [
                    'Masculino' => 'm',
                    'Feminino' => 'f',
                    'Não declarar' => 'n'
                ]
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
