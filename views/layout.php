
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
    

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
     <title>FrutiApp</title>
</head>

<body>



<nav class="navbar navbar-expand-lg navbar-light mb-4 "  style="background-color: #67D943;">
  <div class="container-fluid">
  <a  class="navbar-brand mr text-black text-white " href="/">
    <img src="/build/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
    FrutiApp
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

        <li class="nav-item">
          <a class="nav-link text-white " href="/productos">Productos</a>
        </li>
       
      </ul>
      <?php
      $id=$_SESSION['id'] ?? null;
      if($_SESSION['nombre'] ?? false){?>
      <a href="/perfil/ordenes?id=<?php echo $id ?>">
      <div class="me-4" style="cursor:pointer; ">
        <img src="/build/img/icons8-persona-de-sexo-masculino-48.png" alt="">
      </div>
      </a>
    
     <a href="/cerrarSesion"><button class="btn btn-danger btn text-white me-4" type="submit">Cerrar Sesión</button></a> 
      
   <?php }else{  ?>
  
        
        

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
      <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="/nosotros" class="nav-link px-2 text-muted">Nosotros</a></li>
      <li class="nav-item"><a href="/contacto" class="nav-link px-2 text-muted">Contacto</a></li>
      <li class="nav-item"><a href="/productos" class="nav-link px-2 text-muted">Productos</a></li>
      <li class="nav-item"><a href="/login" class="nav-link px-2 text-muted">Iniciar Sesión</a></li>
      <li class="nav-item"><a href="/registro" class="nav-link px-2 text-muted">Registrarse</a></li>
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