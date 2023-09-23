<?php

namespace App\Repository;

use App\Entity\Symftable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Symftable>
 *
 * @method Symftable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Symftable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Symftable[]    findAll()
 * @method Symftable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymftableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Symftable::class);
    }

//    /**
//     * @return Symftable[] Returns an array of Symftable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Symftable
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
