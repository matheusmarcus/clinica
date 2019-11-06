<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Receitas
 *
 * @ORM\Table(name="receitas", indexes={@ORM\Index(name="fk_receitas_pacientes1_idx", columns={"pacientes_idpacientes"})})
 * @ORM\Entity
 */
class Receitas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ds_receita", type="string", length=45, nullable=false)
     */
    private $dsReceita;

    /**
     * @var \Pacientes
     *
     * @ORM\ManyToOne(targetEntity="Pacientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pacientes_idpacientes", referencedColumnName="id")
     * })
     */
    private $pacientespacientes;


}
