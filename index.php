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
                <?php session_start(); 
                if(isset($_SESSION["usuarioLogeado"])){ 
                echo ("<a href=''>".$_SESSION["usuarioLogeado"]."</a><span class=icon-user></span>");
                }
                else{
                    print ("<a href='login.php'>Entrar | Registrarse</a><span class=icon-user></span>");
                 }
                ?>

        </header>
        <div class="nuevoPost">
            <a href="nuevoPost.php">NUEVO POST</a>
        </div>
        <?php
            //HACEMOS UNA CONSULTA POR DEFECTO
            include('conexion.php');
            try{
                $consulta = 'SELECT * FROM posts,usuarios where posts.nickname=usuarios.nickname';
                 $texto = null;
                if(isset($_POST['palabra'])){
                    //Si hay una busqueda, cambiamos la consulta
                    $texto = $_POST['palabra'];
                    $consulta = 'SELECT * FROM posts WHERE titulo LIKE :titulo or contenido LIKE :contenido or nickname LIKE :nickname';
                } 
                //Preparamos la sentencia e indicar que vamos a usar un cursor
                $sentencia = $miPDO->prepare($consulta);
                $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            }catch(PDOException $pe){
                die("Error occurred:" . $pe->getMessage());
            }
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
                <h2>POST PRINCIPALES</h2>
                
                    <?php 
                        foreach($resultado as $posicion =>$columna){
                            ?>
                        <div>
                            <h3><?php echo $columna['titulo'] ?> </h3>
                            <span>Nº visitas:<?php echo $columna['visitas'] ?></span>
                            <p><?php echo $columna['contenido'] ?> </p>
                            <p>Usuario: <?php echo $columna['nickname'] ?> </p>
                            <span class="fecha"><?php echo $columna['fecha'] ?></span>
                        </div>
                        <?php
                        }
                    ?>
                
            </div>

            <div class="aside">
                <div class="topPost">
                    <h3>TOP POST</h3>
                    <?php 
                    try{
                        $procedimiento = 'SELECT id_post, titulo,imagen_post, visitas FROM posts HAVING(visitas>2) ORDER by visitas DESC';
                        $llamadaProc = $miPDO->query($procedimiento);
                        $llamadaProc->setFetchMode(PDO::FETCH_ASSOC);
                        
                    }catch(PDOException $pe){
                        die("Error occurred:" . $pe->getMessage());
                    }
                        
                     $llamadaProc->execute();
                     $result = $llamadaProc->fetchAll();
                    foreach($result as $p => $fila){
                        ?>  
                        <div class="datosDB">
                            <p>Id post: <?php echo $fila['id_post']; ?> </p>
                            <p>Titulo: <?php  echo  $fila['titulo']; ?> </p>
                            <p>Img: <?php  echo $fila['imagen_post']; ?> </p>
                            <p>Nº visitas: <?php echo $fila['visitas']; ?> </p>
                        </div>                                                              
                            
                        <?php
                    }        
                    ?> 
                </div>
                <div class="topUsuarios">
                    <h3>TOP USUARIOS</h3>
                    <?php 
                        try{
                            $topUser = "SELECT posts.nickname, e_mail, foto_nick, COUNT(id_post) as 'post' FROM posts,usuarios WHERE usuarios.nickname=posts.nickname GROUP BY posts.nickname HAVING COUNT(id_post>1) ORDER BY COUNT(id_post) DESC";
                            $topUsuarios = $miPDO->query($topUser);
                            $topUsuarios->setFetchMode(PDO::FETCH_ASSOC);

                        }catch(PDOException $pe){
                            die("Error occurred:" . $pe->getMessage());
                        }
                        $topUsuarios->execute();
                        $resultUsuarios = $topUsuarios->fetchAll();
                        foreach($resultUsuarios as $p => $col){
                            ?>
                            <div class="datosDB">
                                <p>Usuario:  <?php echo $col['nickname'] ?> </p>
                                <p>E-mail:<?php echo $col['e_mail'] ?></p>
                                <p>Nº post_: <?php echo $col['post'] ?></p>
                                <p>Imagen: <?php echo $col['foto_nick'] ?></p>
                            </div>
                        <?php
                        }
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