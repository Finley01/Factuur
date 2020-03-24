<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductenRepository")
 */
class Producten
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
    private $Product_omschrijving;

    /**
     * @ORM\Column(type="float")
     */
    private $Product_prijs;

    /**
     * @ORM\Column(type="integer")
     */
    private $Product_btw;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductOmschrijving(): ?string
    {
        return $this->Product_omschrijving;
    }

    public function setProductOmschrijving(string $Product_omschrijving): self
    {
        $this->Product_omschrijving = $Product_omschrijving;

        return $this;
    }

    public function getProductPrijs(): ?float
    {
        return $this->Product_prijs;
    }

    public function setProductPrijs(float $Product_prijs): self
    {
        $this->Product_prijs = $Product_prijs;

        return $this;
    }

    public function getProductBtw(): ?int
    {
        return $this->Product_btw;
    }

    public function setProductBtw(int $Product_btw): self
    {
        $this->Product_btw = $Product_btw;

        return $this;
    }
}
