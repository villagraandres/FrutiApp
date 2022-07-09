<div class="container mt-4">
    <h2 class="text-center">Ordenes de Usuarios</h2>
    <div class="busqueda">
    <div class="mb-4">
        <h5>Buscar por fecha</h5>

       
        <input type="date" id="inputFecha"  value="<?php $ordenFecha->fecha ?? ''  ?>">
    </div>
    

    <h5>Buscar por numero de orden</h5>
    <?php include_once __DIR__ . "/../templates/alertas.php";?>

    <div class="buscar-contenedor">
        <input  type="number" min="0"  id="input-buscar" value="<?php $orden->id ?? ''  ?>">
        <button   class="btn btn-primary btn-lg mt-5 text-white mx-3" id="boton-orden" >Buscar  </button>
   
    </div>
    </div>
    


    <?php if($orden ?? ''): ?>
    <div class="card mt-5 orden-container" >
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
    <button data-id="<?php echo $orden->id?>" class="btn btn-danger text-white mt-2 eliminar-orden">Eliminar Orden</button>
  </div>
</div>
<?php endif ?>


<?php if($ordenFecha ?? ''): ?>
    <div class="card mt-5 orden-container">
  <h5 class="card-header">Numero de orden: <?php echo $ordenFecha->id?></h5>
  <div class="card-body">
  <p class="card-text"> <span>Hora:</span> <?php echo $ordenFecha->hora?></p>
  <p class="card-text"> <span>Fecha:</span>  <?php 
    
    $originalDate = $ordenFecha->fecha;
    //original date is in format YYYY-mm-dd
    $timestamp = strtotime($originalDate); 
    $newDate = date("d-m-Y", $timestamp );
   echo $newDate;
    
    ?></p>
   
  
    
   
   <a href="/admin/detalle-orden?id=<?php echo $ordenFecha->id?>&usuarioId=<?php echo $ordenFecha->usuarioId?>" class="btn btn-primary text-white mt-2">Ver detalles de la compra</a>
   <button data-id="<?php echo $ordenFecha->id?>" class="btn btn-danger text-white mt-2 eliminar-orden">Eliminar Orden</button>
  </div>
</div>
<?php endif ?>

<form method="POST" class="formAll">
  <input type="submit" id="botonAll" class="btn btn-primary btn-lg mt-5 text-white mx-3" value="Ver todas las ordenes">
</form>

<?php if($ordenAll ?? ''): ?>
  <!-- <h4 class="text-center">Ordenes:</h4> -->
  <?php foreach($ordenAll as $ordenSingle):?>
   
    <div class="card mt-5 all-container" >
  <h5 class="card-header">Numero de orden: <?php echo $ordenSingle->id?></h5>
  <div class="card-body">
  <p class="card-text"> <span>Hora:</span> <?php echo $ordenSingle->hora?></p>
  <p class="card-text"> <span>Fecha:</span>  <?php 
    
    $originalDate = $ordenSingle->fecha;
    //original date is in format YYYY-mm-dd
    $timestamp = strtotime($originalDate); 
    $newDate = date("d-m-Y", $timestamp );
   echo $newDate;
    
    ?></p>
   
  
    
    <a href="/admin/detalle-orden?id=<?php echo $ordenSingle->id?>&usuarioId=<?php echo $ordenSingle->usuarioId?>" class="btn btn-primary text-white mt-2">Ver detalles de la compra</a>
   <button  class="btn btn-danger text-white mt-2 eliminar-orden" data-id="<?php echo $ordenSingle->id?>"  >Eliminar Orden</button>
   
  </div>
</div>
<?php endforeach ?>
<?php endif ?>


</div>











<?php
$script="
    <script src='/build/js/ordenes.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    "
?>