<?php

namespace App\Repository;

use App\Entity\Ingediant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ingediant>
 *
 * @method Ingediant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ingediant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ingediant[]    findAll()
 * @method Ingediant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngediantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ingediant::class);
    }

//    /**
//     * @return Ingediant[] Returns an array of Ingediant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ingediant
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
