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
     * @var Funcionarios
     *
     * @ORM\ManyToOne(targetEntity="Funcionarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionarios_id", referencedColumnName="id")
     * })
     */
    private $funcionarios;

    /**
     * @var Pacientes
     *
     * @ORM\ManyToOne(targetEntity="Pacientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpacientes", referencedColumnName="id")
     * })
     */
    private $idpacientes;

    /**
     * @var TipoConsulta
     *
     * @ORM\ManyToOne(targetEntity="TipoConsulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_consulta_idtipo_consulta", referencedColumnName="idtipo_consulta")
     * })
     */
    private $tipoConsultatipoConsulta;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getData(): ?\DateTime
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     */
    public function setData(\DateTime $data): void
    {
        $this->data = $data;
    }

    /**
     * @return float
     */
    public function getValorConsulta(): ?float
    {
        return $this->valorConsulta;
    }

    /**
     * @param float $valorConsulta
     */
    public function setValorConsulta(float $valorConsulta): void
    {
        $this->valorConsulta = $valorConsulta;
    }

    /**
     * @return bool
     */
    public function isConsultaConfirmada(): ?bool
    {
        return $this->consultaConfirmada;
    }

    /**
     * @param bool $consultaConfirmada
     */
    public function setConsultaConfirmada(bool $consultaConfirmada): void
    {
        $this->consultaConfirmada = $consultaConfirmada;
    }

    /**
     * @return Funcionarios
     */
    public function getFuncionarios(): ?Funcionarios
    {
        return $this->funcionarios;
    }

    /**
     * @param Funcionarios $funcionarios
     */
    public function setFuncionarios(Funcionarios $funcionarios): void
    {
        $this->funcionarios = $funcionarios;
    }

    /**
     * @return Pacientes
     */
    public function getIdpacientes(): ?Pacientes
    {
        return $this->idpacientes;
    }

    /**
     * @param Pacientes $idpacientes
     */
    public function setIdpacientes(Pacientes $idpacientes): void
    {
        $this->idpacientes = $idpacientes;
    }

    /**
     * @return TipoConsulta
     */
    public function getTipoConsultatipoConsulta(): ?TipoConsulta
    {
        return $this->tipoConsultatipoConsulta;
    }

    /**
     * @param TipoConsulta $tipoConsultatipoConsulta
     */
    public function setTipoConsultatipoConsulta(TipoConsulta $tipoConsultatipoConsulta): void
    {
        $this->tipoConsultatipoConsulta = $tipoConsultatipoConsulta;
    }



}
