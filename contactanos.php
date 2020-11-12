<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/encabezado.css">
    <title>BLOG | CONTACTO</title>
    <link class="logo" rel="icon" type="image/vnd.microsoft.icon" href="img/logo.png">
</head>
<body>
    <header>
        <div class="logo">
            <div><img src="img/logo.png" alt="Imagen no soportada"></div>
        </div>

        <div class="titulo">
            <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
        </div>

        <div class="buscador">
            <form method="get">
                <input type="text" name="palabra">
                <input type="submit" name="submit" id="btnBuscar" value="BUSCAR">
                <input type="hidden" name="tipo" value="filtrado">
            </form>
        </div> 
        <div class="crearPost">
            <?php session_start();   include 'PHP/conexion.php'; logearNuevoPost();?>
        </div> 
        <div class="registro">

            <?php  logearRegistrarUsuario();?>
        </div>   
    </header>
    <h1>Envianos tus sujerencias </h1>
    <form action=""> 
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="email">E-mail</label>
        <input type="text" name="email"><br>
        <input type="submit" value="Descargar">
    </form>

  
</body>
</html>