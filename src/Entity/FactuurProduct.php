<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurProductRepository")
 */
class FactuurProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuur", inversedBy="factuurProducts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Factuur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Producten", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Product;

    /**
     * @ORM\Column(type="integer")
     */
    private $Product_aantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuur(): ?Factuur
    {
        return $this->Factuur;
    }

    public function setFactuur(?Factuur $Factuur): self
    {
        $this->Factuur = $Factuur;

        return $this;
    }

    public function getProduct(): ?Producten
    {
        return $this->Product;
    }

    public function setProduct(Producten $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getProductAantal(): ?int
    {
        return $this->Product_aantal;
    }

    public function setProductAantal(int $Product_aantal): self
    {
        $this->Product_aantal = $Product_aantal;

        return $this;
    }
}
