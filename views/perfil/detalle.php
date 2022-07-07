<div class="container">
<a href="/perfil/ordenes?id=<?php echo $id?>"><button class="btn btn-secondary btn text-white " type="submit">Regresar</button></a> 
    <h2>Detalles de la compra</h2>

   


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
</div>