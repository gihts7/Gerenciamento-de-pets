const botao = document.getElementById("mostrarSenha");

const senha = document.getElementById("senha");

botao.addEventListener("click", function(){

    if(senha.type === "password"){

        senha.type = "text";

        botao.innerHTML = '<i class="bi bi-eye-slash"></i>';

    }else{

        senha.type = "password";

        botao.innerHTML = '<i class="bi bi-eye"></i>';

    }

});