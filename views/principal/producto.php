<h1 class="text-center mb-5" id="nombre"><?php echo $producto->nombre ?></h1>

<div class="container nosotros-container">
   
<img src="/imagenes/<?php echo $producto->imagen ?>" class="producto-img" alt="...">
    <section class="container">
       
    <p ><?php echo $producto->descripcion ?></p>
  
<button class="btn btn-primary btn-lg text-white mt-5 AgregarCarrito" id="ordenar">Hacer una orden</button>

</section>
   <input type="hidden" id="auth" value="<?php echo $autenticado ?>">

   

</div>

 <?php
    $script="
    <script src='build/js/producto.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    "
    
    ?> 