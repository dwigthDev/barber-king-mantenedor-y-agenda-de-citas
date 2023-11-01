<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <link rel="shortcut icon" href="imagenes/barber-king.png" type="image/x-icon">
</head>
<body>
<!-- BARRA DE NAVEGACION  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid ">
      <a class="navbar-brand text-center gap-2" href="#" style="font-size: 25px;">
        <img src="imagenes/barber-king.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Barber <span style="color: #ffbf00;">King</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#servicios">Servicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="includes/reserva.php">Agendar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#sobre-mi">Sobre mi</a>
          </li>
          <?php
session_start(); // Iniciar la sesión

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '<a href="includes/tablas.php" target="_blank" class="btn btn-warning">Ver las reservas</a>';
    echo '<a id="logout" class="btn btn-danger" href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    // Si el usuario no está conectado, muestra los botones de "Login" e "Iniciar Sesión"
    echo '<a id="login" class="btn btn-warning" href="includes/iniciar.php" target="_blank">Login</a>';
    echo '<a id="register" class="btn btn-warning" href="includes/registro.php" target="_blank">Register</a>';
}
?>
         

        </ul>
      </div>
    </div>
  </nav>
<!-- CARRUSEL HEADER -->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <!-- inicio de las imagenes -->
    <div class="carousel-inner">
      <div class="carousel-item active" style="max-height: 650px;">
        <img src="imagenes/andrea-donato-MNu0n-3BIKs-unsplash.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption  d-md-block mb-5 ">
          <img class="img-hd display" src="imagenes/barber-king.png" >
          <p>Cortes de reyes para reyes</p>
          <a href="includes/reserva.php"  class="btn btn-warning" target="_blank">Reservar Hora</a>
        </div>
      </div>
      <div class="carousel-item" style="max-height: 650px;">
        <img src="imagenes/allef-vinicius-IvQeAVeJULw-unsplash.jpg" class="d-block w-100" alt="..." >
        <div class="carousel-caption  d-md-block mb-5">
          <img class="img-hd" src="imagenes/barber-king.png" >
          <p>Cortes de reyes para reyes</p>
          <a href="includes/reserva.php" class="btn btn-warning" target="_blank">Reservar Hora</a>
        </div>
      </div>
      <div class="carousel-item" style="max-height: 650px;">
        <img src="imagenes/wallpaperflare.com_wallpaper.jpg.jpg" class="d-block w-100">
        <div class="carousel-caption  d-md-block mb-5">
          <img class="img-hd" src="imagenes/barber-king.png" >
          <p>Cortes de reyes para reyes</p>
          <a href="includes/reserva.php" class="btn btn-warning" target="_blank">Reservar Hora</a>
        </div>
      </div>
    </div>
    <!-- botones del carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<!-- div llamado a la accion -->
<div class="bg-dark display">
  <div class="container d-block  p-4">
    <h1 style="color: white; margin: 0%;">Barber <span style="color: #ffbf00;">King</span></h1>
    <p class="d-flex justify-content-center text-center" style="color: white; margin: 0%;">¡Tu reinado de estilo comienza aquí en Barber King!</p>
  </div>

</div>
<!-- seccion de servicios -->
<section  class="mb-4" id="servicios">
  <div class="container d-block justify-content-center text-center p-3 gap-4">
    <a class="txt" style="font-size: 15px;">Vive la experiencia del king</a>
    <h2>Servicios Disponibles</h2>
    <p>Conoce algunas de nuestras especialidades y experimenta el arte de la barbería clásica en La Barbería.</p>
  </div>
  <div class="container">
    <div class="row justify-content-center gap-4 " >
          <!-- tarjeta de servicio numero 1 -->
          <div class="card  col-lg-3 col-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
              <img src="imagenes/tijeras-abiertas.png"  style width="80" height="80">
            </div>
            <div class="card-body" >
              <h3>Cortes de cabello</h3>
              <p class="card-text">
                En Barber King, te brindamos cortes excepcionales con un trato
                 digno de realeza. Experimenta el lujo en cada visita.
                </p>
            </div>
          </div>
          <!-- tarjeta de servicio numero 2 -->
          <div class="card col-lg-3 col-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
              <img src="imagenes/maquinilla-de-afeitar.png" width="80" height="80" alt="...">
            </div>
            <div class="card-body">
              <h3>Perfilado de cejas</h3>
              <p class="card-text">En Barber King, te brindamos la elegancia
                  de unas cejas  perfiladasese  para que te sientas tan cómodo como un rey.</p>
            </div>
          </div>
          <!-- tarjeta de servicio numero 3 -->
          <div class="card col-md-3 col-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
            <img src="imagenes/barberia.png" width="80" height="80"  alt="...">
          </div>
            <div class="card-body">
              <h3>Perfilado de barba</h3>
              <p class="card-text">
                En Barber King, te brindamos un servicio de corte de barba que 
                refleja la elegancia y sofisticación que mereces como un verdadero monarca. </p>
            </div>
          </div>
          <!-- tarjeta de servicio numero 4 -->
          <div class="card col-lg-3 col-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
              <img src="imagenes/mochila.svg  " width="80" height="80"  alt="...">
            </div>  
            <div class="card-body">
              <h3>Servicio para Niños </h3>
              <p class="card-text" >Hacemos que los cortes de cabello sean divertidos para
                 los más pequeños. Nuestros barberos expertos saben cómo hacer que los niños
                  se sientan cómodos y emocionados mientras reciben un corte a medida. </p>
            </div>
          </div>
          <!-- tarjeta de servicio numero 5 -->
          <div class="card col-lg-3 col-sm-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
              <img src="imagenes/box.svg" width="80" height="80"  alt="...">
            </div>  
            <div class="card-body">
              <h3>Packs de Estilo</h3>
              <p class="card-text" >Cortes de cabello, afeitados, productos de cuidado y más. 
                Diseñados para satisfacer todas tus necesidades de cuidado personal, nuestros 
                packs te ayudarán a mantener un estilo impecable.</p>
            </div>
          </div>
          <!-- tarjeta de servicio numero 6 -->
          <div class="card col-lg-3 col-sm-6" style="width: 18rem;">
            <div class="d-flex justify-content-center mt-3">
              <img src="imagenes/silla-de-barbero.png" width="80" height="80"  alt="...">
            </div>  
            <div class="card-body">
              <h3>Servicio completo </h3>
              <p class="card-text" >En Barber King, te ofrecemos un servicio completo que 
                abarca desde cortes de pelo excepcionales hasta diseños personalizados.</p>
            </div>
          </div>
    </div>
  </div>
