<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Acesso
 *
 * @ORM\Table(name="acesso", indexes={@ORM\Index(name="fk_acesso_funcionarios1_idx", columns={"funcionarios_id"}), @ORM\Index(name="fk_acesso_perfil1_idx", columns={"perfil_idperfil"})})
 * @ORM\Entity
 */
class Acesso implements UserInterface
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
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

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
    public function getId(): ?int
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
    public function getUsuario(): ?string
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
    public function getPassword(): ?string
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


    public function getRoles()
    {
        return !$this->roles ? [] : explode(',', $this->roles);
    }
    public function setRoles($roles):Acesso
    {
        $this->roles = implode(',' , $roles);
        return $this;
    }

    /**
     * @return Funcionarios
     */
    public function getFuncionarios(): ?Funcionarios
    {
        return $this->funcionarios;
    }

    /**
     * @param Funcionarios $funcionarios
     */
    public function setFuncionarios(Funcionarios $funcionarios): void
    {
        $this->funcionarios = $funcionarios;
    }

    /**
     * @return Perfil
     */
    public function getPerfil(): ?Perfil
    {
        return $this->perfilperfil;
    }

    /**
     * @param Perfil $perfilperfil
     */
    public function setPerfil(Perfil $perfilperfil): void
    {
        $this->perfilperfil = $perfilperfil;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getUsuario();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
    }

    public function __toString()
    {
        return $this->getUsuario();
    }


}
