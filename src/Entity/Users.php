<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\userinfo", inversedBy="userref", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userInfo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUserInfo(): ?userinfo
    {
        return $this->userInfo;
    }

    public function setUserInfo(userinfo $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }
}
