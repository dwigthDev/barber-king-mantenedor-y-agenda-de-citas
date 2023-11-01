document.addEventListener("DOMContentLoaded", function () {
    const reservaForm = document.getElementById("reserva-form");
    reservaForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const fecha = document.getElementById("fecha").value;
        const hora = document.getElementById("hora").value;
        const nombre = document.getElementById("nombre").value;
        const correo = document.getElementById("correo").value;

       
        alert("Cita reservada con éxito. ¡Te esperamos!");

        window.location.href = "confirmacion.html";
    });
});
