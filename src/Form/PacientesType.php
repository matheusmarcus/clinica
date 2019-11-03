<?php

namespace App\Form;

use App\Entity\Pacientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('dataNascimento')
            ->add('dataCadastro')
            ->add('sexo')
            ->add('estadoCivil')
            ->add('profissao')
            ->add('telefoneCelular')
            ->add('email')
            ->add('endereco')
            ->add('uf')
            ->add('cidade')
            ->add('cep')
            ->add('bairro')
            ->add('acessoacesso')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pacientes::class,
        ]);
    }
}
