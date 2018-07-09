<?php

namespace App\Repository;

use App\Entity\Pingouin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pingouin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pingouin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pingouin[]    findAll()
 * @method Pingouin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PingouinRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pingouin::class);
    }

//    /**
//     * @return Pingouin[] Returns an array of Pingouin objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pingouin
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
