<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionarios
 *
 * @ORM\Table(name="funcionarios")
 * @ORM\Entity(repositoryClass="App\Repository\FuncionarioRepository")
 */
class Funcionarios
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date", nullable=false)
     */
    private $dataNascimento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_admissao", type="date", nullable=false)
     */
    private $dataAdmissao;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_celular", type="string", length=11, nullable=false)
     */
    private $telefoneCelular;

    /**
     * @var bool
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
    */
    private $ativo;

    public function __construct()
    {
        return $this->nome;
    }

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
     * @return \DateTime
     */
    public function getDataNascimento(): ?\DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     */
    public function setDataNascimento(\DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return \DateTime
     */
    public function getDataAdmissao(): ?\DateTime
    {
        return $this->dataAdmissao;
    }

    /**
     * @param \DateTime $dataAdmissao
     */
    public function setDataAdmissao(\DateTime $dataAdmissao): void
    {
        $this->dataAdmissao = $dataAdmissao;
    }

    /**
     * @return string
     */
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string
     */
    public function getTelefoneCelular(): ?string
    {
        return $this->telefoneCelular;
    }

    /**
     * @param string $telefoneCelular
     */
    public function setTelefoneCelular(string $telefoneCelular): void
    {
        $this->telefoneCelular = $telefoneCelular;
    }

    /**
     * @return bool
     */
    public function isAtivo(): ?bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     */
    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }

    public function __toString()
    {
        return $this->getNome();
    }


}
