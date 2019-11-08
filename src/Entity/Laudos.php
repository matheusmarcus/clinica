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
     * @var Exames
     *
     * @ORM\ManyToOne(targetEntity="Exames")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exames_id", referencedColumnName="id")
     * })
     */
    private $exames;

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
    public function getDsLaudo(): ?string
    {
        return $this->dsLaudo;
    }

    /**
     * @param string $dsLaudo
     */
    public function setDsLaudo(string $dsLaudo): void
    {
        $this->dsLaudo = $dsLaudo;
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
     * @return Exames
     */
    public function getExames(): ?Exames
    {
        return $this->exames;
    }

    /**
     * @param Exames $exames
     */
    public function setExames(Exames $exames): void
    {
        $this->exames = $exames;
    }


}
