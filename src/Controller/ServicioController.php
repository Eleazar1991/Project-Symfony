<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Servicio;

class ServicioController extends AbstractController
{

    public function index()
    {
        //Cargar repositorio
        $servicio_repo=$this->getDoctrine()->getRepository(Servicio::class);

        //Consulta
        $servicios=$servicio_repo->findAll();
 
        $response = new Response(json_encode($servicios));
        $response->headers->set('Content-Type', 'application/json');
        //Datos a devolver
        $response=[];

        foreach ($servicios as $servicio) {
            $response[]=[
                'id' => $servicio->getId(),
                'precio' => $servicio->getPrecio(),
                'nombre' => $this->getTraducciones($servicio->getTraducciones()),
                'comentarios' => $this->getComentarios($servicio->getComentarios()),
                'horarios' => $this->getHorarios($servicio->getHorarios()),
                'reservas' => $this->getReservas($servicio->getReservas())
            ];

        }

        return new JsonResponse($response, Response::HTTP_OK);


    }

    public function getByIdioma(Servicio $servicio)
    {
        //Cargar repositorio
        $servicio_repo=$this->getDoctrine()->getRepository(Servicio::class); 

        $servicio=$servicio_repo->findByIdioma([
            'idioma' => $idioma
        ]);
    }
    private function getTraducciones($traducciones){
        $result=[];
        foreach($traducciones as $traduccion){
            $ristras_array=['contenido'=>$traduccion->getTitulo(),"descripcion"=>$traduccion->getDescripcion()];
            $idioma=[$traduccion->getIdioma()=>$ristras_array];
            array_push($result,$idioma);           
        }
        return $result;
    }
    private function getComentarios($comentarios){
        $result=[];
        foreach($comentarios as $comentario){
            $comentario_array=['contenido'=>$comentario->getContenido()];
            array_push($result,$comentario_array);           
        }
        return $result;
    }
    private function getHorarios($horarios){
        $result=[];
        foreach($horarios as $horario){
            $horario_array=['dia'=>$horario->getDia(),'horas'=>$this->getHorasByHorario($horario->getHoras())];
            array_push($result,$horario_array);           
        }
        return $result;
    }
    private function getReservas($reservas){
        $result=[];
        foreach($reservas as $reserva){
            $reserva_array=['nombre_cliente'=>$reserva->getNombreCliente()];
            array_push($result,$reserva_array);           
        }
        return $result;
    }
    private function getHorasByHorario($horas){
        $result=[];
        foreach($horas as $hora){
            $hora_array=['hora'=>$hora->getHora()];
            array_push($result,$hora_array);           
        }
        return $result;
    }
}
