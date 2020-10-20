<?php
//Conexion
$hostDB = '127.0.0.1';
$nombreDB = 'blog';
$usuarioDB = 'root';
$passDB = '';


$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
$miPDO = new PDO($hostPDO, $usuarioDB, $passDB);


$usuarios=[];
$posts=[];
$comentarios=[];

$stmt = $miPDO->prepare('SELECT * FROM usuarios;');

$stmt->execute();

 while($row = $stmt->fetch()) {

    echo $row['nickname']." ";
    echo $row['e_mail']." ";
    echo $row['foto_nick']." ";
    echo $row['tipo_de_usuario']." ";
    echo $row['estado']. "<br>";

}  

?>
