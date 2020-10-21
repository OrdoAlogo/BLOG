<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | INICIO</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
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
                <a href="login.php" class="login">Entrar | Registrarse</a><span class="icon-user"></span>
                <a href="index.php" class="casa"><span class="icon-home"></span></a>
            </div>
        </header>
        <?php
            //CREDENCIALES
            $hostDB = 'localhost';
            $nomDB = 'blog';
            $usuario = 'root';
            $pwd = '';

            //Conexion a BD
            $hostPDO = "mysql:host=$hostDB; dbname=$nomDB;";
            $miPDO = new PDO($hostPDO,$usuario,$pwd);
        
            //HACEMOS UNA CONSULTA POR DEFECTO
            $consulta = "SELECT * FROM posts";
            $texto = null;
            if(isset($_POST['palabra'])){
                //Si hay una busqueda, cambiamos la consulta
                $texto = $_POST['palabra'];
                $consulta = "SELECT * FROM posts WHERE titulo LIKE :titulo or contenido LIKE :contenido or nickname LIKE :nickname";
            }
            //Preparamos la sentencia e indicar que vamos a usar un cursor
            $sentencia = $miPDO->prepare($consulta);
            $sentencia->execute(
                array(
                   ':titulo' => "%$texto%",
                   ':contenido' => "%$texto%",
                   ':nickname' => "%$texto%"
                )
                );
            //Imprimo los resultados
            $resultado = $sentencia->fetchAll();
        ?>
        <main>
            <div class="postPrincipales">
                <h3>POST PRINCIPALES</h3>
                
                    <?php 
                        foreach($resultado as $posicion =>$columna){
                            ?>
                        <div>
                            <h2><?php echo $columna['titulo'] ?> </h2>
                            <span>Nº visitas:<?php echo $columna['visitas'] ?></span>
                            <p><?php echo $columna['contenido'] ?> </p>
                            <p><?php echo $columna['nickname'] ?> </p>
                            <span><?php echo $columna['fecha'] ?></span>
                        </div>
                        <?php
                        }
                    ?>
                
            </div>

            <div class="aside">
                <div class="topPost">
                    <h3>TOP POST</h3>
                </div>

                <div class="topUsuarios">
                    <h3>TOP USUARIOS</h3>
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