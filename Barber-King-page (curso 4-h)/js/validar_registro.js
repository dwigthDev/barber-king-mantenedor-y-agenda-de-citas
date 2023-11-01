// validar_registro.js

function mostrarContrasena() {
    var tipo = document.getElementById("password");
    var tipo1 = document.getElementById("password1");
    var mensajeError = document.getElementById("mensaje-error");

    if (tipo.type === "password" && tipo1.type === "password") {
        tipo.type = "text";
        tipo1.type = "text";
    } else {
        tipo.type = "password";
        tipo1.type = "password";
    }

    mensajeError.textContent = "";
}

function validarFormulario() {
    var tipo = document.getElementById("password");
    var tipo1 = document.getElementById("password1");
    var mensajeError = document.getElementById("mensaje-error");

    if (tipo.value !== tipo1.value) {
        mensajeError.textContent = "¡Las contraseñas no coinciden!";
        return false; 
    } else {
        mensajeError.textContent = ""; 
        return true;
    }
}
