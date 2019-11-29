<?php

namespace App\Form;

use App\Entity\Consultas;
use App\Entity\Funcionarios;
use App\Entity\Pacientes;
use App\Repository\AcessoRepository;
use App\Repository\FuncionarioRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\Money;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class ConsultasType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data', DateTimeType::class, array(
                'label' => 'Data',
//                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy H:i:s',
                'widget' => 'choice',
                'hours' => range(8, 16),
                'minutes' => [0],
                'years' => [Date('Y')],
                'placeholder' => [
                    'year' => 'Ano', 'month' => 'Mês', 'day' => 'Dia',
                    'hour' => 'Horas', 'minute' => 'Minutos', 'second' => 'Segundos',
                ],

//                'widget' => 'single_text',
//                'format' => 'dd/MM/yyyy',
//                'attr' => array(
////                    'class' => 'datetimepicker'
//                )
            ))
            ->add('valorConsulta', MoneyType::class, array(
                'label' => 'Valor da Consulta',
                'currency' => 'BRL'
            ))
            ->add('consultaConfirmada', CheckboxType::class, array(
                'label' => 'Consulta confirmada',
                'required' => false
            ))
            ->add('funcionarios', EntityType::class, array(
                'label' => 'Psicólogo',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'class' => Funcionarios::class,
                'choice_label' => 'nome',
                'attr' => array(
                    'class' => 'select2'
                ),
                'choices' => $options['psicologos'],
            ))
            ->add('idpacientes', EntityType::class, array(
                'label' => 'Paciente',
                'multiple' => false,
                'placeholder' => '-- Selecione --',
                'class' => Pacientes::class,
                'choice_label' => 'nome',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('tipoConsultatipoConsulta', null, array(
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
            'psicologos' => array()
        ]);
    }
}
