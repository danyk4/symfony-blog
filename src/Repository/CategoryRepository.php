<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getPopularList(): array
    {
        $sql = '
            SELECT
                category.name,
                COUNT(post.id) AS postsCnt
            FROM category
            INNER JOIN post ON post.category_id = category.id
            GROUP BY category.id
        ';

        return $this->getEntityManager()
            ->getConnection()
            ->prepare($sql)
            ->executeQuery()
            ->fetchAllAssociative();
    }
}
