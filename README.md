# Project-Symfony

## Base de datos

Se ha usado una base de datos MySQL usando el siguiente esquema:

![EsquemaBBDD](https://github.com/Eleazar1991/Project-Symfony/blob/make-documentation/database/Esquema%20BBDD%20.png)

La creación de la base de datos, sus tablas y algunos registros se encuentran en el fichero:

```http
./database/database.sql
```
## Endpoints

### Obtener todos los servicios
```http
GET /servicios
```
#### Responses

```javascript
[
"id":int,
"precio":int,
"nombre":[
            "idioma": {
                "contenido": String,
                "descripcion": String
            }
         ],
"comentarios":[
                    {
                        "contenido": String
                    }
              ],
"horarios": [
                {
                    "id": int,
                    "dia": {
                        "date": String,
                        "timezone_type": int,
                        "timezone": String
                    },
                    "horas": int
                }
            ],               
"reservas": [
                {
                    "nombre_cliente": String,
                    "horario": {
                        "id": int,
                        "dia": {
                            "date": String,
                            "timezone_type": int,
                            "timezone": String
                        },
                        "hora": int
                    }
                }
            ]
]
```

#### Status Codes
| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |

### Obtener todos los servicios por idioma
```http
GET /servicios/{idioma}
```
Siguiendo los registros insertados en el fichero database.sql especificado en el paratado anterior los idiomas disponibles son (espanol,ingles)

Ej:
```http
GET /servicios/espanol
```

```http
GET /servicios/ingles
```
#### Responses

```javascript
[
    {
        "id":int,
        "precio":int,
        "nombre":[
                    "espanol/ingles": {
                        "contenido": String,
                        "descripcion": String
                    }
                ],
        "comentarios":[
                            {
                                "contenido": String
                            }
                    ],
        "horarios": [
                        {
                            "id": int,
                            "dia": {
                                "date": String,
                                "timezone_type": int,
                                "timezone": String
                            },
                            "horas": int
                        }
                    ]
    },
    ...                
]
```

#### Status Codes
| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |



### Listado de las horas disponibles de un servicio en una fecha concreta
```http
GET /servicios/disponibles/{dia}/{servicio_id}
```
Parametro dia formato DateTime
Ej:
```http
GET /servicios/disponibles/2020-03-15 00:00:00/1
```
#### Responses

```javascript
[
    {
        "id": int,
        "dia": {
            "date": String,
            "timezone_type": int,
            "timezone": String
        },
        "hora": int,
        "disponible": true,
        "servicio": {
            "id": int,
            "precio": int
        }
    },
    ...                
]
```

#### Status Codes
| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |



### Crear reserva validando que no haya otra reserva en el mismo dia y hora y que el servicio tenga horario

```http
POST /reserva
```
#### Request
```javascript
{
	"nombre_cliente":String,
	"servicio_id":int,
	"horario_id":int
}
```
#### Responses

```javascript
[
    {
        "message": String
    }
]
```

#### Status Codes
| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 404 | `NOT FOUND` |



## Tests unitarios 
Para ejecutar los tests, situarnos en la raiz del proyecto y ejecutar el comando:
```http
    php bin/phpunit tests/Controller/GetController.php
```
