<?php

namespace App\Repository;

use App\Entity\Indredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Indredient>
 *
 * @method Indredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Indredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Indredient[]    findAll()
 * @method Indredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Indredient::class);
    }

//    /**
//     * @return Indredient[] Returns an array of Indredient objects
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

//    public function findOneBySomeField($value): ?Indredient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
