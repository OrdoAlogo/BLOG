<?php include 'PHP/conexion.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="css/login.css">
<body>
    <header>
        <h1>BenhBlog</h1>
    </header>
        <h2>En esta pagina te podras loguear o registar en nuestro blog para encontrar los mejores posts sobre benchmarks</h2>
    <main>
        <form id="Login" action="" method="$_GET">
            <label for="Nick">Nickname</label></br>
            <input type="text" name="Nick" id="Nick"><br>
            <label for="Contra"> Contraseña</label><br>
            <input type="text" name="Contra" id="Contra"><br>
            <input class="boton" type="submit" onclick="" value="Entrar">
            <input class="boton" type="reset" value="Borrar"/>

        </form>
    </main>
    <aside>
        <form id="Registro" action="" method="post" enctype="multipart/form-data">
            <label for="Nick">Nickname</label></br>
            <input type="text" id="nick" name="nick"><br>
            <label for="mail">Email</label></br>
            <input type="text"  id="email" name="email"><br>
            <label for="Contra"> Contraseña</label><br>
            <input type="text" id="contra" name="contra"><br>
            <label for="Arch"> Archivo</label><br>
            <input type="file" id="arch" name="arch"><br> 
            <input class="boton" type="submit" value="Registrarse"/>
            <input class="boton" type="reset"  value="Borrar"/>
        </form>
    </aside>
    <footer>
    </footer>
</body>
</html>