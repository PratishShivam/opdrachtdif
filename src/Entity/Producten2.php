<?php

namespace App\Entity;

use App\Repository\Producten2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Producten2Repository::class)
 */
class Producten2
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Productnaam;

    /**
     * @ORM\Column(type="float")
     */
    private $Prices;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductnaam(): ?string
    {
        return $this->Productnaam;
    }

    public function setProductnaam(string $Productnaam): self
    {
        $this->Productnaam = $Productnaam;

        return $this;
    }

    public function getPrices(): ?float
    {
        return $this->Prices;
    }

    public function setPrices(float $Prices): self
    {
        $this->Prices = $Prices;

        return $this;
    }
}
