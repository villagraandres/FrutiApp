
<?php


if (!isset($_SESSION)) {
    session_start();
}
$auth=$_SESSION['nombre'] ?? false;



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css" >   
    
     <title>Document</title>
</head>

<body>



<nav class="navbar navbar-expand-lg navbar-light mb-4 "  style="background-color: #67D943;">
  <div class="container-fluid">
  <a  class="navbar-brand mr text-black text-white " href="/">
    <img src="/build/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
    Bootstrap
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="/nosotros">Nosotros</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link text-white" href="/contacto">Contacto</a>
        </li>
       
      </ul>
      <?php
      
      if($_SESSION['nombre'] ?? false){?>
    <div class="me-4">
        <img src="/build/img/cart.png" alt="">
   </div>
     <a href="/cerrarSesion"><button class="btn btn-danger btn text-white me-4" type="submit">Cerrar Sesión</button></a> 
      
   <?php }else{  ?>
   <div class="me-4">
       <img src="/build/img/cart.png" alt="">
   </div>
        
        

    <a href="/login"><button class="btn btn-secondary btn text-white me-4" type="submit">Iniciar Sesión</button></a> 

    <?php  } ?>
      
     
     <a href="/registro"><button class="btn btn-secondary btn text-white " type="submit">Registrarse</button></a> 
     
     
    </div>
  </div>
  
</nav>


<?php
echo $contenido;
?>




<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
  </footer>
</div>



<!-- JavaScript Bundle with Popper -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
<?php
  echo $script ?? '';
  ?>

</html>