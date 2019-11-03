<?php

namespace App\Form;

use App\Entity\Funcionarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FuncionariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('dataNascimento')
            ->add('dataAdmissao')
            ->add('sexo')
            ->add('telefoneCelular')
            ->add('idacesso')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Funcionarios::class,
        ]);
    }
}
