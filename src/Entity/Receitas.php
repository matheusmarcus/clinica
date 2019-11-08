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
     * @var Pacientes
     *
     * @ORM\ManyToOne(targetEntity="Pacientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pacientes_idpacientes", referencedColumnName="id")
     * })
     */
    private $pacientespacientes;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return string
     */
    public function getDsReceita(): ?string
    {
        return $this->dsReceita;
    }

    /**
     * @param string $dsReceita
     */
    public function setDsReceita(string $dsReceita): void
    {
        $this->dsReceita = $dsReceita;
    }

    /**
     * @return Pacientes
     */
    public function getPacientespacientes(): ?Pacientes
    {
        return $this->pacientespacientes;
    }

    /**
     * @param Pacientes $pacientespacientes
     */
    public function setPacientespacientes(Pacientes $pacientespacientes): void
    {
        $this->pacientespacientes = $pacientespacientes;
    }


}
