<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BLOG | COMENTARIO</title>
        <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
        <link rel="stylesheet" type="text/css" href="css/encabezado.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <style type="text/css">
    main{margin:0 auto; height:600px;}
    h2{text-align: center; margin: 0 auto;}
        form{margin: 0 auto; width: 100%; }
         table{margin: 0 auto; width: 100%; } 
         legend{text-align: center;} 
        tr,td{text-align: center; margin: 0 auto;}
        #boton{text-align:center; margin:0 auto;}
    </style>
    <body>
    <header>
    <?php include('PHP/conexion.php');?>
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
        
        <main>    
        <?php cargarpost()?>
        <h2>COMENTAR</h2>
            
        <form action="#" method="post">       
            <textarea cols="40" rows="1" name="comentario" onkeydown="valida_longitud()" onkeyup="valida_longitud()"> </textarea> 
            <input type="button" name="caracteres" >
            <button  id="boton"><span class="icon-direction"></span></buton> 
        </form>
        </main>
        
        <script>
            texto = ""
            maxCarateres = 400
            
function valida_longitud(){
        //Contamos los caracteres de la caja de texto
        NumCarateres = document.forms[1].comentario.value.length
        //si alcanzamos el limite de caracteres, el programa deja de cojer texto
        if (NumCarateres > maxCarateres){
            document.forms[1].comentario.value = texto
        }else{
            texto = document.forms[1].comentario.value
        }if (NumCarateres >= maxCarateres){
            document.forms[1].caracteres.style.background="red";
        }else{
            document.forms[1].caracteres.style.background="green";
            document.forms[1].caracteres.style.color="white";
        }

     cuenta()
    }
        function cuenta(){
        //Mostramos el Nº de carateres introducidos en la caja de texto
        document.forms[1].caracteres.value=document.forms[1].comentario.value.length
        }
        </script>
    </body>
</html>