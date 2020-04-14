<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ProductSearch
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var bool|null
     */
    private $inPromo;

    /**
     * @var ArrayCollection
     */
    public $subCategories;

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
    }

    /**
     * @return bool|null
     */
    public function getInPromo(): ?bool
    {
        return $this->inPromo;
    }

    /**
     * @param bool|null $inPromo
     * @return ProductSearch
     */
    public function setInPromo(bool $inPromo): ProductSearch
    {
        $this->inPromo = $inPromo;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return ProductSearch
     */
    public function setMaxPrice(int $maxPrice): ProductSearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSubCategories(): ArrayCollection
    {
        return $this->subCategories;
    }

    /**
     * @param ArrayCollection $subCategories
     */
    public function setSubCategories(ArrayCollection $subCategories): void
    {
        $this->subCategories = $subCategories;
    }

}