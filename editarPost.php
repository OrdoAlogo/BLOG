<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | EDITAR POSTS</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    </head>
    <style type="text/css">
    .formEdicion{margin: 0 auto; width: 50%; text-align:center; padding:10px;}
    .boton{margin: 0 auto; text-align:center; border-radius:10px;}
    .boton:hover{background:green; color:white;}
    .icon-trash{ color:orangered; text-decoration:none;}
    .icon-trash:hover{color:red;}
    #campo{background:#F9C875; height:100%; width:100%;}
    .postPrincipales h4{color:white; text-align:center;}
    .postPrincipales div{margin: 0 auto; width:80%; margin-top:10px;}
    </style>
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
                <?php include ('PHP/conexion.php');logearRegistrarUsuario();?>
            </div>   
        </header>
        <main>
            <div class="postPrincipales">
                <h3 id="titulo_principal">ADIMINISTRAR POST</h3>
                    <?php 
                       postUsuario();

                    ?>
                    
            </div>
        </main> 
        <script>
        $(document).ready(function(){
            $('.tituloPost').click( function () {
            header("Location: posts.php");
            });
        });
        $(document).ready(function(){
            $('.tituloTopPost').click( function () {
             alert(this.id);
            });
        });
        </script>
    </body>
</html>
