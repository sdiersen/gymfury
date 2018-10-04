<?php

namespace App\Repository;

use App\Entity\FuryExerciseCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FuryExerciseCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuryExerciseCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuryExerciseCategory[]    findAll()
 * @method FuryExerciseCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuryExerciseCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FuryExerciseCategory::class);
    }

    public function getAllCategoryNames() {
        return $this->createQueryBuilder('c')
            ->select('c.name')
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


//    /**
//     * @return FuryExerciseCategory[] Returns an array of FuryExerciseCategory objects
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
    public function findOneBySomeField($value): ?FuryExerciseCategory
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findOneByName($name): ?FuryExerciseCategory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
