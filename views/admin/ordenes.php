<div class="container mt-4">
    <h2 class="text-center">Ordenes de Usuarios</h2>
    
    <div class="mb-4">
        <h5>Buscar por fecha</h5>

       
        <input type="date" id="inputFecha">
    </div>
    

    <h5>Buscar por numero de orden</h5>
    <?php include_once __DIR__ . "/../templates/alertas.php";?>

    <div class="buscar-contenedor">
        <input  type="number" min="0"  id="input-buscar" value="<?php $orden->id ?? ''  ?>">
        <button  class="btn btn-primary btn-lg mt-5 text-white mx-3" id="boton-orden" >Buscar  </button>
   
    </div>


    <?php if($orden ?? ''): ?>
    <div class="card mt-5">
  <h5 class="card-header">Numero de orden: <?php echo $orden->id?></h5>
  <div class="card-body">
  <p class="card-text"> <span>Hora:</span> <?php echo $orden->hora?></p>
  <p class="card-text"> <span>Fecha:</span>  <?php 
    
    $originalDate = $orden->fecha;
    //original date is in format YYYY-mm-dd
    $timestamp = strtotime($originalDate); 
    $newDate = date("d-m-Y", $timestamp );
   echo $newDate;
    
    ?></p>
   
  
    
    <a href="/admin/detalle-orden?id=<?php echo $orden->id?>&usuarioId=<?php echo $orden->usuarioId?>" class="btn btn-primary text-white mt-2">Ver detalles de la compra</a>
  </div>
</div>
<?php endif ?>
    
</div>









<?php
$script="
    <script src='/build/js/ordenes.js'></script>
    "
?>