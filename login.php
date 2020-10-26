<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="css/login.css">
   <script src="JSCRIPT/usuario.js" type="text/javascript"></script>
<body>
    <header>
        <h1>BenchBlog</h1>
    </header>
        <h2>En esta pagina te podras loguear o registrar en nuestro blog para encontrar los mejores posts sobre benchmarks</h2>
    <main>
        <form id="Login" action="" method="$_GET">
            <label for="Nick">Nickname</label></br>
            <input type="text" name="Nick" id="Nick"><br>
            <label for="Contra"> Contraseña</label><br>
            <input type="text" name="Contra"><br>
            <input type="hidden" name="tipo" value="Login">
            <input class="boton" type="submit" onclick="" value="Entrar">
            <input class="boton" type="reset" value="Borrar"/>

        </form>
    </main>
    <aside>
        <form id="Registro" action="" method="post" enctype="multipart/form-data">
            <label for="Nick">Nickname</label></br>
            <input type="text" id="nick" name="nick"><br>
            <p id="nickExiste" class="existe"> El nick ya existe</p><br>
            <label for="mail">Email</label></br>
            <input type="text"  id="email" name="email"><br>
            <p id="emailExiste"class="existe"> El email ya existe</p><br>
            <label for="Contra"> Contraseña</label><br>
            <input type="text" id="contra" name="contra"><br>
            <label for="Arch"> Archivo</label><br>
            <input type="file" id="arch" name="arch"><br>
            <input type="hidden" name="tipo" id ="tipo" value="Registro"> 
            <input class="boton" type="submit" value="Registrarse"/>
            <input class="boton" type="reset"  value="Borrar"/>
        </form>
    </aside>
    <footer>
    </footer>
</body>
</html>
<?php include 'PHP/conexion.php';?>
