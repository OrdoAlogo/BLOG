<?php
    include('conexion.php');
    $idP = $_GET['idPost'];
    
    $consulta = conexion()->prepare ('DELETE FROM posts WHERE id_post=:id_post');
    $consulta->execute(
        array(
            'id_post' =>$idP
        )
        );
session_start();
$usuario = $_SESSION['usuario'];
header("Location: ../editarPost.php?usuario=$usuario");        
?>