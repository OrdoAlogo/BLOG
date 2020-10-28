class Usuario{
    usuarios(nickname, e_mail, foto_nick, tipo_de_usuario, estado){
        this.nickname=nickname;
        this.e_mail=e_mail;
        this.foto_nick=foto_nick;
        this.tipo_de_usuario=tipo_de_usuario;
        this.estado=estado;

    }
}



var nombreUsuario = document.getElementById("nickUsu").addEventListener("click",nombreUsuarioPulsado,true);
function nombreUsuarioPulsado(){
    let element = document.getElementById('desplegable');
    let elementStyle = window.getComputedStyle(element);
    let elementColor = elementStyle.getPropertyValue('visibility');
    
    if(elementColor == 'hidden'){
        element.style.visibility = 'visible'
    }else{
        element.style.visibility = 'hidden';
    }
}

document.addEventListener("click", quitar,true);

function quitar(){   
    
    document.getElementById('desplegable').style.visibility = 'hidden';
};

var nombreUsuario = document.getElementById("cerrarSesion").addEventListener("click",cerrarSesion,true);

function registroExisteNick(){
    console.log("script registro");
    document.getElementById("nick").style.borderColor = "red";
    document.getElementById("nickExiste").style.display = "block";
    
}

function registroExisteEmail(){
    console.log("script registro mail");
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("emailExiste").style.display = "block";
}

function faltaDatos(){
    /* document.getElementById("nick").style.borderColor = "red";
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("contra").style.borderColor = "red";  */

    document.getElementById("faltaDato").style.display = "block";

   


} 




//Coger el Id de post seleccionado
var tarjetaPost = document.getElementById("tituloPost").addEventListener("click",recojerIdPost,true);
function recogerIdPost(codigoNum){
    var codigoPost = document.getElementsByClassName("codigoPost")[codigoNum-1].innerHTML;
    alert(codigoPost);
}
