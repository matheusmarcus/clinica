<?php

namespace App\Form;

use App\Entity\Consultas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data')
            ->add('valorConsulta')
            ->add('consultaConfirmada')
            ->add('funcionarios')
            ->add('idpacientes')
            ->add('tipoConsultatipoConsulta')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultas::class,
        ]);
    }
}
