<?php
include('conexion.php');
$idC = $_GET['idC'];
$eliminar = conexion()->prepare('DELETE FROM comentarios WHERE id_comentario=:idC');
$eliminar->execute( array( 'idC' => $idC ));
session_start();
header("Location: ../index.php");
?>