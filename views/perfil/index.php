<div class="container">
    <h2 class="text-center">Perfil</h2>
    <p>Hola <?php echo $usuario->nombre ?>, estos son los pedidos que has hecho</p>


    <?php foreach($ordenes as $orden): ?>

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
   
  
    
    <a href="/perfil/detalle-orden?id=<?php echo $orden->id?>" class="btn btn-primary text-white mt-2">Ver detalles de la compra</a>
  </div>
</div>
<!-- Card -->

<?php endforeach; ?>


</div>