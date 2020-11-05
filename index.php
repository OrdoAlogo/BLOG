<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | INICIO</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
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
                <?php include ('PHP/conexion.php');logearRegistrarUsuario();?>
            </div>   
        </header>
        <div class="nuevoPost">
            <a href="nuevoPost.php">NUEVO POST</a>
        </div>
        <main>
            <div class="postPrincipales">
                <h3 id="titulo_principal">POST PRINCIPALES</h3>
                    <?php 
                    cargarPosts(recibirPosts());
                    
                    ?>
                    
            </div>
            <div class="aside">
                <div class="topPost">
                    <h3>TOP POST</h3>
                    <?php cargarTopPosts();
                    ?>
                </div>
                <div class="topUsuarios">
                    <h3>TOP USUARIOS</h3>
                    <?php 
                       cargarTopUsuarios();
                    ?>
                </div>
                <div class="piePagina">
                    <h3>INFO</h3>
                    <p>2DW3 - GRUPO 2 Cast </p>
                    <p>Tel: 444 444 444</p>
                    <p>Email: coreo@gmail.com</p>
                </div>
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
