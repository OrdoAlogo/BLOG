<!-- 
<html>
<head>
    <script src="JSCRIPT/usuario.js" type="text/javascript"></script>
</head>

</html> -->

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
                $_SESSION["fotoLogeado"] = $valor['foto_nick'];
                $_SESSION['tipo'] = $valor['tipo_de_usuario'];
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
    
    //echo $nombre[0]." y " .$correo[0];

    if(empty($nick)||empty($email)||empty($contra)){
        //echo "Introduce todos los datos";
        echo '<script type="text/javascript">faltaDatos();</script>';
    }else{
        if(isset($correo[0])==$email){
        //echo "El correo ya existe";
        echo '<script type="text/javascript">registroExisteEmail();</script>';
        }
        if(isset($nombre[0])==$nick){
            //echo "El nick ya existe";
            echo '<script type="text/javascript">registroExisteNick();</script>';
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
                        'estado'=>$estado )); 
    
            }
        }

    }   
}
function CargarPost($id){
    $contenido= $id;
    $consulta = 'SELECT contenido FROM posts WHERE id_post = :id_post';
    echo ($consulta);
    $sentencia = conexion()->prepare($consulta);
    //$sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute(['id_post' => $contenido]);
    $hola = $sentencia->fetch();
    return ($hola[0]);

    //Imprimo los resultados
    
}

function crearPost($loginBD){

    session_start();

    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $contenido = isset($_REQUEST['contenido']) ? $_REQUEST['contenido'] : null;
    $foto = isset($_REQUEST['foto']) ? $_REQUEST['foto'] : null;
    $autor=$_SESSION["usuarioLogeado"];
    $visitas=0;
    $fecha=date("Y-m-d");

    if(empty($titulo)||empty($contenido)){ 
        //echo "Introduce todos los datos";
        //echo "<script type='text/javascript'>prueba();</script>"
        if(empty($titulo)){
        ?>
        <style type="text/css">
        #titulo {
            border: 2px solid red;
        }
        </style><?php
        }
        
        if(empty($contenido)){
            ?>
            <style type="text/css">
            #contenido {
                border: 2px solid red;
            }
            </style>
       <?php 
       }
        
    }
    
    else{

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

            header('Location: index.php');

          
        }else{
            $stmt = $loginBD->prepare('INSERT INTO posts (nickname, titulo, contenido, visitas, fecha ) VALUES (:nickname, :titulo, :contenido, :visitas, :fecha )');
    }}
    
}
   
function cerrarSesion(){
    session_start();
    unset($_SESSION["usuarioLogeado"]);
    print "Sesion borrada";
}

function recibirPosts(){
    try{
        $consulta = 'SELECT * FROM posts,usuarios where posts.nickname=usuarios.nickname';
            $texto = null;
        if(isset($_POST['palabra'])){
            //Si hay una busqueda, cambiamos la consulta
            $texto = $_POST['palabra'];
            $consulta = 'SELECT * FROM posts WHERE titulo LIKE :titulo or contenido LIKE :contenido or nickname LIKE :nickname';
        } 
        //Preparamos la sentencia e indicar que vamos a usar un cursor
        $sentencia = conexion()->prepare($consulta);
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    }catch(PDOException $pe){
        die("Error occurred:" . $pe->getMessage());
    }
    $sentencia->execute(
        array(
            ':titulo' => "%$texto%",
            ':contenido' => "%$texto%",
            ':nickname' => "%$texto%"
        )
        );
    //Imprimo los resultados
    $resultado = $sentencia->fetchAll();
    return $resultado;
}

//PAGINA INDEX en los pos principales
function cargarPosts($posts){
    foreach($posts as $posicion =>$columna){
        
        $tipoUser = $_SESSION['tipo'];
        $propietario = $columna['nickname'];
        ?>
    <div id="tarjetaPost">
       <!--<img src="//<//?//php echo $columna['imagen_post'] ?>">-->
        <a href="paginaPost.php?idPost=<?php echo $columna['id_post']; ?>"> <h2 class="tituloPost"><?php echo $columna['titulo'] ?> </h2> </a>
        <?php
        //Comprobamos que tipo de usuario se ha logeado, para habilitar o no el boton para eliminar un post
            if($tipoUser=='admin'){
                ?>
                    <a href="PHP/eliminarPost.php?idPost=<?php echo $columna['id_post']; ?>" class="btnEliminar"><span class="icon-trash"></span></a>
                <?php
            
            }
            //Si nadie está logeado, que no se muestre el boton para eliminar 
            if(!isset($_SESSION["usuarioLogeado"])){
                ?>
                  <style type="text/css">
                    .btnEliminar{display: none;}    
                  </style> 
                <?php
            }
        ?>
        <p class="contenido"><?php $resultado = substr($columna['contenido'], 0, 400)."..."; echo $resultado?> </p>
        <p class="visualizaciones"><span class="icon-eye"></span><?php echo (" ".$columna['visitas']) ?></p>
        <p class="autor">Autor: <?php echo $columna['nickname'] ?> </p> 
        <span class="fecha"><?php echo ("Fecha: ".$columna['fecha'] )?></span>
    </div>
    <?php
    echo ("<script type='text/javascript' src='JSCRIPT/usuario.js'></script>");
    }
}

