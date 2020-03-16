<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Reserva;
use App\Entity\Servicio;
use App\Entity\Horario;

class ReservaController extends AbstractController
{
    public function insertarReserva(Request $request)
    {
        $response = new Response();
        // $response = new Response(json_encode($traducciones));
        $response->headers->set('Content-Type', 'application/json');
        //Datos a devolver
        $response=[];


        //Obtengo datos del formulario
        $data=$request->request->all();

        //Obtengo servicio
        //Cargar repositorio servicio
        $servicio_repo=$this->getDoctrine()->getRepository(Servicio::class);
        $servicio=$servicio_repo->findOneById(['id'=>$data['servicio_id']]);

        //Obtengo horario
        //Cargar repositorio horario
        $horario_repo=$this->getDoctrine()->getRepository(Horario::class);
        $horario=$horario_repo->findOneById(['id'=>$data['horario_id']]);
        //Horario disponible? y horario corresponde con servicio?
        if($horario->getDisponible() && $servicio->getId()==$horario->getServicio()->getId()){
            //Creo Reserva
            $reserva=new Reserva();
            $reserva->setNombreCliente($data['nombre_cliente']);
            $reserva->setServicio($servicio);
            $reserva->setHorario($horario);

            //Guardo en bd
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($reserva);
            $entityManager->flush();
            

            //Modifico horario disponible=false
            $horario->setDisponible(false);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($horario);
            $entityManager->flush();

        }else{
            $response[]=['message'=>'Coudln´t create the reservation the hours are not free'];
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $response[]=['message'=>'Reservation created'];
        return new JsonResponse($response, Response::HTTP_OK);
    }
}    