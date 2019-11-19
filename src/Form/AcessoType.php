<?php

namespace App\Form;

use App\Entity\Acesso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcessoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario')
            ->add('password', PasswordType::class)
//            ->add('funcionarios')
//            ->add('pacientes')
            ->add('perfil', null, [
                'required' => true,
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2',
                ),
            ])
            ->add('roles', ChoiceType::class, array(
                'label' => 'Permissões:',
                'multiple' => true,
                'placeholder' => '-- Selecione --',
                'choices' => array(
//                    '-- Selecione --' => '',
                    'Administrador' => 'ROLE_ADMIN',
                    'Psicologo' => 'ROLE_PSICOLOGO',
                    'Atendente' => 'ROLE_ATENDENTE',
                    'Paciente' => 'ROLE_PACIENTE',
                ),
                'attr' => array(
                    'class' => 'select2',
                    'multiple' => 'multiple',
                    'placeholder' => '-- Selecione --',
                    'dir' => 'ltr'
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Acesso::class,
        ]);
    }
}
