<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RezerwacjaRepository")
 */
class Rezerwacja
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="integer")
     */
    private $idKlienta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idLekarz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $godzina;

    public function getId()
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getIdKlienta(): ?int
    {
        return $this->idKlienta;
    }

    public function setIdKlienta(int $idKlienta): self
    {
        $this->idKlienta = $idKlienta;

        return $this;
    }

    public function getIdLekarz(): ?int
    {
        return $this->idLekarz;
    }

    public function setIdLekarz(?int $idLekarz): self
    {
        $this->idLekarz = $idLekarz;

        return $this;
    }

    public function getGodzina(): ?string
    {
        return $this->godzina;
    }

    public function setGodzina(string $godzina): self
    {
        $this->godzina = $godzina;

        return $this;
    }

}
