<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exames
 *
 * @ORM\Table(name="exames", indexes={@ORM\Index(name="fk_exames_funcionarios1_idx", columns={"funcionarios_id"}), @ORM\Index(name="fk_exames_pacientes1_idx", columns={"idpacientes"})})
 * @ORM\Entity
 */
class Exames
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
     * @var string
     *
     * @ORM\Column(name="imagens", type="string", length=255, nullable=false)
     */
    private $imagens;

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


}
