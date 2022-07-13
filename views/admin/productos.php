<div class="container">
    <h1 class="text-center mt-5">Administracion de Productos</h1>
    <?php

use Model\Producto;

 include_once __DIR__ . "/../templates/alertas.php";?>
   <div class="botones mt-3">
   <a href="/admin/crear-producto"><button class="btn btn-primary btn- text-white me-4" type="submit">Agregar Nuevo Producto</button></a> 
 
   </div>
   
 


    <table class="table  mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Precio</th>
      <th scope="col">Seccion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productos as $producto): ?>
    <tr>
      <th scope="row"><?php echo $producto->id ?></th>
      <td><?php echo $producto->nombre ?></td>
      <td>
        <img src="/imagenes/<?php echo $producto->imagen ?>" class="imagen-tabla img-fluid" alt="">
      
      </td>
      <td><?php echo $producto->precio ?></td>
      <td>
       
        <?php
        Producto::seccion($producto->seccion);
        ?>
      </td>
      <td> 
         <a href="/admin/actualizar?id=<?php echo $producto->id?>" class="">Actualizar</a>
                <br>
                <br> 


               
       <button  class="btn btn-danger text-white mt-2 eliminar-orden "  data-producto="<?php echo $producto->id?>"  >Eliminar Producto</button>
      
    </td>
      
    </tr>
    <?php endforeach ?>

    
   
  </tbody>
</table>
</div>
<?php
$script="
    <script src='/build/js/cuentas.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    "
?>