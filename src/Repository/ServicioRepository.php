<?php

namespace App\Repository;

use App\Entity\Servicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class ServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Servicio::class);
    }


    public function findAll()
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult()

        ;
    }    


    public function findOneById($id): ?Servicio
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
