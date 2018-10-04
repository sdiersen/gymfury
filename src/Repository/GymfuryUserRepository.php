<?php

namespace App\Repository;

use App\Entity\GymfuryUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GymfuryUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method GymfuryUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method GymfuryUser[]    findAll()
 * @method GymfuryUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GymfuryUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GymfuryUser::class);
    }

//    /**
//     * @return GymfuryUser[] Returns an array of GymfuryUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GymfuryUser
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
