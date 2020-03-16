<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetControllerTest extends WebTestCase
{

    public function testResponseStatusGet()
    {
        $client = static::createClient();

        //El endpoint devuelve correctamente
        $client->request('GET', '/servicios/espanol');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $client->request('GET', '/servicios/ingles');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    public function testResponseGetEspanol()
    {
        $client = static::createClient();
        //El endpoint devuelve correctamente
        $client->request('GET', '/servicios/espanol');

        $data = $client->getResponse()->getContent();
        $responseData = json_decode($data, true);
        $real_response=
            [
                "id"=> 1,
                "idioma"=> "español",
                "titulo"=> "Masaje contractura",
                "descripcion"=> "Masaje para una contractura en la espalda",
                "servicio"=> [
                    "id"=> 1,
                    "precio"=> 100,
                    "horarios"=> [
                        [
                            "id"=> 1,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 10
                        ],
                        [
                            "id"=> 2,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 11
                        ],
                        [
                            "id"=> 3,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 12
                        ],
                        [
                            "id"=> 4,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 13
                        ],
                        [
                            "id"=> 5,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 16
                        ],
                        [
                            "id"=> 6,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 17
                        ],
                        [
                            "id"=> 7,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 18
                        ],
                        [
                            "id"=> 8,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 19
                        ]
                    ]
                ]
            ];
        //Tiene el indice id    
        $this->assertArrayHasKey("id",$responseData[0]);
        //Tiene el indice idioma
        $this->assertArrayHasKey("idioma",$responseData[0]);
        //Tiene el indice titulo
        $this->assertArrayHasKey("titulo",$responseData[0]);
        //Respuestas iguales
        $this->assertEquals($real_response,$responseData[0]);

    }

    public function testResponseGetIngles()
    {
        $client = static::createClient();
        //El endpoint devuelve correctamente
        $client->request('GET', '/servicios/ingles');

        $data = $client->getResponse()->getContent();
        $responseData = json_decode($data, true);
        $real_response=
        [
            [
                "id"=> 2,
                "idioma"=> "ingles",
                "titulo"=> "Contracture massage",
                "descripcion"=> "Massage for a back contracture",
                "servicio"=> [
                    "id"=> 1,
                    "precio"=> 100,
                    "horarios"=> [
                        [
                            "id"=> 1,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 10
                        ],
                        [
                            "id"=> 2,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 11
                        ],
                        [
                            "id"=> 3,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 12
                        ],
                        [
                            "id"=> 4,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 13
                        ],
                        [
                            "id"=> 5,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 16
                        ],
                        [
                            "id"=> 6,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 17
                        ],
                        [
                            "id"=> 7,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 18
                        ],
                        [
                            "id"=> 8,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 19
                        ]
                    ]
                ]
            ],
            [
                "id"=> 3,
                "idioma"=> "ingles",
                "titulo"=> "Normal massage",
                "descripcion"=> "Normal body massage",
                "servicio"=> [
                    "id"=> 2,
                    "precio"=> 150,
                    "horarios"=> [
                        [
                            "id"=> 9,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 10
                        ],
                        [
                            "id"=> 10,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 11
                        ],
                        [
                            "id"=> 11,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 12
                        ],
                        [
                            "id"=> 12,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 13
                        ],
                        [
                            "id"=> 13,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 16
                        ],
                        [
                            "id"=> 14,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 17
                        ],
                        [
                            "id"=> 15,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 18
                        ],
                        [
                            "id"=> 16,
                            "dia"=> [
                                "date"=> "2020-03-15 00:00:00.000000",
                                "timezone_type"=> 3,
                                "timezone"=> "UTC"
                            ],
                            "horas"=> 19
                        ]
                    ]
                ]
            ]
        ];
        //Elemento 0 Tiene el indice id    
        $this->assertArrayHasKey("id",$responseData[0]);
        //Elemento 0 Tiene el indice idioma
        $this->assertArrayHasKey("idioma",$responseData[0]);
        //Elemento 0 Tiene el indice titulo
        $this->assertArrayHasKey("titulo",$responseData[0]);
        //Elemento 1 Tiene el indice id    
        $this->assertArrayHasKey("id",$responseData[1]);
        //Elemento 1 Tiene el indice idioma
        $this->assertArrayHasKey("idioma",$responseData[1]);
        //Elemento 1 Tiene el indice titulo
        $this->assertArrayHasKey("titulo",$responseData[1]);
        //Elemento 1 Respuestas iguales
        $this->assertEquals($real_response,$responseData);

    }
}