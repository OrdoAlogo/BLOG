<?php
session_start();
$post = $_SESSION['post'];
 include('conexion.php');
 $idC = $_GET['idC'];
 $consulta = conexion()->prepare('DELETE FROM comentarios WHERE id_comentario=:idC');
 $consulta->execute(
     array('idC'=>$idC)
 );
 header("Location: ../paginaPost.php?idPost=$post");
?>