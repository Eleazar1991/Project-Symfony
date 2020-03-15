CREATE DATABASE IF NOT EXISTS symfony_spalopia;
USE symfony_spalopia;

CREATE TABLE IF NOT EXISTS servicios(
    id                  int(255) auto_increment not NULL,
    precio              int(100),
CONSTRAINT pk_servicios PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO servicios VALUES (NULL,100);
INSERT INTO servicios VALUES (NULL,150);




CREATE TABLE IF NOT EXISTS comentarios(
    id           int(255) auto_increment not null,
    contenido    text,
    servicio_id   int(255),
CONSTRAINT pk_comentarios PRIMARY KEY(id),
CONSTRAINT fk_comentario_servicio FOREIGN KEY (servicio_id) REFERENCES servicios(id)
)ENGINE=InnoDb;

INSERT INTO comentarios VALUES(NULL,"Muy buen servicio",1);
INSERT INTO comentarios VALUES(NULL,"Lugar espectacular, muy recomendable",2);



CREATE TABLE IF NOT EXISTS traducciones(
    id           int(255) auto_increment not null,
    idioma       varchar(255),
    titulo       varchar(255),
    descripcion  text,
    servicio_id   int(255),
CONSTRAINT pk_traducciones PRIMARY KEY(id),
CONSTRAINT fk_traduccion_servicio FOREIGN KEY (servicio_id) REFERENCES servicios(id)
)ENGINE=InnoDb;

INSERT INTO traducciones VALUES(NULL,"español","Masaje contractura","Masaje para una contractura en la espalda",1);
INSERT INTO traducciones VALUES(NULL,"ingles","Contracture massage","Massage for a back contracture",1);
INSERT INTO traducciones VALUES(NULL,"ingles","Normal massage","Normal body massage",2);

CREATE TABLE IF NOT EXISTS horarios(
    id                int(255) auto_increment not NULL,
    dia               datetime,
    hora              int,
    servicio_id		  int(255),
CONSTRAINT pk_horarios PRIMARY KEY(id),
CONSTRAINT fk_horario_servicio FOREIGN KEY (servicio_id) REFERENCES servicios(id)
)ENGINE=InnoDb;

INSERT INTO horarios VALUES(NULL,CURDATE(),10,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),11,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),12,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),13,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),16,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),17,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),18,1);
INSERT INTO horarios VALUES(NULL,CURDATE(),19,1);

INSERT INTO horarios VALUES(NULL,CURDATE(),10,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),11,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),12,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),13,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),16,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),17,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),18,2);
INSERT INTO horarios VALUES(NULL,CURDATE(),19,2);

CREATE TABLE IF NOT EXISTS reservas(
    id                  int(255) auto_increment not NULL,
    nombre_cliente      varchar(255),
    servicio_id         int(255),
    horario_id          int(255),
CONSTRAINT pk_reservas PRIMARY KEY(id),
CONSTRAINT fk_reserva_servicio FOREIGN KEY (servicio_id) REFERENCES servicios(id),
CONSTRAINT fk_reserva_horario FOREIGN KEY (horario_id) REFERENCES horarios(id)
)ENGINE=InnoDb;

INSERT INTO reservas VALUES (NULL,"Pepe",1,3);
INSERT INTO reservas VALUES (NULL,"Juan",2,13);


