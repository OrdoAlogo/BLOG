<?php

function conexion(){
    //Conexion
    $hostDB = '10.9.52.144';
    $nombreDB = 'blog';
    $usuarioDB = 'root';
    $passDB = '';


    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $passDB);
}
function comprobarExistencia($nickname,$contraseña){
    $stmt = $miPDO->prepare('SELECT * FROM usuarios WHERE nickname LIKE :nick ;');
    $usuario->execute(
        [
            'nick' => $nickname
        ]);
    if(sizeoff($usuario)>0){
        foreach ($usuario as $usu => $valor){
            if($valor['contrasena'] == $contraseña){
                console.log("Estas dentro");
            }else{
                console.log("ERROR");
            }
        }
    }else{
        console.log("ERROR");
    }
}
function login($nickname,$contraseña){
    conexion();
    comprobarExistencia($nickname,$contraseña);
}
























/*
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

}  */

?>
