<html>
<head>
    <script src="JSCRIPT/usuario.js" type="text/javascript"></script>
</head>

</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG-POST</title>
    <link class="logo" rel="icon" type="image/vnd.microsoft.icon" href="img/logo.png">
    <!-- <link rel="stylesheet" type="text/css" href="css/nuevoPost.css"> -->
    <link rel="stylesheet" type="text/css" href="css/fuentes-iconos/style.css">
    <link rel="stylesheet" type="text/css" href="css/encabezado.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
    <link rel="stylesheet" href="css/post.css">  
</head>
<body>
    <header>
    <div class="logo">
                <div><img src="img/logo.png" alt="Imagen no soportada"></div>
            </div>

            <div class="titulo">
                <a href="index.php"><h1>BENCH<span>BLOG</span></h1> </a>
            </div>

            <div class="registro">
                <?php session_start(); include ('PHP/conexion.php'); logearRegistrarUsuario();  ?>
            </div>   
    </header>

    <main class="mainPost">
        <div class="cajaPost">
            <div>
                <h1 id="tituloPost"><?php echo(cargarTituloPost($_GET["idPost"]))?></h1>
                <p id="contenido"><?php echo(CargarPost($_GET["idPost"]));?></p>
            </div>
            <div class="divImagen">
                <?php if(cargarFotoPost($_GET["idPost"])!=null){ ?>
                <img src='<?php echo (cargarFotoPost($_GET["idPost"]))?>' alt="" >
                <?php }?>
            </div>
            
        </div>
        <div class="comentarios">
            <?php if(isset($_SESSION["usuarioLogeado"])){ echo ("<script type='text/javascript' src='JSCRIPT/usuario.js'></script>");?>
            <div class="formC">
                    <h3>Escriba aqui su comentario</h3> <br>
                    <form  id="comen" method="$_GET">       
                        <textarea id = "textoArea" cols="40" rows="1" name="comentario" maxlength = "500" placeholder="Limite carateres: 400" > </textarea> 
                        <button  class="envio"><span class="icon-direction"></span></button> 
                        <input type="hidden" name="tipo" value="InsertarComentario">
                        <input type="hidden" name="idPost" value="<?php echo ($_GET['idPost']) ?>">
                        
                    </form>
            </div>
            <?php };?>
            <h3>COMENTARIOS</h3>
            <?php cargarComentariosBlog();  ?>  
        </div> 
        <a id="descargar">Descarga el post Aqui</a>   
    </main>
    <script>
    var nombreUsuario = document.getElementById("descargar").addEventListener("click",descarga,true);
    function descarga(){
    var saveData = (function () {
       var a = document.createElement("a");
       document.body.appendChild(a);
       a.style = "display: none";
       return function (data, fileName) {
           var json = JSON.stringify(data),
               blob = new Blob([json], {type: "octet/stream"}),
               url = window.URL.createObjectURL(blob);
           a.href = url;
           a.download = fileName;
           a.click();
           window.URL.revokeObjectURL(url);
           };
       }());
        var titulo = document.getElementById("tituloPost").innerHTML;
        var contenido = document.getElementById("contenido").innerHTML;
        var data = "Titulo --> \n"+titulo+ "\n:Contenido -->\n"+contenido ;
        fileName = "post"+<?php echo($_GET["idPost"]); ?>+".json";
        saveData(data, fileName);
    }
      
    </script>

    <footer></footer>
</body>
<script>
     window.onload(hola());
    function hola(){
        var arrayUltimosvisitados = localStorage.getItem('arrayUltimosvisitados');
        var arrayUltimosTitulo = localStorage.getItem('arrayUltimosTitulo');
        arrayUltimosvisitados = JSON.parse(arrayUltimosvisitados);
        arrayUltimosTitulo = JSON.parse(arrayUltimosTitulo);
        if(arrayUltimosvisitados == null){
            var arrayUltimosvisitados = new Array(5);
            var arrayUltimosTitulo = new Array(5);
        }
        var indiceABorrar= arrayUltimosvisitados.indexOf(<?php echo ($_GET["idPost"]) ?>);
        if (indiceABorrar!=-1){
            arrayUltimosvisitados.splice(indiceABorrar,1);
            arrayUltimosTitulo.splice(indiceABorrar,1);
        }
        arrayUltimosvisitados.push(<?php echo ($_GET["idPost"]) ?>);
        arrayUltimosTitulo.push(document.getElementById("tituloPost").innerHTML);
        localStorage.setItem('arrayUltimosvisitados',JSON.stringify(arrayUltimosvisitados));
        localStorage.setItem('arrayUltimosTitulo',JSON.stringify(arrayUltimosTitulo));
    }
    </script>


</html>