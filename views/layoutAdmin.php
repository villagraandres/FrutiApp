
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css" >   
    <link rel="stylesheet" href="/build/css/home.css" >   
     <title>Document</title>
</head>

<body>
<div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/admin" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none text-secondary">
          <img  src="/build/img/logo.png" width="50" height="50" class="d-inline-block align-top me-2" alt="">
             Bootstrap
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="/admin" class="admin-nav nav-link text-white">
                
                Productos
              </a>
            </li>
            <li>
              <a href="/admin/ordenes" class="admin-nav nav-link text-white">
                
                Ordenes
              </a>
            </li>
            
            <li>
              <a href="/admin/cuenta" class="admin-nav nav-link text-white">
                Cuenta
              </a>
            </li>

           
            <li>
            <a href="/cerrarSesion" class="admin-nav nav-link text-white">
            Cerrar Sesion
            </a> 
              
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>


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
</body>
<!-- JavaScript Bundle with Popper -->
<?php
echo $script ?? '';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>