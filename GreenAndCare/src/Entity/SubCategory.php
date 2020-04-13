<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubCategoryRepository")
 */
class SubCategory
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="subCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="subCategory")
     */
    private $productsList;

    public function __construct()
    {
        $this->productsList = new ArrayCollection();
    }

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductsList(): Collection
    {
        return $this->productsList;
    }

    public function addProductsList(Product $productsList): self
    {
        if (!$this->productsList->contains($productsList)) {
            $this->productsList[] = $productsList;
            $productsList->setSubCategory($this);
        }

        return $this;
    }

    public function removeProductsList(Product $productsList): self
    {
        if ($this->productsList->contains($productsList)) {
            $this->productsList->removeElement($productsList);
            // set the owning side to null (unless already changed)
            if ($productsList->getSubCategory() === $this) {
                $productsList->setSubCategory(null);
            }
        }

        return $this;
    }
}
