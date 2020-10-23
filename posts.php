<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | COMENTARIO</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <style type="text/css">
    main{background:grey; width:70%; border:1px solid black; margin:0 auto; height:100%; display:flex; flex-direction:column;align-items:center;justify-content:flex-start;}
    h2{text-align: center; margin: 0 auto;}
        form{margin: 0 auto; width: 100%; }
         table{margin: 0 auto; width: 100%; } 
         legend{text-align: center;} 
        tr,td{text-align: center; margin: 0 auto;}
        .envio{text-align:center; margin:0 auto; position:relative; bottom:6px;}
        .caracteres{text-align:center; margin:0 auto; position:relative; bottom:2px;}
        .comentarios{margin-top: 30px; width: 60%; background:white;}
        .comentarios div{padding:5px; border-bottom:2px solid orange;}
        .comentarios h3{margin: 0 auto; text-align:center; color:orange;}
    </style>
    <body>
    <header>
            <div class="logo">
                <div><img src="img/cpu.png" alt="Imagen no soportada"></div>
            </div>

            <div class="titulo">
                <h1>BENCH<span>BLOG</span></h1>
            </div>

            <div class="buscador">
                <form method="post" action="index.php">
                    <input type="text" name="palabra">
                    <input type="submit" name="submit" id="btnBuscar" value="BUSCAR">
                </form>
            </div>

            <div class="registro">
                <a href="login.php" class="login">Entrar | Registrarse</a><span class="icon-user"></span>
                <a href="index.php" class="casa"><span class="icon-home"></span></a>
            </div>
        </header>
        <h2>COMENTAR</h2>
    <main>    
        <div class="posts">
            <?php
                include('conexion.php');
               try {
                   $consulta = "SELECT id_post,titulo,contenido,imagen_post,nickname FROM posts WHERE id_post=1";
                   $sentencia = $miPDO->prepare($consulta);
                   $sentencia->setFetchMode(PDO::FETCH_ASSOC);
                }catch(PDOException $pe){
                    die("Error occurred:" . $pe->getMessage());
                }
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                foreach($resultado as $posicion =>$fila){
                    ?>
                    <div>
                        <p>Titulo: <?php echo$fila['titulo'] ?></p>
                        <img src="<?php echo$fila['imagen_post'] ?>">
                        <p>Usuario: <?php echo$fila['nickname'] ?></p>
                    </div>
                    
                    <?php
                }
            ?>
        </div>
        <div>
            <form action="#" method="post">       
                <textarea cols="40" rows="1" name="comentario" onkeydown="valida_longitud()" onkeyup="valida_longitud()"> </textarea> 
                <input class="caracteres" type="button" name="caracteres" >
                <button  class="envio"><span class="icon-direction"></span></buton> 
            </form>
        </div>
        <div class="comentarios">
            <h3>COMENTARIOS</h3>
            <?php
                try{

                    $comentarios = "SELECT nickname,comentario,fecha FROM comentarios WHERE id_post=1";
                    $sentenciaC = $miPDO->prepare($comentarios);
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
                        <p>Contenido<?php echo $filaC['comentario']?></p>
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