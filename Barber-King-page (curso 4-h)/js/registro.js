
var datos = [];

document.getElementById("enviar").addEventListener("click", function() {
  var nombre = document.querySelector("input[placeholder='Nombre']").value;
  var apellido = document.querySelector("input[placeholder='Apellido']").value;
  var correo = document.querySelector("input[placeholder='Correo electrónico']").value;
  var telefono = document.querySelector("input[placeholder='Teléfono']").value;
  var contrasena = document.getElementById("password").value;

  var usuario = {
    Nombre: nombre,
    Apellido: apellido,
    Correo: correo,
    Teléfono: telefono,
    Contraseña: contrasena
  };

  datos.push(usuario);

  // esto aun no esta en uso pero igualmente no usar 
  localStorage.setItem("usuarios", JSON.stringify(datos));
  
});
