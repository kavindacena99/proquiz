create database proquiz;
use proquiz;

create table users(userid INT primary key auto_increment,fname varchar(255),lname varchar(255),mail varchar(255),pswd varchar(255));

create table quizzes(qid INT primary key auto_increment,question text,options text,correct_option INT,category varchar(50),qlang varchar(25));


