<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | Ajustes</title>
  
   <link rel="stylesheet" type="text/css" href="css/encabezado.css">
   <link rel="stylesheet" type="text/css" href="css/ajustes.css">
  
  
   <script src="JSCRIPT/usuario.js" type="text/javascript"></script>
   

<body>
    <header>

        <div class="logo">
            <div><img src="img/cpu.png" alt="Imagen no soportada"></div>
        </div>

        <div class="titulo">
            <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
        </div>

    </header>
    <h2>Datos de la cuenta</h2>
    <main>

    <form id="cambioContrasena" action="" method="post" >

        <fieldset>
            <legend>Cambio de contraseña</legend>
            <label for="Nick">Contraseña actual
                </br>
                <input type="password" id="passActual" name="passActual"><br>
                <p id="contrasenaActualError" class="errorPass"> Contraseña actual erronea</p>
            </label></br>
            <label for="mail">Nueva contraseña
                </br>
                <input type="password"  id="passNueva" name="passNueva"><br>
                
            </label></br>

            <label for="Contra"> Repetir contraseña
                </br>
                <input type="password" id="passRepetir" name="passRepetir" ><br>
                <p id="contrasenaNoCoincide" class="errorPass"> Las contraseñas nuevas no coinciden</p>
            </label><br>

            
            
            <input type="hidden" name="tipo" id ="tipo" value="cambioContrasena"> 
            <input id="btnCambiarPass"  class="boton" type="submit" value="Cambiar Contraseña">
        </fieldset>
    </form>


    <aside>
        <form id="actualizarFoto" action="" method="post" enctype="multipart/form-data">
            
        <label for="Arch"> Foto de perfil</label><br>
            <img src="img/cpu.png" alt="Imagen no soportada"> <br>
            <input type="file" id="foto" name="foto"><br>
            
            <input type="hidden" name="tipo" id ="tipo" value="cambioFoto"> 
            <input class="boton" type="submit" value="Actualizar" />
        </form>
        </aside>

        
    </main>

    <footer>
    </footer>
</body>
</html>
<?php include 'PHP/conexion.php';?>