<?php
include('conexion.php');
$contenido = $_POST['texto'];
$idP = $_POST['idP'];

$cambio = conexion()->prepare('UPDATE posts set contenido=:contenido WHERE id_post=:id_post');
$cambio->execute(
    array(
        'id_post' =>$idP,
        'contenido' =>$contenido
    )
    );
header("Location: ../index.php"); 
?>