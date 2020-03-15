<?php

namespace App\Repository;

use App\Entity\Horario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class HorarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Horario::class);
    }

    public function findByDia($dia,$servicio_id)
    {
        var_dump("Buscando");
        $queryBuilder=$this->createQueryBuilder()
        ->andWhere('h.dia=:dia')
        ->andWhere('h.disponible=:disponible')
        ->andWhere('h.servicio_id=:servicio')
        ->setParameter('dia',$dia)
        ->setParameter('disponible',true)
        ->setParameter('servicio_id',$servicio_id)

        ->getQuery();
        //Ejecucion de la consulta
        $resultset=$queryBuilder->execute();

        return $resultset;
    }
}    