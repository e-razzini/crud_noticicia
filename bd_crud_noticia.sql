use crud_noticia;
create table categoria (
id_categoria int(11)not null auto_increment primary key unique,
nome_categoria varchar(30) unique not null
);
#truncate table categoria;

#drop table categoria;

#select * from noticia;

create table noticia(
id_noticia int(11) not null auto_increment primary key unique,
titulo varchar(30) not null,
noticia text,
categoria_id int(11) not null,
data_da_noticia datetime,
foreign key(categoria_id)references categoria(id_categoria) 
on Delete cascade
);
#drop table noticia;

