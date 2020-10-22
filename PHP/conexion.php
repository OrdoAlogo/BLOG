<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $hostDB = '127.0.0.1';
    $nombreDB = 'blog';
    $usuarioDB = 'root';
    $passDB = '';


    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $passDB);

    $nick = isset($_REQUEST['nick']) ? $_REQUEST['nick'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $contra = isset($_REQUEST['contra']) ? $_REQUEST['contra'] : null;
    $arch = isset($_REQUEST['arch']) ? $_REQUEST['arch'] : null;
    
    $tipo_de_usuario="normal";
    $estado=0;
    

    if (is_uploaded_file($_FILES['arch']['tmp_name'])) 
    { 
        //First, Validate the file name
        if(empty($_FILES['arch']['name']))
        {
            echo " File name is empty! ";
            exit;
        }
  
        //$upload_file_name = $_FILES['arch']['name'];
        $upload_file_name = $email.".png";
        //Too long file name?
        if(strlen ($upload_file_name)>100)
        {
            echo " too long file name ";
            exit;
        }
  
        //replace any non-alpha-numeric cracters in th file name
        $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
  
        //set a limit to the file upload size
        if ($_FILES['arch']['size'] > 1000000) 
        {
          echo " too big file ";
            exit;        
      }
  
      //Save the file
      $dest='img/usuarios/'.$upload_file_name;
      if (move_uploaded_file($_FILES['arch']['tmp_name'], $dest)) 
      {
          echo 'File Has Been Uploaded !';
      }
    }

    //echo "hola".$nick." ".$email." ".$contra." ".$dest;
    $stmt = $miPDO->prepare('INSERT INTO usuarios (nickname, contrasena, foto_nick, e_mail, tipo_de_usuario, estado ) VALUES (:nick, :contra, :foto_nick, :email, :tipo_de_usuario, :estado )');
    
     $stmt->execute(
        array(
            'nick' => $nick,
            'contra' => $contra,
            'foto_nick'=>$dest,
            'email' => $email,
            'tipo_de_usuario'=>$tipo_de_usuario,
            'estado'=>$estado
   
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
