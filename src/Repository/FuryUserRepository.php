<?php

namespace App\Repository;

use App\Entity\FuryUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FuryUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuryUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuryUser[]    findAll()
 * @method FuryUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuryUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FuryUser::class);
    }

//    /**
//     * @return FuryUser[] Returns an array of FuryUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FuryUser
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
