<?php 
session_start();
unset($_SESSION["usuarioLogeado"]);
header("Location: ../index.php");
?>