alter table usuario modify nome varchar(64);
alter table usuario modify sobrenome varchar(64);
alter table usuario modify celular varchar(32);

alter table usuario drop login;

alter table usuario add column id int;
alter table usuario drop primary key, add primary key(id);

alter table usuario modify id int auto_increment;

alter table usuario modify cpf varchar(12) default null;
