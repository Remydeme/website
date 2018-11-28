<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserinfoRepository")
 */
class Userinfo
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Users", mappedBy="userInfo", cascade={"persist", "remove"})
     */
    private $userref;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getUserref(): ?Users
    {
        return $this->userref;
    }

    public function setUserref(Users $userref): self
    {
        $this->userref = $userref;

        // set the owning side of the relation if necessary
        if ($this !== $userref->getUserInfo()) {
            $userref->setUserInfo($this);
        }

        return $this;
    }
}
