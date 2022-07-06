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
        <img src="/build/imagenes/<?php echo $producto->imagen ?>" class="imagen-tabla img-fluid" alt="">
      
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



              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Eliminar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro que deseas eliminar este producto?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Estos cambios son irrevertibles
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <form method="POST">

                      <input type="hidden" name="id" value="<?php echo $producto->id  ?>">
                      <input type="submit" class="btn btn-danger" value="Eliminar">
                     
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>
        
    </td>
      
    </tr>
    <?php endforeach ?>

    
   
  </tbody>
</table>
</div>