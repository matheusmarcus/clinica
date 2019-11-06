<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultas
 *
 * @ORM\Table(name="consultas", indexes={@ORM\Index(name="fk_consultas_funcionarios1_idx", columns={"funcionarios_id"}), @ORM\Index(name="fk_consultas_tipo_consulta1_idx", columns={"tipo_consulta_idtipo_consulta"}), @ORM\Index(name="fk_consultas_pacientes1_idx", columns={"idpacientes"})})
 * @ORM\Entity
 */
class Consultas
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_consulta", type="float", precision=10, scale=0, nullable=false)
     */
    private $valorConsulta;

    /**
     * @var bool
     *
     * @ORM\Column(name="consulta_confirmada", type="boolean", nullable=false)
     */
    private $consultaConfirmada;

    /**
     * @var \Funcionarios
     *
     * @ORM\ManyToOne(targetEntity="Funcionarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionarios_id", referencedColumnName="id")
     * })
     */
    private $funcionarios;

    /**
     * @var \Pacientes
     *
     * @ORM\ManyToOne(targetEntity="Pacientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpacientes", referencedColumnName="id")
     * })
     */
    private $idpacientes;

    /**
     * @var \TipoConsulta
     *
     * @ORM\ManyToOne(targetEntity="TipoConsulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_consulta_idtipo_consulta", referencedColumnName="idtipo_consulta")
     * })
     */
    private $tipoConsultatipoConsulta;


}
