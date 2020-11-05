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
    </main>
    <footer></footer>
</body>
</html>