<div class="container">
    <h2>Nuestros Productos</h2>
    <div class="row card-container">
    <?php foreach ($productos as $productoCliente): ?>


    <div class="col-12 col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 18rem;">
    <img src="/build/imagenes/<?php echo $productoCliente->imagen ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $productoCliente->nombre ?></h5>
      <p class="card-text"><?php echo $productoCliente->resumen ?></p>
     
      <p  class="card-title text-success fw-bold card-text fs-4   ">$<?php echo $productoCliente->precio ?></p>
      <a href="/producto?id=<?php echo $productoCliente->id ?>" class="btn btn-primary text-white text-white ">Go somewhere</a>
    </div>
  </div>
  </div>


  <?php endforeach ?>
    </div>
</div>

