<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoConsulta
 *
 * @ORM\Table(name="tipo_consulta")
 * @ORM\Entity
 */
class TipoConsulta
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtipo_consulta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoConsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=false)
     */
    private $descricao;

    /**
     * @return int
     */
    public function getIdtipoConsulta(): int
    {
        return $this->idtipoConsulta;
    }

    /**
     * @param int $idtipoConsulta
     */
    public function setIdtipoConsulta(int $idtipoConsulta): void
    {
        $this->idtipoConsulta = $idtipoConsulta;
    }

    /**
     * @return string
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function __toString()
    {
        return $this->getNome();
    }

}
