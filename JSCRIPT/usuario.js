class Usuario{
    usuarios(nickname, e_mail, foto_nick, tipo_de_usuario, estado){
        this.nickname=nickname;
        this.e_mail=e_mail;
        this.foto_nick=foto_nick;
        this.tipo_de_usuario=tipo_de_usuario;
        this.estado=estado;

    }
}




//Oculta elementos del formulario registro
var nickExiste = document.getElementsByClassName("existe")[0];
var emailExiste = document.getElementsByClassName("existe")[1];
nickExiste.style.display = "none";
emailExiste.style.display = "none";

function registroExisteNick(){
    console.log("script registro");
    document.getElementById("nick").style.borderColor = "red";
    nickExiste.style.display = "block";
}

function registroExisteEmail(){
    console.log("script registro");
    document.getElementById("email").style.borderColor = "red";
    emailExiste.style.display = "block";
}

function faltaDatos(){
    document.getElementById("nick").style.borderColor = "red";
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("contra").style.borderColor = "red";

} 