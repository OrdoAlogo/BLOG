<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/nuevoPost.css"> -->
    <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
    <link rel="stylesheet" type="text/css" href="css/encabezado.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
    <link rel="stylesheet" href="css/post.css"> 
</head>
<body>
    <header></header>

    <main>
        <img src="img/cpu.png" alt="" style="width:15vw; height:15vw; float: right;">
        <p><?php include ('PHP/conexion.php'); echo(CargarPost($_GET["idPost"]));?></p> 
        <div class="comentarios">
        <div class="formC">
                <form action="#" method="post">       
                    <textarea cols="40" rows="1" name="comentario" placeholder="Limite carateres: 400" onkeydown="valida_longitud()" onkeyup="valida_longitud()"> </textarea> 
                    <input class="caracteres" type="button" name="caracteres" >
                    <button  class="envio"><span class="icon-direction"></span></buton> 
                </form>
            </div>
            <h3>COMENTARIOS</h3>
            <?php
            $idP=$_GET["idPost"];
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
                        <p> <?php echo $filaC['nickname']?></p>
                        <p class="contenido"><?php echo $filaC['comentario']?></p>
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
        document.forms[1].caracteres.value=document.forms[1].comentario.value.length;
    }
        </script>
    <footer></footer>
</body>
</html>