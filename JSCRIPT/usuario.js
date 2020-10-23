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
var nombreUsuario = document.getElementById("cerrarSesion").addEventListener("click",cerrarSesion,true);
