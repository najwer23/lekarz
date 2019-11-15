<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LekarzRepository")
 */
class Lekarz
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
}
