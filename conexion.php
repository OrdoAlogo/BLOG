<?php
//CREDENCIALES
$hostDB = '127.0.0.1';
$nomDB = 'blog';
$usuario = 'root';
$pwd = '';
//Conexion a BD
$hostPDO = "mysql:host=$hostDB; dbname=$nomDB;";
$miPDO = new PDO($hostPDO,$usuario,$pwd);
?>