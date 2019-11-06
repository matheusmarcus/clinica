<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pacientes
 *
 * @ORM\Table(name="pacientes", indexes={@ORM\Index(name="fk_pacientes_acesso_idx", columns={"acesso_idacesso"})})
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
     * @var int
     *
     * @ORM\Column(name="telefone_celular", type="integer", nullable=false)
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
     * @var \Acesso
     *
     * @ORM\ManyToOne(targetEntity="Acesso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acesso_idacesso", referencedColumnName="id")
     * })
     */
    private $acessoacesso;


}
