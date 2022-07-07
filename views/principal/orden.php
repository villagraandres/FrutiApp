<div class="container">
    <h2 class="text-center">Elige los productos que deseas</h2>


   

    <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $producto):?>
      
  
    <tr id="producto" data-id="<?php echo $producto->id?>" class="Noselected">
      <td> <img src="/build/imagenes/<?php echo $producto->imagen?>" class="imagen-tabla img-fluid" alt=""></td>
      <td><?php echo $producto->nombre?></td>
      <td> <?php echo $producto->precio?>    </td>
      <td>
   
    <input id="cantidad" value="0" type="number" name="cantidad" min="0" max="20">
   
    
    
      </td>
      <td style="display:none"><?php echo $producto->id?></td>
     
    </tr>
<?php endforeach?>
    



    
  </tbody>
</table>
<!-- Info de usuario -->
<input type="hidden" id="usuario-id" value="<?php echo $id ?>">
<input type="hidden" id="nombre" value="<?php echo $nombre ?>">


<h4 class="text-center fechah1">Indica la fecha y el horario para recojer tu pedido</h4>
<p class="fw-light">Horario: Lunes a Sabado de 7:00am a 8:00pm</p>



<input type="date" id="fecha" min="<?php echo date("Y-m-d", strtotime('+1 day')  ) ?>">
<input type="time" id="hora" >
<br>
<button  class="btn btn-primary btn-lg mt-5 text-white" id="boton-orden" >Mostrar Resumen  &Darr; </button>
   
   
<div class="resumen mt-5" id="resumen" >

</div>
</div>



<?php
    $script="
    <script src='build/js/app.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    "
    
    ?>