<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5)
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=5)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=20)
     */
    private $longDescription;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $soldout = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $promo = false;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantityInStock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubCategory", inversedBy="productsList")
     */
    private $subCategory;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $content;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $PromoPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $percentageDiscount;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getSoldout(): ?bool
    {
        return $this->soldout;
    }

    public function setSoldout(bool $soldout): self
    {
        $this->soldout = $soldout;

        return $this;
    }

    public function getPromo(): ?bool
    {
        return $this->promo;
    }

    public function setPromo(bool $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getQuantityInStock(): ?int
    {
        return $this->quantityInStock;
    }

    public function setQuantityInStock(int $quantityInStock): self
    {
        $this->quantityInStock = $quantityInStock;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPromoPrice(): ?float
    {
        return $this->PromoPrice;
    }

    public function setPromoPrice(?float $PromoPrice): self
    {
        $this->PromoPrice = $PromoPrice;

        return $this;
    }

    public function getPercentageDiscount(): ?int
    {
        return $this->percentageDiscount;
    }

    public function setPercentageDiscount(?int $percentageDiscount): self
    {
        $this->percentageDiscount = $percentageDiscount;

        return $this;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->title);
    }

    public function getFormattedPrice(): string
    {
        return number_format($this->price, 2, ',', ' ');
    }


    public function getSubCategory(): SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(SubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }

}
