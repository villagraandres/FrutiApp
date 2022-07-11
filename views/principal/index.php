
<div class="container">

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/build/img/CarruselGod.jpg" class="d-block w-100"   >
    </div>
    <div class="carousel-item">
      <img src="/build/img/CarruselGod2.jpg" class="d-block w-100"  >
    </div>
    <div class="carousel-item">
      <img src="/build/img/CarruselGod3.jpg" class="d-block w-100"  >
    </div>
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<div class="container mt-5 brand2">

 
  <p><img src="/build/img/plant.png " alt="" width="50" height="50" class="brand-imagen"> Precios Justos <span class="linea">Buen Servicio</span>  <span>Productos de Calidad</span><img src="/build/img/fruta.png " alt="" width="50" height="50" class="brand-imagen"></p>
</div>

<div class="container mt-5">
  <h4>Los Favoritos de Nuestros Clientes:</h4>
  
  <div class="row card-container">
  <?php
  foreach ($productosClientes as $productoCliente): ?>
    <div class="col-12 col-md-6 col-lg-4">
    <div class="card" style="width: 18rem;">
    <img src="/imagenes/<?php echo $productoCliente->imagen ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $productoCliente->nombre ?></h5>
      <p class="card-text"><?php echo $productoCliente->resumen ?></p>
     
      <p  class="card-title text-success fw-bold card-text fs-4   ">$<?php echo $productoCliente->precio ?></p>
      <a href="/producto?id=<?php echo $productoCliente->id ?>" class="btn btn-primary text-white text-white ">Go somewhere</a>
    </div>
  </div>
  </div>
  <?php endforeach ?>
  

<!-- Card -->

  

  <!-- Tarjeta -->
  
</div>
</div>


<div class="container mt-5">
  <h4>Productos Organicos:</h4>

  <div class="row card-container">

  <?php 
  foreach ($productosOrganicos as $productoOrganico): ?>
    <div class="col-12 col-md-6 col-lg-4">
    <div class="card" style="width: 18rem;">
    <img src="/imagenes/<?php echo $productoOrganico->imagen ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $productoOrganico->nombre ?></h5>
      <p class="card-text"><?php echo $productoOrganico->resumen ?></p>
      <p  class="card-title text-success fw-bold card-text fs-4   ">$<?php echo $productoOrganico->precio ?></p>
      <a  href="/producto?id=<?php echo $productoOrganico->id ?>" class="btn btn-primary text-white text-white ">Go somewhere</a>
    </div>
  </div>
  </div>
  <?php endforeach ?>



</div>
</div>

<div class="container mt-5 compromiso-contenedor">
  <h2>Nuestro Compromiso Etico</h2>
  <p>Conoce mas sobre nuestras obras comunitarias</p>
  <button type="button" class="btn btn-secondary btn-lg text-white">Large button</button>
</div>

