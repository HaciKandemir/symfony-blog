<?php

namespace App\Repository;

use App\Entity\InSiteSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InSiteSetting|null find($id, $lockMode = null, $lockVersion = null)
 * @method InSiteSetting|null findOneBy(array $criteria, array $orderBy = null)
 * @method InSiteSetting[]    findAll()
 * @method InSiteSetting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InSiteSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InSiteSetting::class);
    }

    // /**
    //  * @return InSiteSetting[] Returns an array of InSiteSetting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InSiteSetting
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
