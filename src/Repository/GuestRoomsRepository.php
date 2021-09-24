<?php

namespace App\Repository;

use App\Entity\GuestRooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuestRooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuestRooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuestRooms[]    findAll()
 * @method GuestRooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuestRoomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuestRooms::class);
    }

    // /**
    //  * @return GuestRooms[] Returns an array of GuestRooms objects
    //  */
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
    public function findOneBySomeField($value): ?GuestRooms
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
