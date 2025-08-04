show databases;
create database form;
use form;

create table applicants(
id int not null primary key auto_increment,
firstname varchar(50),
lastname varchar(50),
email varchar(50),
phone int,
applied_position varchar(50)
);

select * from applicants;