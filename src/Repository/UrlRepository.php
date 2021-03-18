<?php

namespace App\Repository;

use App\Entity\Url;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Url|null find($id, $lockMode = null, $lockVersion = null)
 * @method Url|null findOneBy(array $criteria, array $orderBy = null)
 * @method Url[]    findAll()
 * @method Url[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 */
class UrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Url::class);
    }


    public function getTopFiveUrl(int $userid): array
    {

        return $this->createQueryBuilder('a')
            ->andWhere('a.user_id = :id')
            ->setParameter('id', $userid)
            ->andWhere('a.click_count IS NOT NULL')
            ->orderBy('a.click_count', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }



    public function getFavriteUrl(int $userid): array
    {

        return $this->createQueryBuilder('q')
            ->andWhere('q.user_id = :id')
            ->setParameter('id', $userid)
            ->andWhere('q.favorite =true')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();


    }

    // /**
    //  * @return Url[] Returns an array of Url objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Url
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
