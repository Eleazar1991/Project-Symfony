<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Traduccion;

class TraduccionController extends AbstractController
{
    public function getByTraducciones($idioma)
    {
        //Cargar repositorio
        $traduccion_repo=$this->getDoctrine()->getRepository(Traduccion::class); 

        $traducciones=$traduccion_repo->findByIdioma([
            'idioma' => $idioma
        ]);

        $response = new Response(json_encode($traducciones));
        $response->headers->set('Content-Type', 'application/json');
        //Datos a devolver
        $response=[];

        foreach ($traducciones as $traduccion) {
            $response[]=[
                'id' => $traduccion->getId(),
                'idioma' => $traduccion->getIdioma(),
                'titulo' => $traduccion->getTitulo(),
                'descripcion' => $traduccion->getDescripcion(),
                'servicio' => ['id'=>$traduccion->getServicio()->getId(),
                               'precio'=>$traduccion->getServicio()->getPrecio(),
                               'horarios'=>$this->getHorarios($traduccion->getServicio()->getHorarios())]
            ];

        }
        return new JsonResponse($response, Response::HTTP_OK);
    }

    private function getHorarios($horarios){
        $result=[];
        foreach($horarios as $horario){
            $horario_array=['id'=>$horario->getId(),'dia'=>$horario->getDia(),'horas'=>$horario->getHora()];
            array_push($result,$horario_array);           
        }
        return $result;
    }
}    