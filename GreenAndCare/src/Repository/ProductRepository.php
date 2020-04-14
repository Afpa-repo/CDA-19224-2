<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Entity\SubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param ProductSearch $search
     * @return Query
     */
    public function findAllVisibleQuery(ProductSearch $search): Query
    {
        $query = $this->findVisibleQuery();

        if ($search->getMaxPrice()) { // condition ajoutée à la query pour select les produits ayant un prix max
            $query = $query
                ->andWhere('p.price <= :maxprice')
                ->setParameter('maxprice', $search->getMaxPrice()); // le param maxprice aura comme valeur getMaxPrice()
        }

        if ($search->getInPromo()) { // condition ajoutée à la query pour select les produits étant en promo
            $query = $query
                ->andWhere('p.promo = true');
        }

        if ($search->getSubCategories()->count() > 0) { // condition ajoutée à la query pour select les produits appartenant à une ou plusieurs sous-catégories
            $key = 0;
            foreach ($search->getSubCategories() as $subCategory) { // pour chacune des sous-catégories sélectionnées on ajoute une condition à la query
                $key++;
                $query = $query
                    ->andWhere(':subCategory = p.subCategory')
                    ->setParameter('subCategory', $subCategory);
            }
        }

        return $query->getQuery();
    }

    /**
     * @return Product[]
     */
    public function findLatest(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.soldout = false')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->where('p.soldout = false');
    }

    /**
     * @param SubCategory $subCategory
     * @return Query
     */
    public function findAllHomeProducts(SubCategory $subCategory): Query
    {
        $query = $this->findVisibleQuery();
        $query = $query
            ->where('p.subCategory = 1')
            ->setParameter('subCategory', $subCategory );

        return $query->getQuery();
    }
}
