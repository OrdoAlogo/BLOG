


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | Login</title>
    <link class="logo" rel="icon" type="image/vnd.microsoft.icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/encabezado.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    
   
<body>
<header>
        <div class="logo">
            <div><img src="img/logo.png" alt="Imagen no soportada"></div>
        </div>

        <div class="titulo">
            <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
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
      <h2>EN ESTA PÁGINA TE PODRAS LOGUEAR O REGISTRAR EN NUESTRO BLOG PARA ENCONTRAR LOS MEJORES POSTS SOBRE BENCHMARKS</h2>  
   
    <main class="mainLogin">
        
        <div class="sesion">
            <h4>INICIAR SESIÓN</h4>
            <form id="Login" action="" method="$_GET">
                <label for="Nick">Nickname
                    </br>
                    <input type="text" name="Nick" id="Nick"><br>
                </label></br>
                
                <label for="Contra"> Contraseña
                    </br>
                    <input type="password" name="Contra"><br>
                    <input type="hidden" name="tipo" value="Login">
                </label><br>
                <p id="loginError" class="existe"> Nick o contraseña erronea.</p>
                <input class="boton" type="submit" onclick="" value="Entrar">
                <input class="boton" type="reset" value="Borrar"/>
            </form>
        </div>

        <div class="nuevosUser">
            <h4>REGISTRARSE</h4>
                <form id="Registro" action="" method="post" enctype="multipart/form-data">
                <label for="Nick">Nickname
                            </br>
                            <input type="text" id="nick" name="nick"><br>
                            <p id="nickExiste" class="existe"> El nick ya existe</p>
                        </label></br>
                        <label for="mail">Email
                            </br>
                            <input type="text"  id="email" name="email"><br>
                            <p id="emailExiste"class="existe"> El email ya existe</p>
                        </label></br>
                    
                        <label for="Contra"> Contraseña
                            </br>
                            <input type="password" id="contra" name="contra" onkeydown="longContrasenia()" onkeyup="longContrasenia()"><br>
                        </label><br>
                        <label for="Arch"> Archivo</label><br>
                        <input type="file" id="arch" name="arch"><br>
                        <p id="faltaDato" class="existe">Faltan Datos</p>
                        <input type="hidden" name="tipo" id ="tipo" value="Registro"> 
                        <button id="btnRegistro" onclick="validarForm()" class="boton">REGISTRARSE</button>
                        <input class="boton" type="reset"  value="Borrar"/>
                </form>
        </div>
       
    </main>

    <footer>
    </footer>

</body>
</html>

<script src="JSCRIPT/usuario.js" type="text/javascript"></script>
