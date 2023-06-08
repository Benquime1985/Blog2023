drop database if exists blog_2023;
create database blog_2023;
use blog_2023;

create table roles(
    id int not null primary key auto_increment,
    nombre varchar(255) not null
);

create table usuarios(
    id int not null primary key auto_increment,
    nombre varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    rol_id int not null,
    fecha_creacion datetime not null default current_timestamp(),
    foreign key (rol_id) references roles(id)
    on delete restrict on update cascade
);

create table publicaciones(
    id int not null primary key auto_increment,
    titulo varchar(255) not null,
    imagen varchar(255) not null,
    texto text not null,
    fecha_creacion datetime not null default current_timestamp(), 
    usuario_id int not null,
    foreign key (usuario_id) references usuarios(id)
    on delete restrict on update cascade
);

create table comentarios(
    id int not null primary key auto_increment,
    comentario varchar(255) not null,
    usuario_id int not null,
    publicacion_id int not null,
    estado int not null,
    fecha_creacion datetime not null default current_timestamp(),
    foreign key (usuario_id) references usuarios(id),
    foreign key (publicacion_id) references publicaciones(id)
);

insert into roles values (1,'Administrador');
insert into roles values (2,'Registrado');

insert into usuarios values (null,'Jose Braulio','jbflores24@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'2023-05-06 14:31:00');
insert into usuarios values (null,'Novaly Briannet','novaly@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',2,'2023-05-06 14:31:00');
insert into usuarios values (null,'Miguel Edgardo','miguel@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'2023-05-06 14:31:00');
insert into usuarios values (null,'Jose Mauricio','mauricio@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',2,'2023-05-06 14:31:00');

insert into publicaciones values (null,'ARTICULO 1','img5.jpg','Texto Articulo 1','2023-05-06 14:31:00',1);
insert into publicaciones values (null,'ARTICULO 2','img4.jpg','Texto Articulo 2','2023-05-06 14:31:00',2);
insert into publicaciones values (null,'ARTICULO 3','img3.jpg','Texto Articulo 3','2023-05-06 14:31:00',3);
insert into publicaciones values (null,'ARTICULO 4','img2.jpg','Texto Articulo 4','2023-05-06 14:31:00',2);


insert into comentarios values (null,'COMENTARIO 1',1,1,0,'2023-05-06 14:31:00');
insert into comentarios values (null,'COMENTARIO 2',1,1,1,'2023-05-06 14:31:00');
insert into comentarios values (null,'COMENTARIO 3',1,2,0,'2023-05-06 14:31:00');
insert into comentarios values (null,'COMENTARIO 1',2,3,0,'2023-05-06 14:31:00');
insert into comentarios values (null,'COMENTARIO 2',3,3,1,'2023-05-06 14:31:00');

create view view_usuarios as
select u.id, u.nombre, u.email, u.password, r.nombre as rol, u.fecha_creacion
from usuarios u, roles r
where u.rol_id = r.id;

create view view_publicaciones as
select p.id, p.titulo, p.imagen, p.texto, p.usuario_id, u.nombre as autor, p.fecha_creacion
from publicaciones p, usuarios u
where p.usuario_id = u.id;

create view view_comentarios as 
select c.id, c.comentario, c.usuario_id, u.nombre as autor, c.publicacion_id, p.titulo, p.usuario_id as prop_art, c.estado, p.fecha_creacion
from comentarios c
inner join usuarios u
on c.usuario_id = u.id
inner join publicaciones p 
on c.publicacion_id = p.id;