<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $hostDB = '10.9.52.150';
    $nombreDB = 'blog';
    $usuarioDB = 'root';
    $passDB = '';


    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $passDB);

    $nick = isset($_REQUEST['nick']) ? $_REQUEST['nick'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $contra = isset($_REQUEST['contra']) ? $_REQUEST['contra'] : null;
    echo "hola".$nick." ".$email." ".$contra;

   
    $stmt = $miPDO->prepare('INSERT INTO usuarios (nickname, contrasena, e_mail ) VALUES (:nick, :contra, :email )');
    
     $stmt->execute(
        array(
            'nick' => $nick,
            'contra' => $contra,
            'email' => $email
   
        )
    ); 

  
  

  
}

function conexion(){
    //Conexion
    $hostDB = '10.9.52.150';
    $nombreDB = 'blog';
    $usuarioDB = 'root';
    $passDB = '';


    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
    $miPDO = new PDO($hostDB, $usuarioDB, $passDB);
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
function register(){

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
