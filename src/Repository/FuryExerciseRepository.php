<?php

namespace App\Repository;

use App\Entity\FuryExercise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FuryExercise|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuryExercise|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuryExercise[]    findAll()
 * @method FuryExercise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuryExerciseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FuryExercise::class);
    }

    public function findAllAscending() {
        return $this->createQueryBuilder('e')
            ->orderBy('e.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return FuryExercise[] Returns an array of FuryExercise objects
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
    public function findOneBySomeField($value): ?FuryExercise
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
