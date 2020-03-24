<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Klant;

    /**
     * @ORM\Column(type="date")
     */
    private $Factuur_vervaldatum;

    /**
     * @ORM\Column(type="date")
     */
    private $Factuur_datum;

    /**
     * @ORM\Column(type="integer")
     */
    private $Factuur_nr;

    /**
     * @ORM\Column(type="integer")
     */
    private $Factuur_korting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurProduct", mappedBy="Factuur")
     */
    private $factuurProducts;

    public function __construct()
    {
        $this->factuurProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlant(): ?Klant
    {
        return $this->Klant;
    }

    public function setKlant(?Klant $Klant): self
    {
        $this->Klant = $Klant;

        return $this;
    }

    public function getFactuurVervaldatum(): ?\DateTimeInterface
    {
        return $this->Factuur_vervaldatum;
    }

    public function setFactuurVervaldatum(\DateTimeInterface $Factuur_vervaldatum): self
    {
        $this->Factuur_vervaldatum = $Factuur_vervaldatum;

        return $this;
    }

    public function getFactuurDatum(): ?\DateTimeInterface
    {
        return $this->Factuur_datum;
    }

    public function setFactuurDatum(\DateTimeInterface $Factuur_datum): self
    {
        $this->Factuur_datum = $Factuur_datum;

        return $this;
    }

    public function getFactuurNr(): ?int
    {
        return $this->Factuur_nr;
    }

    public function setFactuurNr(int $Factuur_nr): self
    {
        $this->Factuur_nr = $Factuur_nr;

        return $this;
    }

    public function getFactuurKorting(): ?int
    {
        return $this->Factuur_korting;
    }

    public function setFactuurKorting(int $Factuur_korting): self
    {
        $this->Factuur_korting = $Factuur_korting;

        return $this;
    }

    /**
     * @return Collection|FactuurProduct[]
     */
    public function getFactuurProducts(): Collection
    {
        return $this->factuurProducts;
    }

    public function addFactuurProduct(FactuurProduct $factuurProduct): self
    {
        if (!$this->factuurProducts->contains($factuurProduct)) {
            $this->factuurProducts[] = $factuurProduct;
            $factuurProduct->setFactuur($this);
        }

        return $this;
    }

    public function removeFactuurProduct(FactuurProduct $factuurProduct): self
    {
        if ($this->factuurProducts->contains($factuurProduct)) {
            $this->factuurProducts->removeElement($factuurProduct);
            // set the owning side to null (unless already changed)
            if ($factuurProduct->getFactuur() === $this) {
                $factuurProduct->setFactuur(null);
            }
        }

        return $this;
    }
}
