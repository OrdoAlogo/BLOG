<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | POSTS</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/post.css">
    </head>
   
    <body>
    <header>
    <?php include ('PHP/conexion.php');?>
            <div class="logo">
                <div><img src="img/logo.png" alt="Imagen no soportada"></div>
            </div>

            <div class="titulo">
                <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
            </div>

            <div class="buscador">
                <form method="post" action="index.php">
                    <input type="text" name="palabra">
                    <input type="submit" name="submit" id="btnBuscar" value="BUSCAR">
                </form>
            </div>

            <div class="registro">

                <?php include ('PHP/conexion.php');logearRegistrarUsuario();?>

                

            </div>
        </header>
        <h2>POST</h2>
    <main>   
        <div class="posts">
            <?php
              $idP = $_GET['idPost'];
                  try{
                      $cargarPost = "SELECT * FROM posts WHERE id_post=:id_post";
                      $sentenciaP = conexion()->prepare($cargarPost);
                      $sentenciaP->setFetchMode(PDO::FETCH_ASSOC);
              
                  }catch(PDOException $pe){
                      die("Error occurred:" . $pe->getMessage());
                  }
                  $sentenciaP->execute(
                      array(
                          ':id_post' => $idP
                      )
                  );
                  $resultadoP = $sentenciaP->fetchAll();
                  foreach($resultadoP as $posP => $filaP){
                      ?>
                      <div>
                          <img src="<?php echo $filaP['imagen_post']?>">
                          <h4><?php echo $filaP['titulo']?> </h4>
                          <p><?php echo $filaP['contenido']?></p>
                          <p>Nº visitas: <?php echo $filaP['visitas']; ?> </p>
                          <span>Fecha:<?php echo $filaP['fecha']?></span>
              
                      </div>
                      <?php
                  }  
            ?>
        </div>
        <div class="formC">
            <form action="#" method="post">       
                <textarea cols="40" rows="1" name="comentario" placeholder="Limite carateres: 400" onkeydown="valida_longitud()" onkeyup="valida_longitud()"> </textarea> 
                <input class="caracteres" type="button" name="caracteres" >
                <button  class="envio"><span class="icon-direction"></span></buton> 
            </form>
        </div>
        <div class="comentarios">
            <h3>COMENTARIOS</h3>
            <?php
                try{
                   $comentarios = "SELECT nickname,comentario,fecha FROM comentarios WHERE id_post=$idP";
                    $sentenciaC =conexion()->query($comentarios);
                    $sentenciaC->setFetchMode(PDO::FETCH_ASSOC);
                    }catch(PDOException $pe){
                        die("Error occurred:" . $pe->getMessage());
                    }
                    $sentenciaC->execute();
                    $resultadoC = $sentenciaC->fetchAll();
                    foreach($resultadoC as $posicionC => $filaC){
                        ?>
                    <div>
                        <p>Usuario: <?php echo $filaC['nickname']?></p>
                        <p class="contenido">Contenido<?php echo $filaC['comentario']?></p>
                        <p>Fecha: <?php echo $filaC['fecha']?></p>
                    </div> 
                       <?php
                    }
                
            ?>  
        </div>    
    </main> 
    <script>
            texto = ""
            maxCarateres = 400
            
function valida_longitud(){
        //Contamos los caracteres de la caja de texto
        NumCarateres = document.forms[1].comentario.value.length
        //si alcanzamos el limite de caracteres, el programa deja de cojer texto
        if (NumCarateres > maxCarateres){
            document.forms[1].comentario.value = texto
        }else{
            texto = document.forms[1].comentario.value
        }if (NumCarateres >= maxCarateres){
            document.forms[1].caracteres.style.background="red";
        }else{
            document.forms[1].caracteres.style.background="green";
            document.forms[1].caracteres.style.color="white";
        }

     cuenta()
    }
        function cuenta(){
        //Mostramos el Nº de carateres introducidos en la caja de texto
        document.forms[1].caracteres.value=document.forms[1].comentario.value.length
        }
        </script>
    </body>
</html>