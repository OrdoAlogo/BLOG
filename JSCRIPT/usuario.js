

/* var nombreUsuario = document.getElementById("nickUsu");
nombreUsuario.addEventListener("click", nombreUsuarioPulsado, true);
document.getElementById("nuevoPost1").style.display= "block";  */

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
/* function nombreUsuarioPulsado(){


    let element = document.getElementById('desplegable');
    let elementStyle = window.getComputedStyle(element);
    let elementColor = elementStyle.getPropertyValue('visibility');
    
    if(elementColor == 'hidden'){

        element.style.visibility = 'visible'

        element.style.visibility = 'visible';

    }else{
        element.style.visibility = 'hidden';
    }
} */
//$(header>".registro">".tarjetaPost").hidde();


var nombreUsuario = document.getElementById("cerrarSesion").addEventListener("click",cerrarSesion,true);

function registroExisteNick(){
    console.log("script registro");
    document.getElementById("nick").style.borderColor = "red";
    document.getElementById("nickExiste").style.display = "block";
    
}



/* document.addEventListener("click", quitar,true);


function quitar(){   
    document.getElementById('desplegable').style.visibility = 'hidden';
}; */


var nombreUsuario = document.getElementById("cerrarSesion").addEventListener("click",cerrarSesion,true);

/* Al registrarse, si el nickname introducido existe
aparece un texto rojo. */
function registroExisteNick(){
    document.getElementById("nick").style.borderColor = "red";
    document.getElementById("nickExiste").style.display = "block";
}

/* Al registrarse, si algún campo esta vacio.
Aparece un texto rejo advirtiendo */
function faltaDatos(){
    document.getElementById("faltaDato").style.display = "block";

} 

/* Al cambiar la contraseña, si la contraseña actual no es correcta.
Aparece un texto rejo advirtiendo */
function ajustesErrorPass(){
    document.getElementById("contrasenaActualError").style.display = "block";
}
/* Al cambiar la contraseña, si la contraseña nueva y la confirmación no coinciden
Aparece un texto rejo advirtiendo */
function ajustesPassNoCoincide(){
    document.getElementById("contrasenaNoCoincide").style.display = "block";
}


//Funcion para cancelar el envio del formulario
//en caso de que los datos sean incorrectos
function cancelar(){
    document.getElementById('Registro').reset();
    return false;
}

//Funcion para controlar los colores del campo contraseña
//segun su longitud de caracteres
function longContrasenia(){
    numCaracteres = document.forms[2].contra.value.length;
    campo = document.forms[2].contra;
    if(numCaracteres<=5){
        campo.style.border = "thick solid orangered";
    }else if(numCaracteres<=10){
        campo.style.border = "thick solid yellow";
    }else if(numCaracteres>10){
        campo.style.border = "thick solid green";
    }

    contar();

}
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
    while(!espacios && (contador <contenido.length)){

        if(contenido.charAt(contador) == " "){
            espacios = true;
            contador++;
        }
    }
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
function longContra(){}
    numCar = document.getElementById('contra').value.length;
    if(numCar<10){
        alert("La contraseña debe tener 10 caracteres mínimo");
        cancelar();
    }

}