function cargarTopPosts(){
    try{
        $procedimiento = 'SELECT id_post, titulo,imagen_post, visitas FROM posts HAVING(visitas>2) ORDER by visitas DESC';
        $llamadaProc = conexion()->query($procedimiento);
        $llamadaProc->setFetchMode(PDO::FETCH_ASSOC);
        
    }catch(PDOException $pe){
        die("Error occurred:" . $pe->getMessage());
    }
        
     $llamadaProc->execute();
     $result = $llamadaProc->fetchAll();
    foreach($result as $p => $fila){
        ?>  
        <div class="datosDB">
            <p>Id post: <?php echo $fila['id_post']; ?> </p>
            <p onclick="recogerIdPost(<?php echo  $fila['id_post']?>)">Titulo: <?php  echo  $fila['titulo']; ?> </p>
            <p>Img: <?php  echo $fila['imagen_post']; ?> </p>
            <p>Nº visitas: <?php echo $fila['visitas']; ?> </p>
        </div>     
        <?php
    }           
}

 function cargarTopUsuarios(){
    try{
        $topUser = "SELECT posts.nickname, e_mail, foto_nick, COUNT(id_post) as 'post' FROM posts,usuarios WHERE usuarios.nickname=posts.nickname GROUP BY posts.nickname HAVING COUNT(id_post>1) ORDER BY COUNT(id_post) DESC";
        $topUsuarios = conexion()->query($topUser);
        $topUsuarios->setFetchMode(PDO::FETCH_ASSOC);

    }catch(PDOException $pe){
        die("Error occurred:" . $pe->getMessage());
    }
    $topUsuarios->execute();
    $resultUsuarios = $topUsuarios->fetchAll();
    foreach($resultUsuarios as $p => $col){
        ?>
        <div class="datosDB">
            <p>Usuario:  <?php echo $col['nickname'] ?> </p>
            <p>E-mail:<?php echo $col['e_mail'] ?></p>
            <p>Nº post_: <?php echo $col['post'] ?></p>
            <p>Imagen: <?php echo $col['foto_nick'] ?></p>
        </div>
    <?php
    }
} 

 function logearRegistrarUsuario(){
    session_start(); 
    if(isset($_SESSION["usuarioLogeado"])){ 
        echo ("<img id='fotoPerfil'src='".$_SESSION['fotoLogeado']."'/></br><a id='nickUsu' >".$_SESSION["usuarioLogeado"]."</a>");
        echo "<div id='desplegable'>";
            echo "</br><a class='botonesUsuario' href='#'> Ajustes</a></br>";
            echo "<a href='editarPost.php?usuario=".$_SESSION['usuarioLogeado']." '>Edita mis Posts</a></br>"; 
            echo "<a class='botonesUsuario' href='PHP/cerrarSesion.php'> Cerrar Sesion</a>";
        echo "</div>";
    }
    else{
        print ("<a id='nickUsu'href='login.php'>Entrar | Registrarse</a><span class=icon-user></span>");
    }
    //echo ("<script type='text/javascript' src='JSCRIPT/usuario.js'></script>");

 }
  //Funcion para cargar los post de un usuario especifico
  //para que su propietario pueda editarlos ------> editarPost.php
  function postUsuario(){
    $usuario = $_GET['usuario'];
    try{
        $consulta3 = "SELECT * FROM posts WHERE nickname=:nickname";
        $sentencia3 = conexion()->prepare($consulta3);
        $sentencia3->setFetchMode(PDO::FETCH_ASSOC);

    }catch(PDOException $pe){
        die("Error occurred:" . $pe->getMessage());
    }
    $sentencia3->execute( array( 'nickname' => $usuario) );
    
    $resultado3 = $sentencia3->fetchAll();

    foreach($resultado3 as $pos3 => $fila3){
        ?>
            <div>
                <h4>  <?php echo $fila3['titulo'] ?></h4> 
                
                <form class="formEdicion" action="PHP/codEditarPost.php" method="post">
                    <input type="text" name="texto" id="campo" value="<?php echo $fila3['contenido']?>" >
                    <input type="text" hidden name="idP" value="<?php echo $fila3['id_post']?>"  rows="4" cols="50">           
    </br>
                    <input type="submit" class="boton" value="EDITAR">
                    <a href='PHP/eliminarPost.php?idPost=<?php echo $fila3['id_post'] ?>'><span class="icon-trash"><span> </a> 
                </form> 
            </div>
        <?php
    } 
  }
?>