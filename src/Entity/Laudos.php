<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laudos
 *
 * @ORM\Table(name="laudos", indexes={@ORM\Index(name="fk_laudos_exames1_idx", columns={"exames_id"})})
 * @ORM\Entity
 */
class Laudos
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
     * @ORM\Column(name="ds_laudo", type="text", length=65535, nullable=false)
     */
    private $dsLaudo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var \Exames
     *
     * @ORM\ManyToOne(targetEntity="Exames")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exames_id", referencedColumnName="id")
     * })
     */
    private $exames;


}
