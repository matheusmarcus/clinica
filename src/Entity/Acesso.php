<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acesso
 *
 * @ORM\Table(name="acesso", uniqueConstraints={@ORM\UniqueConstraint(name="idacesso_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_acesso_perfil1_idx", columns={"perfil_idperfil"})})
 * @ORM\Entity
 */
class Acesso
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
     * @ORM\Column(name="usuario", type="string", length=45, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="decimal", precision=8, scale=0, nullable=false)
     */
    private $password;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perfil_idperfil", referencedColumnName="idperfil")
     * })
     */
    private $perfilperfil;

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
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return \Perfil
     */
    public function getPerfilperfil(): \Perfil
    {
        return $this->perfilperfil;
    }

    /**
     * @param \Perfil $perfilperfil
     */
    public function setPerfilperfil(\Perfil $perfilperfil): void
    {
        $this->perfilperfil = $perfilperfil;
    }


}
