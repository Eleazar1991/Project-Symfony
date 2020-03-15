<?php

namespace App\Repository;

use App\Entity\Traduccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class TraduccionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Traduccion::class);
    }

    public function findByTraducciones($idioma)
    {
        $queryBuilder=$this->createQueryBuilder('t')
        ->andWhere('t.idioma=:idioma')
        ->setParameter('idioma',$idioma)
        ->getQuery();
        //Ejecucion de la consulta
        $resultset=$queryBuilder->execute();

        return $resultset;
    }
}    