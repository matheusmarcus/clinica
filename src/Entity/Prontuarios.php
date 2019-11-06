<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prontuarios
 *
 * @ORM\Table(name="prontuarios", indexes={@ORM\Index(name="fk_prontuarios_laudos1_idx", columns={"laudos_id"}), @ORM\Index(name="fk_prontuarios_pacientes1_idx", columns={"idpacientes"})})
 * @ORM\Entity
 */
class Prontuarios
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
     * @ORM\Column(name="ds_prontuario", type="text", length=65535, nullable=false)
     */
    private $dsProntuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var \Laudos
     *
     * @ORM\ManyToOne(targetEntity="Laudos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="laudos_id", referencedColumnName="id")
     * })
     */
    private $laudos;

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
