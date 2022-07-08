<div class="container mt-4">
<a href="/admin/ordenes"><button class="btn btn-secondary btn text-white mb-3 " type="submit">Regresar</button></a> 
    <h2>Detalles de la orden</h2>

    
    <?php
    $suma=0;
    ?>
    <?php foreach($productos as $producto): ?>
    
    <div class="contenedor-producto mb-4">
        <p class="nombreProducto"> <?php echo $producto->nombre ?></p>
        <p><span>Precio: </span>$<?php echo $producto->precio ?></p>
        <p><span>Cantidad: </span><?php echo $producto->cantidad ?></p>

        <?php
        $total=$producto->precio * $producto->cantidad;
       $suma+=$total;
        ?>
         <p><span>Total: </span>$<?php echo $total ?></p>
        
    </div>

    <?php endforeach ?>

    <p class="precioFinal"><span>Total de la Orden: </span>$<?php echo $suma ?></p>

    <div class="mt-4">
        <h2>Informacion del Usuario</h2>
        <p ><span>Nombre:</span> <?php echo $usuario->nombre ." ". $usuario->apellido ?></p>
        <p ><span>Telefono:</span> <?php echo $usuario->telefono ?></p>
        <p ><span>Correo:</span> <?php echo $usuario->email ?></p>
    </div>
</div>