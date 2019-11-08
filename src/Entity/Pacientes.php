<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pacientes
 *
 * @ORM\Table(name="pacientes")
 * @ORM\Entity
 */
class Pacientes
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
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=false)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_civil", type="string", length=16, nullable=false)
     */
    private $estadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="profissao", type="string", length=20, nullable=false)
     */
    private $profissao;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_celular", type="string", length=11, nullable=false)
     */
    private $telefoneCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=50, nullable=false)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=45, nullable=false)
     */
    private $cidade;

    /**
     * @var int
     *
     * @ORM\Column(name="cep", type="integer", nullable=false)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=45, nullable=false)
     */
    private $bairro;

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
    public function getDataCadastro(): ?\DateTime
    {
        return $this->dataCadastro;
    }

    /**
     * @param \DateTime $dataCadastro
     */
    public function setDataCadastro(\DateTime $dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
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
    public function getEstadoCivil(): ?string
    {
        return $this->estadoCivil;
    }

    /**
     * @param string $estadoCivil
     */
    public function setEstadoCivil(string $estadoCivil): void
    {
        $this->estadoCivil = $estadoCivil;
    }

    /**
     * @return string
     */
    public function getProfissao(): ?string
    {
        return $this->profissao;
    }

    /**
     * @param string $profissao
     */
    public function setProfissao(string $profissao): void
    {
        $this->profissao = $profissao;
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
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getUf(): ?string
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf(string $uf): void
    {
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     */
    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @return int
     */
    public function getCep(): ?int
    {
        return $this->cep;
    }

    /**
     * @param int $cep
     */
    public function setCep(int $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }


}
