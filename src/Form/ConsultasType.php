<?php

namespace App\Form;

use App\Entity\Consultas;
use App\Entity\Pacientes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\Money;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data', DateType::class, array(
                'label' => 'Data',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )
            ))
            ->add('valorConsulta', MoneyType::class, array(
                'label' => 'Valor da Consulta',
                'currency' => 'BRL'
            ))
            ->add('consultaConfirmada', CheckboxType::class, array(
                'label' => 'Consulta confirmada'
            ))
            ->add('funcionarios', ChoiceType::class, array(
                'label' => 'Funcionários',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('idpacientes', EntityType::class, array(
                'label' => 'Paciente',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'class'=> Pacientes::class,
                'choice_label' => 'nome',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('tipoConsultatipoConsulta', ChoiceType::class, array(
                'label' => 'Tipo de Consulta',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'attr' => array(
                    'class' => 'select2'
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultas::class,
        ]);
    }
}
