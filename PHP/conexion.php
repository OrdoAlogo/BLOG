
<html>
<head>
    <script src="JSCRIPT/usuario.js" type="text/javascript"></script>
</head>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"]=='GET'){
   
    if(isset( $_GET["tipo"])){
        $tipo = $_GET["tipo"];
        if($tipo=="Login"){
            comprobarExistencia($_GET["Nick"],$_GET["Contra"],conexion());
        }
    } 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset( $_POST["tipo"])){
        $tipo = $_POST["tipo"];
        if($tipo=="Registro"){
            insertarUsuario(conexion());
        }
        else if($tipo=="nuevoPost"){
            crearPost(conexion());
        }
       } 
    
   
}


function conexion(){
    //Conexion
    $hostDB = '127.0.0.1';
    $nombreDB = 'blog';
    $usuarioDB = 'root';
    $passDB = '';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $passDB);
    return $miPDO;
}

function comprobarExistencia($nickname,$contraseña,$login){
    $usuario = $login->prepare('SELECT * FROM usuarios WHERE nickname LIKE :nick;');
    $usuario->execute(
        array(
            'nick' => $nickname)
        );
    $numero = $usuario->rowcount();
    if($numero>0){
        foreach ($usuario as $usu => $valor){
            if($valor['contrasena'] == $contraseña){
                session_start();
                $_SESSION["usuarioLogeado"] = $valor['nickname'];
                header('Location: index.php');
                
            }else{
                echo("contraseña erronea");
            }
        }
    }else{
        echo("Usuario no  existe");
    }
}

function insertarUsuario($loginBD){

    $nick = isset($_REQUEST['nick']) ? $_REQUEST['nick'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $contra = isset($_REQUEST['contra']) ? $_REQUEST['contra'] : null;
    $arch = isset($_REQUEST['arch']) ? $_REQUEST['arch'] : null;
    
    $tipo_de_usuario="normal";
    $estado=0;
    
    //echo "hola".$nick." ".$email." ".$contra." ".$dest;
    //Combrobamos si el nickname y email existen en la base de datos

    $stmt = $loginBD->prepare('SELECT nickname FROM usuarios WHERE nickname= :nick;');
    $stmt->execute(['nick' => $nick]);
    $nombre =$stmt->fetch();

    $stmt = $loginBD->prepare('SELECT e_mail FROM usuarios WHERE e_mail= :email;');
    $stmt->execute(['email' => $email]);
    $correo =$stmt->fetch();
    //echo $nombre[0]." " .$correo[0];


    if(empty($nick)||empty($email)||empty($contra)){
        //echo "Introduce todos los datos";
        echo '<script type="text/javascript">faltaDatos();</script>';
    }
    else if(isset($nombre[0])==$nick){
        //echo "El nick ya existe";
        echo '<script type="text/javascript">registroExisteNick();</script>';
    }
    else if(isset($correo[0])==$email){
        //echo "El correo ya existe";
        echo '<script type="text/javascript">registroExisteEmail();</script>';
    }
    else{

        if (is_uploaded_file($_FILES['arch']['tmp_name'])) { 
            //Valida el nombre del archivo
            if(empty($_FILES['arch']['name']))
            {
                //echo " no tiene nombre ";
                exit;
            }
        
            //$upload_file_name = $_FILES['arch']['name'];
            $upload_file_name = $email.".png";
            if(strlen ($upload_file_name)>100)
            {
                //echo " nombre muy largo ";
                exit;
            }
        
            //quita los caracteres no alfanumericos
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
        
            //limite de tamañp
            if ($_FILES['arch']['size'] > 1000000) 
            {
                //echo " archivo demasiado pesado ";
                exit;        
            }
            //Guarda la imagen
                        $dest='img/usuarios/'.$upload_file_name;
                        if (move_uploaded_file($_FILES['arch']['tmp_name'], $dest)) 
                        {
                            //echo 'Imagen subida !';
                        }

            $stmt = $loginBD->prepare('INSERT INTO usuarios (nickname, contrasena, foto_nick, e_mail, tipo_de_usuario, estado ) VALUES (:nick, :contra, :foto_nick, :email, :tipo_de_usuario, :estado )');
    
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

        



    }
    
}


function crearPost($loginBD){

    session_start();

    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $contenido = isset($_REQUEST['contenido']) ? $_REQUEST['contenido'] : null;
    $foto = isset($_REQUEST['foto']) ? $_REQUEST['foto'] : null;
    $autor=$_SESSION["usuarioLogeado"];
    $visitas=0;
    $fecha=date("Y-m-d");



    if (is_uploaded_file($_FILES['foto']['tmp_name'])) { 
        //Valida el nombre del archivo
        if(empty($_FILES['foto']['name']))
        {
            //echo " no tiene nombre ";
            exit;
        }
    
        $upload_file_name = $titulo.".png";
        if(strlen ($upload_file_name)>100)
        {
            //echo " nombre muy largo ";
            exit;
        }
    
        //quita los caracteres no alfanumericos
        $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
    
        //limite de tamañp
        if ($_FILES['foto']['size'] > 1000000) 
        {
            //echo " archivo demasiado pesado ";
            exit;        
        }
        //Guarda la imagen
        $dest='img/posts/'.$upload_file_name;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $dest)) 
        {
            //echo 'Imagen subida !';
        }

        $stmt = $loginBD->prepare('INSERT INTO posts (nickname, titulo, contenido, imagen_post, visitas, fecha ) VALUES (:nickname, :titulo, :contenido, :imagen_post, :visitas, :fecha )');

        $stmt->execute(
            array(
                'nickname' => $autor,
                'titulo' => $titulo,
                'contenido'=>$contenido,
                'imagen_post' => $dest,
                'visitas'=>$visitas,
                'fecha'=>$fecha
    
            )
        ); 

        
    }
     

}
?>
