<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | Nuevo Post</title>
  
   <link rel="stylesheet" type="text/css" href="css/encabezado.css">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <link rel="stylesheet" type="text/css" href="css/nuevoPost.css">
  
   

<body>
    <header>

        <div class="logo">
            <div><img src="img/logo.png" alt="Imagen no soportada"></div>
        </div>

        <div class="titulo">
            <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
        </div>

        <div class="registro">
            <?php session_start(); include 'PHP/conexion.php';logearRegistrarUsuario();?>
        </div>


    </header>
    <h2>Nuevo post</h2>
    <main>
        <form id="publicarPost" action="" method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" maxlength="100"><br>
            <label for="contenido">Contenido</label></br>
            <textarea name="contenido" id="contenido" cols="30" rows="10" maxlength="3000"></textarea><br>
            <label for="foto"> Imagen (opcional)</label><br>
            <input type="file" id="foto" name="foto"><br>
            <input type="hidden" name="tipo" id ="tipo" value="nuevoPost"> 
            <input class="boton" type="submit" value="Publicar"  />
        </form>
    </main>

    <footer>
    </footer>
</body>
</html>
<script src="JSCRIPT/usuario.js" type="text/javascript"></script>


