<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Horario;

class HorarioController extends AbstractController
{

    public function getServiciosDisponibles($dia,$servicio_id){
        //Cargar repositorio
        $horario_repo=$this->getDoctrine()->getRepository(Horario::class); 

        $horarios=$horario_repo->findByDia([ 'dia' => $dia,'servicio_id' => $servicio_id ]);

            $response = new Response(json_encode($horarios));
            $response->headers->set('Content-Type', 'application/json');
            //Datos a devolver
            $response=[];
            foreach ($horarios as $horario) {
                //Filtros en el repositorio no me sirven los aplico aqui
                if($horario->getDisponible()==TRUE && $horario->getServicio()->getId()==$servicio_id){
                        $response[]=[
                            'id' => $horario->getId(),
                            'dia' => $horario->getDia(),
                            'hora' => $horario->getHora(),
                            'disponible' => $horario->getDisponible(),
                            'servicio' => ['id'=>$horario->getServicio()->getId(),
                                        'precio'=>$horario->getServicio()->getPrecio()]
                        ];    
                }
            }   
            return new JsonResponse($response, Response::HTTP_OK);
    }

}