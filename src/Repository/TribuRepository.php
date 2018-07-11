<?php

namespace App\Repository;

use App\Entity\Tribu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tribu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tribu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tribu[]    findAll()
 * @method Tribu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TribuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tribu::class);
    }

//    /**
//     * @return Tribu[] Returns an array of Tribu objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tribu
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
