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
                <?php session_start(); $idP = $_GET['idPost']; $_SESSION['idP'] = $idP; include ('PHP/conexion.php'); logearRegistrarUsuario();  ?>
            </div>   
    </header>

    <main class="mainPost">
       
        <div class="cajaPost">
            <div class="postCompleto">
                <h1 id="tituloPost"><?php echo(cargarTituloPost($_GET["idPost"]))?></h1>
                <p id="contenido"><?php echo(CargarPost($_GET["idPost"]));?></p>
            </div>
            <div class="divImagen">
                <?php if(cargarFotoPost($_GET["idPost"])!=null){; ?>
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
    var nombreUsuario = document.getElementById("descargar").addEventListener("click",getPDF,true);

       function getPDF() {
        var doc = new jsPDF();
       
        var contenido = document.getElementById("contenido");
        contenido.style.color = "black";
        // We'll make our own renderer to skip this editor
        var specialElementHandlers = {
            '#getPDF': function(element, renderer){
            return true;
            },
            '.controls': function(element, renderer){
            return true;
            }
        };

        // All units are in the set measurement for the document
        // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
        tituloPost = document.getElementById("tituloPost").innerHTML;
        contenidoPost = document.getElementById("contenido").innerHTML;
        
      
      /*   doc.text(20, 20, post.titulo);
        doc.text(20, 30, post.contenido); */
        
         doc.fromHTML($('.postCompleto').get(0), 15, 15, {
            'width': 170, 
            'elementHandlers': specialElementHandlers,
            'color':'#00000'
        }); 
        try{
            var img = new Image();
            img.src = '<?php echo (cargarFotoPost($_GET["idPost"]))?>';
            post = new documentoFoto(tituloPost, contenidoPost,img);
            if (contenidoPost.length>400){
                doc.addPage();
            }
            doc.addImage(post.foto, 'png', 10, 150, 180, 120);
        }catch(excepcion){
            post = new documento(tituloPost, contenidoPost);
        }
        contenido.style.color = "white";
        doc.save('Generated.pdf');
        }
            
      
    </script>

    <footer></footer>
</body>
<!-- //Una vez que la pagina del post este cargada inserta en un array de localStorage
//para despues cojerlo en el index -->
<script>
    function paginaCargada(){
        var arrayUltimosvisitados = localStorage.getItem('arrayUltimosvisitados');
        var arrayUltimosTitulo = localStorage.getItem('arrayUltimosTitulo');
        arrayUltimosvisitados = JSON.parse(arrayUltimosvisitados);
        arrayUltimosTitulo = JSON.parse(arrayUltimosTitulo);
        if(arrayUltimosvisitados == null){
            var arrayUltimosvisitados = new Array(0);
            var arrayUltimosTitulo = new Array(0);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script>
<script src="JSCRIPT/usuario.js" type="text/javascript"></script>
</html>