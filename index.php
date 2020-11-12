<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | INICIO</title>
        <link class="logo" rel="icon" type="image/vnd.microsoft.icon" href="img/logo.png">
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script src="JSCRIPT/usuario.js" type="text/javascript"></script>

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
                <div id="caja" class="topUsuarios">
                <h3>ULTIMAS VISITAS</h3>
                
                <script>
                
                    var arrayUltimosvisitados = localStorage.getItem('arrayUltimosvisitados');
                    var arrayUltimosTitulo = localStorage.getItem('arrayUltimosTitulo');
                    arrayUltimosvisitados = JSON.parse(arrayUltimosvisitados);
                    arrayUltimosvisitados = arrayUltimosvisitados.reverse();
                    
                    arrayUltimosTitulo = JSON.parse(arrayUltimosTitulo);
                    arrayUltimosTitulo = arrayUltimosTitulo.reverse();

                    for(var i=0;i<3 && i<arrayUltimosvisitados.length;i++){
                        var newDiv = document.createElement("a"); 
                        linebreak = document.createElement("br");
                        newDiv.setAttribute('href','paginaPost.php?idPost='+arrayUltimosvisitados[i]);
                        var newContent = document.createTextNode(arrayUltimosTitulo[i]); 
                        newDiv.appendChild(newContent); 
                        newDiv.appendChild(linebreak);
                        var currentDiv = document.getElementById("a1");
                        document.getElementById("caja").insertBefore(newDiv,currentDiv) ;
                    }
                </script>
            </div> 
                <div class="piePagina">
                    <h3>INFO</h3>
                    <p>2DW3 - GRUPO 2 Cast </p>
                    <p>Tel: 444 444 444</p>
                    <p>Email: coreo@gmail.com</p>
                </div>
                 
        </main> 
    </body>
</html>
