<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | INICIO</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        
    </head>
    
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
                    <?php 
                    cargarTopPosts();
                    ?>
                </div>
                <div class="topUsuarios">
                    <h3>TOP USUARIOS</h3>
                    <?php 
                       cargarTopUsuarios();
                    ?>
                </div>

                <div class="piePagina">
                    <p>2DW3 - GRUPO 2 Cast </p>
                    <p>Tel: 444 444 444</p>
                    <p>Email: coreo@gmail.com</p>
                </div>
            </div>  
        </main> 
        
    </body>
</html>
