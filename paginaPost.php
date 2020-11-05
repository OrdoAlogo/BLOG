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
    <header>
    <div class="logo">
                <div><img src="img/cpu.png" alt="Imagen no soportada"></div>
            </div>

            <div class="titulo">
                <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
            </div>

            <div class="buscador">
                <form method="post">
                    <input type="text" name="palabra">
                    <input type="submit" name="submit" id="btnBuscar" value="BUSCAR">
                    <input type="hidden" name="tipo" value="filtrado">
                </form>
            </div>
            <div class="registro">
                <?php session_start(); include ('PHP/conexion.php'); logearRegistrarUsuario();  ?>
            </div>   
    </header>

    <main>
        <h1><?php echo(cargarTituloPost($_GET["idPost"]))?></h1>
        <img src='<?php echo (cargarFotoPost($_GET["idPost"]))?>' alt="" style="width:15vw; height:15vw; float: right;">
        <p><?php echo(CargarPost($_GET["idPost"]));?></p> 
        <div class="comentarios">
            <?php if(isset($_SESSION["usuarioLogeado"])){ echo ("<script type='text/javascript' src='JSCRIPT/usuario.js'></script>");?>
            <div class="formC">
                    <h3>Escriba aqui su comentario</h3> <br>
                    <form  id="comen" method="$_GET">       
                        <textarea id = "textoArea" cols="40" rows="1" name="comentario" maxlength = "500" placeholder="Limite carateres: 400" > </textarea> 
                        <button  class="envio"><span class="icon-direction"></span></button> 
                        <input type="hidden" name="tipo" value="InsertarComentario">
                        <input type="hidden" name="idPost" value="<?php echo ($_GET['idPost']) ?>">
                        
                    </form>
            </div>
            <?php };?>
            <h3>COMENTARIOS</h3>
            <?php cargarComentariosBlog();  ?>  
        </div>    
    </main>


    <footer></footer>
</body>
</html>