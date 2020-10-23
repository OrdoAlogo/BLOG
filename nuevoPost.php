<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo post</title>
  
   <link rel="stylesheet" type="text/css" href="css/encabezado.css">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <link rel="stylesheet" type="text/css" href="css/nuevoPost.css">

<body>
    <header>

        <div class="logo">
            <div><img src="img/cpu.png" alt="Imagen no soportada"></div>
        </div>

        <div class="titulo">
            <h1>BENCH<span>BLOG</span></h1>
        </div>

    </header>
    <main>
        <form id="publicarPost" action="" method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo"><br>
            
            <label for="desc">Descripción</label></br>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea><br>

            <label for="foto"> Imagen (opcional)</label><br>
            <input type="file" id="foto" name="foto"><br>

            <input type="hidden" name="tipo" id ="tipo" value="nuevoPost"> 
            <input class="boton" type="submit" value="Publicar"/>
            
        </form>
    </main>

    <footer>
    </footer>
</body>
</html>
<?php include 'PHP/conexion.php';?>