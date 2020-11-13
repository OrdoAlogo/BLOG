//Creamos el constructor de un objeto para que ayude a generar un documento pdf sin imagen
function  documento(titulo, contenido) {
    this.titulo = titulo;
    this.contenido=contenido;
}
//reamos el constructor de un objeto para que ayude a generar un documento pdf con imagen
function  documentoFoto(titulo, contenido,foto) {
    this.titulo = titulo;
    this.contenido=contenido;
    this.foto=foto;
}

/* Al pulsar en el nombre de usuario
aparece un menú con botones ajustes y cerrar sesión */
var nombreUsuario = document.getElementById("nickUsu");
nombreUsuario.onclick = function(){
    let element = document.getElementById('desplegable');
    let elementStyle = window.getComputedStyle(element);
    let elementColor = elementStyle.getPropertyValue('visibility');
    
    if(elementColor == 'hidden'){

        element.style.visibility = 'visible'

        element.style.visibility = 'visible';

    }else{
        element.style.visibility = 'hidden';
    }
}
var nombreUsuario = document.getElementById("cerrarSesion").addEventListener("click",cerrarSesion,true);
/* Al registrarse, si el nickname introducido existe
aparece un texto rojo. */
function registroExisteNick(){
   
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("nick").style.borderColor = "red";
        document.getElementById("nickExiste").style.display = "block";
    });
    
}
/* Al registrarse, si el email introducido existe
aparece un texto rojo. */
function registroExisteEmail(){
   
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("emailExiste").style.display = "block";
    });
    
}
/* Al logearse, si los datos introducidos no son correctos.*/
function loginError(){
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("loginError").style.display = "block";
    });
    
}
/* Al registrarse, si algún campo esta vacio.
Aparece un texto rojo advirtiendo */
function faltaDatos(){
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("faltaDato").style.display = "block";
    });
    

} 
/* Al cambiar la contraseña, si la contraseña actual no es correcta.
Aparece un texto rojo advirtiendo */
function ajustesErrorPass(){
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("contrasenaActualError").style.display = "block";
    });
    
}
/* Al cambiar la contraseña, si la contraseña nueva y la confirmación no coinciden
Aparece un texto rojo advirtiendo */
function ajustesPassNoCoincide(){
    document.addEventListener("DOMContentLoaded", function () { 
        document.getElementById("contrasenaNoCoincide").style.display = "block";
    });
    
}
//Funcion para cancelar el envio del formulario
//en caso de que los datos sean incorrectos
function cancelar(){
    document.getElementById('Registro').reset();
    return false;
}
//cuenta la longitud de la contraseña
function contar(){
    document.forms[2].contra.value.length  
}
//Funcion para validar el formulario de registro
function validarForm(){
    validarContra();
    longContra();
    
}
//Funcion para validar las contraseñas en el registro
function validarContra(){
    contar();
}
 //Funcion para validar las contraseñas en el registro
function validarContra(){
    contenido = document.getElementById('contra').value;
    espacios = false;
    contador = 0;
    if(espacios){
        alert("La contraseña no admite espacios");
        cancelar();
    }
    if(contenido.length == 0){
        alert("Introduzca la contraseña");
        document.getElementById('contra').style.border = "thick solid red"
        cancelar();
    }
    
} 
//Funcion para controlar la longitud de caracteres de la contraseña
function longContra(){
    numCar = document.getElementById('contra').value.length;
    if(numCar<8){
        alert("La contraseña debe tener 8 caracteres mínimo");
        cancelar();
    }

} 
//En este metodo lo que haremos sera cargar los ultimos posts visitados 
//desde el localStorage y los añadiremos como a dentro de un div
function montarUltimosVisitados(){
    var arrayUltimosvisitados = localStorage.getItem('arrayUltimosvisitados');
    var arrayUltimosTitulo = localStorage.getItem('arrayUltimosTitulo');
    arrayUltimosvisitados = JSON.parse(arrayUltimosvisitados);
    arrayUltimosvisitados = arrayUltimosvisitados.reverse();
    
    arrayUltimosTitulo = JSON.parse(arrayUltimosTitulo);
    arrayUltimosTitulo = arrayUltimosTitulo.reverse();

    for(var i=0;i<3 && i<arrayUltimosvisitados.length;i++){
        var newDiv = document.createElement("a");
        newDiv.setAttribute('id','postLateral');
        linebreak = document.createElement("br");
        newDiv.setAttribute('href','paginaPost.php?idPost='+arrayUltimosvisitados[i]);
        var newContent = document.createTextNode(arrayUltimosTitulo[i]); 
        newDiv.appendChild(newContent); 
        newDiv.appendChild(linebreak);
        var currentDiv = document.getElementById("a1");
        document.getElementById("caja").insertBefore(newDiv,currentDiv) ;
    }
}

