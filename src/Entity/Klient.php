<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlientRepository")
 */
class Klient
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
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $miasto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ulica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numerDomu;

    public function getId()
    {
        return $this->id;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
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

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getMiasto(): ?string
    {
        return $this->miasto;
    }

    public function setMiasto(string $miasto): self
    {
        $this->miasto = $miasto;

        return $this;
    }

    public function getUlica(): ?string
    {
        return $this->ulica;
    }

    public function setUlica(string $ulica): self
    {
        $this->ulica = $ulica;

        return $this;
    }

    public function getNumerDomu(): ?string
    {
        return $this->numerDomu;
    }

    public function setNumerDomu(string $numerDomu): self
    {
        $this->numerDomu = $numerDomu;

        return $this;
    }
}