</section>

<!-- SECCION DE SOBRE MI  -->
<section class="container-fluid">
  <div class="row" >
    <div class="col-sm-12 col-md-6 p-0 img-con ">
      <div class="bg-black img-con d-flex justify-content-center" style="width: 100%; height: 100%">
        <img class="logo" src="imagenes/barber-king.jpg">
      </div>
    </div>
    <div class="col-sm-12 col-md-6 p-5 bg-light">
      <a href="#sobre-mi"  class="txt mt-5">Conocenos</a>
      <h2 class="text-start h1" style=" margin-top: 10px;">Barber <span style="color: #ffbf00;">King</span> </h2>
      <p class="lh-lg" id="sobre-mi" style="max-width: 700px;">En nuestra barbería, no solo cortamos cabello, creamos experiencias. En el corazón de nuestra pasión por el arte de la barbería, se encuentra un compromiso inquebrantable con la excelencia y la autenticidad. En cada silla de nuestra barbería, no solo encontrarás habilidosos barberos, sino también artesanos apasionados que se esfuerzan por transformar cada visita en un momento de relajación y rejuvenecimiento. Nos enorgullecemos de fusionar técnicas tradicionales con estilos modernos para crear cortes de cabello y barbas que reflejan la individualidad de cada cliente.
      </p>
    </div>
  </div >
</section>

<!-- seccion de sede / local -->
<div class="container-fluid p-0 mt-4 mb-4 ">
  <div class="container  d-flex justify-content-center">
    <div class="card">
      <img src="imagenes/sede.png" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex justify-content-center">
          <h5 class="card-title txt">Sede estacion central </h5>
        </div>
        <p class="card-text">¡Descubre la experiencia <strong>Barber King hoy</strong> ! Estamos ubicados a menos de 10 minutos del metro <strong>Estación Central</strong>. <br>¡Ven y vive la diferencia en Barber King! Nuestro talentoso barbero te esperan para transformar tu estilo. <br> ¡No esperes más, visítanos y déjanos cuidar de tu look como nunca antes! 🪒✂️ </p>
        <p class="card-text"><small class="text-body-secondary">Direccion:Estacion central - Pasaje 891 </small></p>
      </div>
    </div>
  </div>
</div>

<!-- seccion del footer -->
<div class="container-fluid p-3 bg-dark" style="color: aliceblue;">
  <div class="container ">
    <div class="row bg-dark gap-4  d-flex justify-content-evenly">
      <div class="col col-sm-12 col-md-3">
        <h2>Barber <Span style="color: #ffbf00;">King</Span></h2>
        <p> Somos más que una barbería; somos un destino para el
            cuidado masculino definitivo. Con un equipo de barberos 
            expertos y un ambiente acogedor, estamos comprometidos
            a brindarte los mejores servicios de barbería. </p>
      </div>

      <div class="col">
        <p class="h3 justify-content-center d-flex" style="color: #ffbf00;">Navegacion</p>
        <ul class="navbar-nav ms-auto gap-2 text-center ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#servicios">Servicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="includes/reserva.php" target="_blank">Agendar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sobre-mi">Sobre mi</a>
            </li>
        </ul>
      </div>
      <div class="col">
          <div  >
            <p class="h3" style="color: #ffbf00;" >Siguenos en redes</p>
            <div class="redes">
              <a href="https://instagram.com/ak_s7on3_?igshid=MzRlODBiNWFlZA==" target="_blank"><img src="imagenes/instagram.png" class="red" alt="Instagram"></a>
              <a href="https://web.facebook.com/profile.php?id=100075962379967" target="_blank"><img src="imagenes/facebook.png"  class="red" alt="whatsApp"></a>
              <a href="wa.me/921650003" target="_blank"><img src="imagenes/whatsapp.png"  class="red" alt="Facebook"></a>
            </div>
            <div class="mt-4">
              <a class="btn btn-warning" type="button" href="includes/reserva.php" target="_blank">Agendar Cita</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
